<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Cajero Controller
 * @property \App\Model\Table\PersonaNaturalTable $PersonaNatural
 *  @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @method \App\Model\Entity\Cajero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CajeroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Cajero'){
                    if(in_array($this->request->getParam('action'), array('index', 'anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural', 'buscarClienteJuridico', 'productos','anadirCarrito','carrito', 'delete', 'pagar'))){
                        return true;
                    }           
                }elseif($privilegio == 'Rellenar Pasillo'){
                    if(in_array($this->request->getParam('action'), array('index','anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural', 'buscarClienteJuridico', 'productos','anadirCarrito','carrito', 'delete', 'pagar'))){
                        return true;
                    }
                }
                
            }
            
            return false;
        }else{
            return false;
        }

        return false;
    }
    public function cargar(){
        $tienda = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $this->loadComponent('Productos'); 
        $productos = $this->Productos-> productos($tienda); 
        $this->set('productos',$productos);
        $this->viewBuilder()->setLayout('cajero');
    }
    public function index()
    {
        $this->cargar();
    }
    public function anadirCliente(){
        $this->cargar();
        $this->loadComponent('Lugar');   
        $this->loadModel('PersonaNatural');
        $this->getEstados();
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());  
            $personaNatural->FK_tie_codigo = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']); // SE INSERTA LA PERSONA NATURAL 
            if ($this->PersonaNatural->save($personaNatural)) {
                    $this->insertarRol($this->request->getData('cuenta_usuario.cue_usu_email'));
                    return $this->redirect(['action' => 'index']);

                
            }
            
        }
        
        $this->set(compact('personaNatural'));
    }
    public function getEstados(){
        $estadosSQL = $this->Lugar->estados(); 
        $estados = $this->Lugar->lugarSelect($estadosSQL);
        $this->set('estados', $estados);
    }
    public function municipios(){
        $id = $this->request->getData('id');
        $tipo = 'lugar';
        $this->loadComponent('Lugar'); 
        $municipiosSQL = $this->Lugar->municipios($id); 
        $municipios = $this->Lugar->devolverSelect($municipiosSQL, $tipo);
        exit(json_encode($municipios));
    
    }
    public function parroquias(){
        $id = $this->request->getData('id');
        $this->loadComponent('Lugar'); 
        $tipo = 'lugar';
        $parroquiasSQL= $this->Lugar->parroquias($id); 
        $parroquias = $this->Lugar->devolverSelect($parroquiasSQL, $tipo);
        exit(json_encode($parroquias));
    }
    public function buscarClienteNatural(){
        $this->cargar();
        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $query = $connection->execute('SELECT per_nat_cedula  FROM persona_natural WHERE per_nat_cedula= :i', ['i'=>$this->request->getData("per_nat_cedula")])->fetchAll('assoc');
            if($query==null){
                $this->Flash->error(__("Cedula No existente"));
            }else{

                return $this->redirect(['action' => 'registradora', $this->request->getData("per_nat_cedula"), 0 ]);
            }
        }
    }
    public function buscarClienteJuridico(){
        $this->cargar();
        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $query = $connection->execute('SELECT per_jur_rif  FROM persona_juridica WHERE per_jur_rif= :i', ['i'=>$this->request->getData("per_jur_rif")])->fetchAll('assoc');
            if($query==null){
                $this->Flash->error(__("Rif No existente"));
            }else{
               return $this->redirect(['action' => 'registradora', $this->request->getData("per_jur_rif"), 1 ]);
            }
        }
    }

    public function insertarRol($email){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol_cuenta_usuario', [
            'rol_codigo'=>9, 
            'cue_usu_email'=>$email
        ]);
    }


    public function registradora($id, $check){

        $this->cargar();
        $this->set('id', $id);
        $this->set('check', $check);
    }

    public function insertarRol2($email){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol_cuenta_usuario', [
            'rol_codigo'=>11, 
            'cue_usu_email'=>$email
        ]);
    }

    public function  anadirClienteJuridico(){
        $this->cargar();
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
        $this->loadModel('PersonaJuridica');
        $this->getEstados();

        $personaJuridica = $this->PersonaJuridica->newEmptyEntity();
        if ($this->request->is('post')) {
           
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            $personaJuridica->FK_tie_codigo = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
            if ($this->PersonaJuridica->save($personaJuridica)) {
                $this->insertarRol2($this->request->getData('cuenta_usuario.cue_usu_email'));
                return $this->redirect(['action' => 'registradora',$this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol'], 1]);
            }else{
                $this->Flash->error(__("No se pudo salvar el cliente"));
            }
            
        }
        $this->set(compact('personaJuridica'));
    }

    public function productos ($id, $check, $producto){
        $this->cargar();
        $connection = ConnectionManager::get('default');
        $producto = $connection->execute('SELECT prod_nombre, prod_imagen, prod_precio_bolivar, prod_codigo, prod_descripcion FROM producto WHERE prod_codigo = :i', ['i'=>$producto])->fetchAll('assoc');
        $this->set('total', $this->cuantohay($producto[0]['prod_codigo']));
        $this->set('producto', $producto );

        if ($this->request->is('post')) {
            if($this->request->getData('cantidad') > $this->cuantohay($producto[0]['prod_codigo'])){
                $this->Flash->error(__("Actualmente no poseemos esa cantidad en el stock"));
            }elseif( $this->request->getData('cantidad')< 0){
                $this->Flash->error(__("No puede comprar una cantidad negativa de productos "));
            }else{
                return $this->redirect(['action' => 'anadirCarrito', $producto[0]['prod_codigo'], $this->request->getData('cantidad'), $id, $check]);
            }

           
    }
}

    public function anadirCarrito($prod_codigo, $cantidad, $id, $check){
        $connection = ConnectionManager::get('default');
        $this->cargar();
        $this->loadComponent('Productos'); 
        $precio = $this->Productos->precio($prod_codigo); 
        $precioFinal = $precio[0]['prod_precio_bolivar'] * $cantidad; 
        if($check == 1){    
            $connection->insert('carrito_de_compras_fisico', 
            ['FK_per_jur'=>$id, 
            'car_unidades_producto'=>$cantidad, 
            'car_com_precio'=>$precioFinal, 
            'prod_codigo'=>$prod_codigo
            ]
        ); 
        }else{
            $connection->insert('carrito_de_compras_fisico', 
            ['FK_per_nat'=>$id, 
            'car_unidades_producto'=>$cantidad, 
            'car_com_precio'=>$precioFinal, 
            'prod_codigo'=>$prod_codigo
            ]
        ); 
            
        }
        
       

        return $this->redirect(['action' => 'carrito', $id, $check]);

    }

    public function carrito($id, $check){
        $this->cargar();
        $connection = ConnectionManager::get('default');
        if($check == 1){ 
            $query= $connection->execute('SELECT producto.prod_codigo, car_unidades_producto , car_com_precio, prod_imagen, prod_nombre FROM ucabmart.carrito_de_compras_fisico JOIN producto ON carrito_de_compras_fisico.prod_codigo = producto.prod_codigo WHERE FK_per_jur = :e ', [ 'e'=>$id])->fetchAll('assoc');
        }else{
            $query= $connection->execute('SELECT producto.prod_codigo, car_unidades_producto , car_com_precio, prod_imagen, prod_nombre FROM ucabmart.carrito_de_compras_fisico JOIN producto ON carrito_de_compras_fisico.prod_codigo = producto.prod_codigo WHERE FK_per_nat = :e ', [ 'e'=>$id])->fetchAll('assoc');
        }
        
        $this->set('check', $check);
        $this->set('id', $id);
        $this->set('query',$query);

    }
    public function cuantohay($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $this->loadComponent('Productos'); 
        $productos = $this->Productos->producto($tienda, $productocodigo); 
        return $productos[0]['pas_prod_cantidad'];
    }

    public function delete($id, $check , $prod_codigo)
    {
        $connection = ConnectionManager::get('default');
        if($check == 1){ 
            $connection->execute('DELETE FROM carrito_de_compras_fisico WHERE prod_codigo=:P AND FK_per_jur=:i',['i'=>$id,'P'=>$prod_codigo]);
        }else{
            $connection->execute('DELETE FROM carrito_de_compras_fisico WHERE prod_codigo=:P AND FK_per_nat=:i',['i'=>$id,'P'=>$prod_codigo]);
        }


      
        return $this->redirect(['action' => 'carrito', $id, $check]);
    }

    public function pagar($id, $check){
        $this->cargar();
        $connection = ConnectionManager::get('default');
        if($check == 1){ 
            $total = $connection->execute('SELECT SUM(car_com_precio) as car_com_precio FROM ucabmart.carrito_de_compras_fisico GROUP BY FK_per_jur HAVING  FK_per_jur = :i' , ['i'=>$id])->fetchAll('assoc');
        }else{
            $total = $connection->execute('SELECT SUM(car_com_precio) as car_com_precio FROM ucabmart.carrito_de_compras_fisico GROUP BY FK_per_nat HAVING  FK_per_nat = :i' , ['i'=>$id])->fetchAll('assoc');
        }
        $this->set('total',$total[0]['car_com_precio']);

        if($this->request->is('post')){
            $totalAPagar =intval($this->request->getData("efectivoC"));
            
            if($totalAPagar < $total[0]['car_com_precio']){
                echo $totalAPagar;
                $this->Flash->error(__('Monto incorrecto'));
            }else{
                die("Hello");
            }
        }
    }

    
}
