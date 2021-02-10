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
                    if(in_array($this->request->getParam('action'), array('index','add','view'))){
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
    public function edit($id = null)
    {
        $ordenDeCompra = $this->OrdenDeCompra->get($id, [
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
    }

    

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
