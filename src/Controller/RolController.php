<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Rol Controller
 *
 * @property \App\Model\Table\RolTable $Rol
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $rol = $this->paginate($this->Rol);

        $this->set(compact('rol'));
    }

    /**
     * View method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rol = $this->Rol->get($id, [
            'contain' => ['CuentaUsuario'],
        ]);

        $this->set(compact('rol'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rol = $this->Rol->newEmptyEntity();
        if ($this->request->is('post')) {
            $rol = $this->Rol->patchEntity($rol, $this->request->getData());
            if ($this->Rol->save($rol)) {
                $this->Flash->success(__('The rol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rol could not be saved. Please, try again.'));
        }
        $cuentaUsuario = $this->Rol->CuentaUsuario->find('list', ['limit' => 200]);
        $this->set(compact('rol', 'cuentaUsuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rol = $this->Rol->get($id, [
            'contain' => ['CuentaUsuario'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rol = $this->Rol->patchEntity($rol, $this->request->getData());
            if ($this->Rol->save($rol)) {
                $this->Flash->success(__('The rol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rol could not be saved. Please, try again.'));
        }
        $cuentaUsuario = $this->Rol->CuentaUsuario->find('list', ['limit' => 200]);
        $this->set(compact('rol', 'cuentaUsuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rol = $this->Rol->get($id);
        if ($this->Rol->delete($rol)) {
            $this->Flash->success(__('The rol has been deleted.'));
        } else {
            $this->Flash->error(__('The rol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
