<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * PersonaNatural Controller
 *
 * @property \App\Model\Table\PersonaNaturalTable $PersonaNatural
 * @property \App\Model\Table\LugarTable $lugares
 * 
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaNaturalController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function initialize(): void
     {
        $this->loadComponent('Lugar');
        $this->loadComponent('Telefono');
        $this->loadComponent('Tienda');
        $this->loadComponent('CuentaUsuario');
        $estadoSQL= $this->Lugar->estados();
        $estados = $this->Lugar->estadoSelect($estadoSQL) ; 
        $this->set('estados', $estados);
       print_r( $this->request->getData("Estado"));
     }

    
    public function index()
    {
        $personaNatural = $this->paginate($this->PersonaNatural);

        $this->set(compact('personaNatural'));
    }

    /**
     * View method
     *
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personaNatural = $this->PersonaNatural->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('personaNatural'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        
        $this->set(compact('personaNatural'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personaNatural = $this->PersonaNatural->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());
            if ($this->PersonaNatural->save($personaNatural)) {
                $this->Flash->success(__('The persona natural has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona natural could not be saved. Please, try again.'));
        }
        $this->set(compact('personaNatural'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personaNatural = $this->PersonaNatural->get($id);
        if ($this->PersonaNatural->delete($personaNatural)) {
            $this->Flash->success(__('The persona natural has been deleted.'));
        } else {
            $this->Flash->error(__('The persona natural could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
