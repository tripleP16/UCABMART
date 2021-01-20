<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CuentaUsuario Controller
 *
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CuentaUsuarioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cuentaUsuario = $this->paginate($this->CuentaUsuario);

        $this->set(compact('cuentaUsuario'));
    }

    /**
     * View method
     *
     * @param string|null $id Cuenta Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cuentaUsuario = $this->CuentaUsuario->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cuentaUsuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cuentaUsuario = $this->CuentaUsuario->newEmptyEntity();
        if ($this->request->is('post')) {
            $cuentaUsuario = $this->CuentaUsuario->patchEntity($cuentaUsuario, $this->request->getData());
            if ($this->CuentaUsuario->save($cuentaUsuario)) {
                $this->Flash->success(__('The cuenta usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuenta usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('cuentaUsuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cuenta Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cuentaUsuario = $this->CuentaUsuario->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cuentaUsuario = $this->CuentaUsuario->patchEntity($cuentaUsuario, $this->request->getData());
            if ($this->CuentaUsuario->save($cuentaUsuario)) {
                $this->Flash->success(__('The cuenta usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuenta usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('cuentaUsuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cuenta Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cuentaUsuario = $this->CuentaUsuario->get($id);
        if ($this->CuentaUsuario->delete($cuentaUsuario)) {
            $this->Flash->success(__('The cuenta usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The cuenta usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login(){
        if($this->request->is('post')){
            $cuentaUsuario=$this->Auth->identify();
            if( $cuentaUsuario){
                $this->Auth->setUser( $cuentaUsuario);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error('Datos son invalidos, por favor intente nuevamente',['key'=>'auth']);
            }
        }
    }
}
