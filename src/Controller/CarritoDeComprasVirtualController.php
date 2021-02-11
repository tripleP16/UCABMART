<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * CarritoDeComprasVirtual Controller
 *
 * @property \App\Model\Table\CarritoDeComprasVirtualTable $CarritoDeComprasVirtual
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarritoDeComprasVirtualController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $connection = ConnectionManager::get('default');
        $query= $connection->execute('SELECT producto.prod_codigo, car_unidades_de_producto , car_com_precio, prod_imagen, prod_nombre FROM ucabmart.carrito_de_compras_virtual JOIN producto ON carrito_de_compras_virtual.prod_codigo = producto.prod_codigo WHERE cue_usu_email = :e ', [ 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $this->set('query',$query);



 
    }

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Comprar'){
                    if(in_array($this->request->getParam('action'), array('index', 'anadirCarrito', 'validar','insertar', 'actualizar', 'cantidad', 'precio','delete','pagar','cuantohayquepagar','procesar'))){
                        return true;
                    }else{
                        return false;
                    }
                        
                }
            }
            
            return false;
        }else{
            return false;
        }

        return false;
    }
    

    public function pagar(){
        $id=null;
        if($this->Validarsihay()==true){
            $connection = ConnectionManager::get('default');
            $this->set('total', $this->cuantohayquepagar($id));
            $query = $connection->execute('SELECT * FROM ucabmart.tarjeta_de_credito WHERE Fk_cue_usu_email = :e ',[ 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
            $this->set(compact('query'));
        }else{
            
            $this->redirect(['action' => 'index']);
            $this->Flash->error(__('No tienes nada'));
        }

    }

    public function cuantohayquepagar($pagar){
        $connection = ConnectionManager::get('default');
        $totalapagar=$connection->execute('SELECT  SUM(car_com_precio) AS Prueba FROM ucabmart.carrito_de_compras_virtual WHERE cue_usu_email = :e ',[ 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        return $totalapagar[0]['Prueba'];
    }
    function anadirCarrito($producto, $cantidad){

        if($this->validar($producto)){
            $this->actualizar($producto, $cantidad);

        }else{
            $this->insertar($producto,$cantidad);
        }


        return $this->redirect(['action' => 'index']);

    }

    function validar($producto){
        $connection = ConnectionManager::get('default');
        $query= $connection->execute('SELECT prod_codigo, cue_usu_email FROM ucabmart.carrito_de_compras_virtual WHERE prod_codigo= :p AND cue_usu_email = :e ', ['p'=>$producto, 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        if($query == null){
            return false; 
        }else{
            return true;
        }
    }

    function insertar($producto, $cantidad){
        $precio = $this->precio($producto);
        $connection = ConnectionManager::get('default');
        $connection->insert('carrito_de_compras_virtual',[
            'prod_codigo'=>$producto, 
            'cue_usu_email'=>$this->request->getSession()->read('Auth.User.email'), 
            'car_unidades_de_producto'=>$cantidad,
            'car_com_precio'=>$cantidad * $precio
        ]);
    }

    function actualizar($producto, $cantidad){
        $cantidad_Actual = $this->cantidad($producto); 
        $precio = $this->precio($producto);
        $connection = ConnectionManager::get('default');
        $connection->update('carrito_de_compras_virtual', ['car_unidades_de_producto' => $cantidad + $cantidad_Actual, 'car_com_precio'=>($cantidad + $cantidad_Actual) * $precio], ['cue_usu_email' => $this->request->getSession()->read('Auth.User.email') , 'prod_codigo'=>$producto]);
    }

    function cantidad($producto){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT car_unidades_de_producto from ucabmart.carrito_de_compras_virtual WHERE prod_codigo= :p AND cue_usu_email = :e ', ['p'=>$producto, 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        return $query[0]['car_unidades_de_producto'];
    }

    function precio ($producto){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT prod_precio_bolivar FROM ucabmart.producto WHERE prod_codigo= :p', ['p'=>$producto])->fetchAll('assoc');
        return $query[0]['prod_precio_bolivar'];
    }

    function procesar(){

        $validacion=NULL;
        
    
        if($this->validarcompra($validacion)){
            $this->insertarpersonanatural();
            
        }else{
            $this->insertarpersonajuridica();
        }  
        
        $connection = ConnectionManager::get('default');
        $ultimo= $connection->execute('SELECT MAX(fac_numero) AS Ultimo FROM factura WHERE FK_cuenta_usuario=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $this->insertarestadofactura($ultimo[0]['Ultimo']);
        $this->actualizarcantidad(); 
        $connection->delete('carrito_de_compras_virtual', ['cue_usu_email' =>$this->request->getSession()->read('Auth.User.email') ]);
        
        return $this->redirect(['action' => 'index']);
    }

    
    function actualizarcantidad(){
        $connection = ConnectionManager::get('default');
        $Productos=$connection->execute('SELECT prod_codigo,car_unidades_de_producto FROM carrito_de_compras_virtual WHERE cue_usu_email=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $numeroOrd= $connection->execute('SELECT MAX(ord_com_numero) AS ord_com_numero FROM orden_de_compra')->fetchAll('assoc');
        foreach ($Productos as $query1){
            $J=$query1['prod_codigo'];
            $I=$query1['car_unidades_de_producto'];
            $Tienda=$this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
            $k=$connection->execute('SELECT zona.zon_codigo as zon_codigo FROM zona JOIN zona_producto ON zona.zon_codigo = zona_producto.zon_codigo WHERE FK_alm_codigo = :Q AND prod_codigo = :Y',['Q'=>$Tienda,'Y'=>$J])->fetchAll('assoc');
            
            $cantidad1 = $this->cuantohay($J); 
            $connection->update('zona_producto', ['zon_pro_cantidad_de_producto' => $cantidad1-$I], ['prod_codigo' => $J,'zon_codigo'=>$k[0]['zon_codigo']]);
            $cantidad2 = $this->cuantohay($J); 
           

            if (11>$cantidad2 ){

                $fechaActual = date('Y-m-d');
                
                $connection->insert('orden_de_compra',[
                    
                    'ord_com_fecha_creada'=>$fechaActual,
                    'ord_com_pagada'=>'Por pagar',
                    'FK_pro_rif'=>'020582M0315822387796',
                    'FK_tie_codigo'=>$this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']),
                ]);

                $ultimo=$connection->execute('SELECT ord_com_numero FROM orden_de_compra ORDER BY ord_com_numero DESC LIMIT 1')->fetchAll('assoc');
                $precio=$connection->execute('SELECT prod_precio_bolivar FROM producto where prod_codigo=:i',['i'=>$J])->fetchAll('assoc');
                
                $connection->insert('producto_orden_compra',[
                    'prod_codigo'=>$J,
                    'ord_com_numero'=>$ultimo[0]['ord_com_numero'],
                    'prod_ord_cantidad'=>100,
                    'prod_ord_precio'=>100*$precio[0]['prod_precio_bolivar'],
                ]);

                
                
            }


        } 


    }

    public function cuantohay($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $cantidad = $connection->execute('SELECT SUM(zon_pro_cantidad_de_producto) as Total FROM zona_producto JOIN zona ON zona.zon_codigo = zona_producto.zon_codigo JOIN almacen on zona.fk_alm_codigo = almacen.alm_codigo JOIN tienda ON tienda.fk_alm_codigo = almacen.alm_codigo  where prod_codigo=:i  AND tie_codigo =:j',['i'=>$productocodigo,'j'=>$tienda])->fetchAll('assoc');
        return $cantidad[0]['Total'];
    }

    function Validarsihay(){

        $connection = ConnectionManager::get('default');
        $validacion= $connection->execute('SELECT cue_usu_email FROM carrito_de_compras_virtual WHERE cue_usu_email=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        if ($validacion==null){
            return false;
        }
        else{
            return true;
        }

    }

    function validarcompra($validacion){
        
        $connection = ConnectionManager::get('default');
        $query= $connection->execute('SELECT FK_persona_natural,FK_persona_juridica FROM cuenta_usuario WHERE cue_usu_email=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        if($query[0]['FK_persona_natural'] == null){
            return false; 
        }else{
            
            return true;
        }
    }

    function insertarestadofactura($ultimo){

        $connection = ConnectionManager::get('default');
        $fechaActual = date('Y-m-d H:i:s');
        $connection->insert('estado_factura',[
            'est_codigo'=>3,
            'fac_numero'=>$ultimo,
            'fac_fecha_hora'=>$fechaActual
            ]);

    }

    function insertarpersonanatural(){

        $connection = ConnectionManager::get('default');
        $id=null;
        $fechaActual = date('Y-m-d');
        $cedula=$connection->execute('SELECT FK_persona_natural FROM cuenta_usuario WHERE cue_usu_email=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $pagar=$this->cuantohayquepagar($id);
     
        $connection->insert('factura',[
            'fac_fecha_hora'=>$fechaActual,
            'FK_mon_codigo'=>1,
            'FK_dir_en_codigo'=>4,
            'FK_persona_natural'=>$cedula[0]['FK_persona_natural'],
            'FK_cuenta_usuario'=>$this->request->getSession()->read('Auth.User.email'),
            'fac_puntos_generado'=>$pagar/100000,
            'fac_total'=>$pagar,
            'FK_tie_codigo'=>$this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']),
        ]);


        

    }

    function insertarpersonajuridica(){

        $connection = ConnectionManager::get('default');
        $id=null;
        $fechaActual = date('Y-m-d');
        $cedula=$connection->execute('SELECT FK_persona_juridica FROM cuenta_usuario WHERE cue_usu_email=:e',['e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $pagar=$this->cuantohayquepagar($id);
        $connection->insert('factura',[
            'fac_fecha_hora'=>$fechaActual,
            'FK_mon_codigo'=>1,
            'FK_dir_en_codigo'=>4,
            'FK_persona_juridica'=>$cedula[0]['FK_persona_juridica'],
            'FK_cuenta_usuario'=>$this->request->getSession()->read('Auth.User.email'),
            'fac_puntos_generado'=>$pagar/100000,
            'fac_total'=>$pagar,
            'FK_tie_codigo'=>$this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']),
         
        
            ]);

    }


    /**
     * View method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('carritoDeComprasVirtual'));
    } 

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->newEmptyEntity();
        if ($this->request->is('post')) {
            $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->patchEntity($carritoDeComprasVirtual, $this->request->getData());
            if ($this->CarritoDeComprasVirtual->save($carritoDeComprasVirtual)) {
                $this->Flash->success(__('The carrito de compras virtual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito de compras virtual could not be saved. Please, try again.'));
        }
        $this->set(compact('carritoDeComprasVirtual'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->patchEntity($carritoDeComprasVirtual, $this->request->getData());
            if ($this->CarritoDeComprasVirtual->save($carritoDeComprasVirtual)) {
                $this->Flash->success(__('The carrito de compras virtual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito de compras virtual could not be saved. Please, try again.'));
        }
        $this->set(compact('carritoDeComprasVirtual'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $connection = ConnectionManager::get('default');
        $sesion=$this->request->getSession()->read('Auth.User.email');
        $eliminar=$connection->execute('DELETE FROM carrito_de_compras_virtual WHERE prod_codigo=:P AND cue_usu_email=:i',['i'=>$sesion,'P'=>$id]);
        return $this->redirect(['action' => 'index']);
    }
}


/*$this->request->allowMethod(['post', 'delete']);
$carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id);
if ($this->CarritoDeComprasVirtual->delete($carritoDeComprasVirtual)) {
    $this->Flash->success(__('The carrito de compras virtual has been deleted.'));
} else {
    $this->Flash->error(__('The carrito de compras virtual could not be deleted. Please, try again.'));
}

return $this->redirect(['action' => 'index']);*/
