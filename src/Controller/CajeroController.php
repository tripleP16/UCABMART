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
                    if(in_array($this->request->getParam('action'), array('index', 'anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural', 'buscarClienteJuridico', 'productos','anadirCarrito','carrito', 'delete', 'pagar','pasillos', 'reponer'))){
                        return true;
                    }           
                }elseif($privilegio == 'Rellenar Pasillo'){
                    if(in_array($this->request->getParam('action'), array('index','anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural', 'buscarClienteJuridico', 'productos','anadirCarrito','carrito', 'delete', 'pagar','pasillos', 'reponer'))){
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
                    return $this->redirect(['action' => 'registradora', $this->request->getData("per_nat_cedula"), 0 ]);

                
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
                return $this->redirect(['action' => 'registradora',$this->request->getSession()->read('Auth.User')['Persona'], 1]);
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
    public function obtenerzon($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $this->loadComponent('Productos'); 
        $productos = $this->Productos->producto($tienda, $productocodigo); 
        return $productos[0]['zon_pas_codigo'];
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
    public function delete2($id, $check , $prod_codigo)
    {
        $connection = ConnectionManager::get('default');
        if($check == 1){ 
            $connection->execute('DELETE FROM carrito_de_compras_fisico WHERE prod_codigo=:P AND FK_per_jur=:i',['i'=>$id,'P'=>$prod_codigo]);
        }else{
            $connection->execute('DELETE FROM carrito_de_compras_fisico WHERE prod_codigo=:P AND FK_per_nat=:i',['i'=>$id,'P'=>$prod_codigo]);
        }
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
            $totalAPagar = 0; 
            $check1 = false; 
            $check2 = false; 
            $check3 = false; 
            if($this->request->getData("efectivo")=="on" || $this->request->getData("cheque")=="on" || $this->request->getData("debito")=="on"  ){
                if($this->request->getData("efectivo")=="on"){
                    $totalAPagar += intval($this->request->getData("efectivoC"));
                    $check1 = true; 
                }
                if($this->request->getData("cheque")=="on"){
                    $totalAPagar += intval($this->request->getData("chequeCant"));
                    $check2 = true;
                }
                if($this->request->getData("debito")=="on" ){
                    $totalAPagar += intval($this->request->getData("debitoC"));
                    $check3 = true;
                }
                if($totalAPagar< $total[0]['car_com_precio']){
                    $this->Flash->error(__('Monto Incorrecto'));
                }else{
                    $this->crearFactura($id,$total[0]['car_com_precio'], $check );
                    if($check1 == true){
                        $this->salvarEfectivo(intval($this->request->getData("efectivoC"))); 
                        $connection = ConnectionManager::get('default');
                        $metodo = $connection->execute('SELECT MAX(met_pag_numero)  AS num FROM efectivo')->fetchAll('assoc');
                        //$this->salvarMetodoPago(1, $metodo[0]['num']);
                    }
                    if($check2 == true){
                        $this->salvarCheque(intval($this->request->getData("chequeNumero")), intval($this->request->getData("chequeCant"))); 
                       // $this->salvarMetodoPago(2, intval($this->request->getData("chequeNumero")));
                    }

                    if($check3 ==true){
                    
                        $this->salvarTarjeta(intval($this->request->getData("numeroTar")),$this->request->getData("cuenta"),$this->request->getData("emision"), intval($this->request->getData("cvv")) );
                        //$this->salvarMetodoPago(3,intval($this->request->getData("numeroTar")));
                    }

                    $this->mudarCarrito($id, $check);
                    return $this->redirect(['action' => 'index']);
                }
            }else{
                $this->Flash->error(__('Debe marcar una de las opciones de pago'));
            }
        }
    }

    public function salvarEfectivo($cantidad){
        $connection = ConnectionManager::get('default');
        $connection->insert('efectivo', [
            'efe_cantidad' => $cantidad, 
            ]);
        
    }

    public function salvarMetodoPago($check, $metodo){
        $connection = ConnectionManager::get('default');
        $factura = $connection->execute('SELECT MAX(fac_numero) AS fac_numero FROM factura')->fetchAll('assoc');
        if($check ==1){
            $connection->insert('factura_metodo', [
                'fac_numero' => $factura[0]['fac_numero'],
                'efe_met_pag_numero'=> $metodo,      
                ]);

        }elseif($check ==2){
            $connection->insert('factura_metodo', [
                'fac_numero' => $factura[0]['fac_numero'],
                'che_met_pag_numero'=> $metodo,      
                ]);


        }elseif($check ==3){
            $connection->insert('factura_metodo', [
                'fac_numero' => $factura[0]['fac_numero'],
                'deb_met_pag_numero'=> $metodo,      
                ]);

        }
        
    }

    public function salvarCheque($numero, $cantidad){
        $connection = ConnectionManager::get('default');
        $connection->insert('cheque', [
            'met_pag_numero' => $numero,
            'che_cantidad'=> $cantidad, 
            'che_pagar_a'=>'UCABMART',
            ]);
    }
    public function salvarTarjeta($numero, $cuenta, $fechaEmision, $cvv){
        $connection = ConnectionManager::get('default');
        $connection->insert('tarjeta_de_debito', [
            'met_pag_numero'=>$numero,
            'tar_deb_tipo_cuenta' => $cuenta,
            'tar_deb_tipo'=> 'maestro', 
            'tar_deb_fecha_emision'=>$fechaEmision, 
            'tar_deb_cvv'=>$cvv, 
            
            ]);
    }
    public function mudarCarrito($id, $check){
        $connection = ConnectionManager::get('default');
        if($check == 1){
            $query = $connection->execute('SELECT car_unidades_producto, prod_codigo, car_com_precio FROM carrito_de_compras_fisico WHERE FK_per_jur = :i', ['i'=>$id])->fetchAll('assoc');
        }else{
            $query = $connection->execute('SELECT car_unidades_producto, prod_codigo, car_com_precio FROM carrito_de_compras_fisico WHERE FK_per_nat = :i', ['i'=>$id])->fetchAll('assoc');
        }
        $factura = $connection->execute('SELECT MAX(fac_numero) AS fac_numero FROM factura')->fetchAll('assoc');
        foreach($query as $query){
            $connection->insert('factura_producto', [
                'fac_numero' => $factura[0]['fac_numero'],
                'prod_codigo'=> $query['prod_codigo'], 
                'fac_prod_cantidad'=>$query['car_unidades_producto'], 
                'fac_prod_precio'=>$query['car_com_precio'], 
                
                ]);

            $this->delete2($id, $check,$query['prod_codigo']);
            $this->descontar($query['car_unidades_producto'], $query['prod_codigo']);
        }
            
    }
    public function descontar($cantidad, $producto){
        $connection = ConnectionManager::get('default');
        $tienda = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $this->loadComponent('Productos'); 
        $actual = $this->Productos->producto($tienda, $producto); 
        $connection->update('pasillo_producto', ['pas_prod_cantidad' => $actual[0]['pas_prod_cantidad'] - $cantidad], ['zon_pas_codigo'=>$actual[0]['zon_pas_codigo']]);
        
    }
    public function crearFactura($id, $total, $check){
        $connection = ConnectionManager::get('default');
        $fecha = date('Y-m-d');
        $tienda = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        if($check == 1){
            $connection->insert('factura', [
                    'fac_fecha_hora' => $fecha,
                    'fk_mon_codigo'=> 1, 
                    'FK_persona_juridica'=>$id, 
                    'fac_puntos_generado'=>10, 
                    'fac_total'=>$total, 
                    'FK_tie_codigo'=>$tienda
                    ]);
        }else{
            $connection->insert('factura', [
                'fac_fecha_hora' => $fecha,
                'fk_mon_codigo'=> 1, 
                'FK_persona_natural'=>$id, 
                'fac_puntos_generado'=>10, 
                'fac_total'=>$total, 
                'FK_tie_codigo'=>$tienda
                ]);
        }
    }


    public function pasillos(){
        $this->cargar();
        
    }

    public function reponer($producto){
        $this->cargar();
        $id = $producto;
        $connection = ConnectionManager::get('default');
        $almacen = $this->cuantohayalmacen($producto); 
        $producto = $connection->execute('SELECT prod_nombre, prod_imagen, prod_precio_bolivar, prod_codigo, prod_descripcion FROM producto WHERE prod_codigo = :i', ['i'=>$producto])->fetchAll('assoc');
        $this->set('total', $this->cuantohay($producto[0]['prod_codigo']));    
        $this->set('almacen', $almacen[0]['Total']);
        $this->set('producto', $producto );
        if ($this->request->is('post')) {
            if($this->request->getData("cantidad")< 0){
                $this->Flash->error(__("Cantidad en negativo"));
            }elseif($this->request->getData("cantidad")>$almacen){
                $this->Flash->error(__("Cantidad mayor que la existente"));
            }
            
            $this->llenarPasillo($this->request->getData("cantidad"),$this->cuantohay($producto[0]['prod_codigo']),$this->obtenerzon($producto[0]['prod_codigo']), $id); 
            $this->restarAlmacen($this->request->getData("cantidad"), $almacen[0]['Total'], $almacen[0]['zon_codigo'], $id);

            return $this->redirect(['action' => 'index']);
        }


    }

    public function llenarPasillo($cantidad, $total,$zon_pas_codigo, $prod_codigo){
        $connection = ConnectionManager::get('default');
        $connection->update("pasillo_producto", [
            'pas_prod_cantidad'=>$total+$cantidad
        ], ['zon_pas_codigo'=>$zon_pas_codigo, 'prod_codigo'=>$prod_codigo]);
    }
    public function restarAlmacen($cantidad, $total, $zon_codigo, $prod_codigo){
        $connection = ConnectionManager::get('default');
        $connection->update("zona_producto", [
            'zon_pro_cantidad_de_producto'=>$total-$cantidad
        ], ['zon_codigo'=>$zon_codigo, 'prod_codigo'=>$prod_codigo]);

    }
    public function cuantohayalmacen($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $cantidad = $connection->execute('SELECT SUM(zon_pro_cantidad_de_producto) as Total, zona.zon_codigo  FROM zona_producto JOIN zona ON zona.zon_codigo = zona_producto.zon_codigo JOIN almacen on zona.fk_alm_codigo = almacen.alm_codigo JOIN tienda ON tienda.fk_alm_codigo = almacen.alm_codigo  where prod_codigo=:i  AND tie_codigo =:j',['i'=>$productocodigo,'j'=>$tienda])->fetchAll('assoc');
        return $cantidad;
    }

}
