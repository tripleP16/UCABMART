<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * OrdenDeCompra Controller
 *
 * @property \App\Model\Table\OrdenDeCompraTable $OrdenDeCompra
 * @method \App\Model\Entity\OrdenDeCompra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdenDeCompraController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT ord_com_numero,ord_com_fecha_creada,ord_com_fecha_despacho,ord_com_pagada,FK_pro_rif FROM ucabmart.orden_de_compra JOIN ucabmart.proveedor ON orden_de_compra.fk_pro_rif=proveedor.pro_rif ORDER BY ord_com_fecha_creada ASC  ');
        $this->set(compact('query'));
    }



    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Orden de Compra'){
                    if(in_array($this->request->getParam('action'), array('index','add','view','edit'))){
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

    /**
     * View method
     *
     * @param string|null $id Orden De Compra id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordenDeCompra = $this->OrdenDeCompra->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('ordenDeCompra'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordenDeCompra = $this->OrdenDeCompra->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordenDeCompra = $this->OrdenDeCompra->patchEntity($ordenDeCompra, $this->request->getData());
            if ($this->OrdenDeCompra->save($ordenDeCompra)) {
                $this->Flash->success(__('The orden de compra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden de compra could not be saved. Please, try again.'));
        }
        $this->set(compact('ordenDeCompra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden De Compra id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id,$estado)
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT * FROM ucabmart.orden_de_compra WHERE ord_com_numero=:i AND ord_com_pagada=:e',['i'=>$id,'e'=>$estado])->fetchAll('assoc');
        $this->set('query',$query );


        if($estado=='Pagado'){
        //$this->hacercambios($id);
        return $this->redirect(['action' => 'index']);
        }
        

        return $this->redirect(['action' => 'index']);
    }

    public function hacercambios($id){
        $connection = ConnectionManager::get('default');
        $fechaActual = date('Y-m-d');
        $connection->update('orden_de_compra',['ord_com_fecha_despacho'=>$fechaActual],['ord_com_numero'=>$id]);

        $Tienda=$this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $k=$connection->execute('SELECT zona.zon_codigo as zon_codigo FROM zona JOIN zona_producto ON zona.zon_codigo = zona_producto.zon_codigo WHERE FK_alm_codigo = :Q AND prod_codigo = :Y',['Q'=>$Tienda,'Y'=>$id])->fetchAll('assoc');
        $cantidad = $this->cuantohay($id); 

        $connection->update('zona_producto', ['zon_pro_cantidad_de_producto' => $cantidad+100], ['prod_codigo' => $J,'zon_codigo'=>$k[0]['zon_codigo']]);
    }

    public function cuantohay($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $cantidad = $connection->execute('SELECT SUM(zon_pro_cantidad_de_producto) as Total FROM zona_producto JOIN zona ON zona.zon_codigo = zona_producto.zon_codigo JOIN almacen on zona.fk_alm_codigo = almacen.alm_codigo JOIN tienda ON tienda.fk_alm_codigo = almacen.alm_codigo  where prod_codigo=:i  AND tie_codigo =:j',['i'=>$productocodigo,'j'=>$tienda])->fetchAll('assoc');
        return $cantidad[0]['Total'];
    }

    /*    $ordenDeCompra = $this->OrdenDeCompra->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordenDeCompra = $this->OrdenDeCompra->patchEntity($ordenDeCompra, $this->request->getData());
            if ($this->OrdenDeCompra->save($ordenDeCompra)) {
                $this->Flash->success(__('The orden de compra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden de compra could not be saved. Please, try again.'));
        }
        $this->set(compact('ordenDeCompra'));
    */

    /**
     * Delete method
     *
     * @param string|null $id Orden De Compra id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenDeCompra = $this->OrdenDeCompra->get($id);
        if ($this->OrdenDeCompra->delete($ordenDeCompra)) {
            $this->Flash->success(__('The orden de compra has been deleted.'));
        } else {
            $this->Flash->error(__('The orden de compra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
