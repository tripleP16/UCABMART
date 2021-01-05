<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Almacen Controller
 *
 * @property \App\Model\Table\AlmacenTable $Almacen
 * @method \App\Model\Entity\Almacen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlmacenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $almacen = $this->paginate($this->Almacen);

        $this->set(compact('almacen'));
    }

    /**
     * View method
     *
     * @param string|null $id Almacen id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $almacen = $this->Almacen->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('almacen'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $almacen = $this->Almacen->newEmptyEntity();
        if ($this->request->is('post')) {
            $almacen = $this->Almacen->patchEntity($almacen, $this->request->getData());
            if ($this->Almacen->save($almacen)) {
                $this->Flash->success(__('The almacen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacen could not be saved. Please, try again.'));
        }
        $this->set(compact('almacen'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Almacen id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $almacen = $this->Almacen->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $almacen = $this->Almacen->patchEntity($almacen, $this->request->getData());
            if ($this->Almacen->save($almacen)) {
                $this->Flash->success(__('The almacen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacen could not be saved. Please, try again.'));
        }
        $this->set(compact('almacen'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Almacen id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $almacen = $this->Almacen->get($id);
        if ($this->Almacen->delete($almacen)) {
            $this->Flash->success(__('The almacen has been deleted.'));
        } else {
            $this->Flash->error(__('The almacen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
