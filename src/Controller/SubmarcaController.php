<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * Submarca Controller
 *
 * @property \App\Model\Table\SubmarcaTable $Submarca
 * @method \App\Model\Entity\Submarca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmarcaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $submarca = $this->paginate($this->Submarca);

        $this->set(compact('submarca'));
    }

    /**
     * View method
     *
     * @param string|null $id Submarca id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submarca = $this->Submarca->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('submarca'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submarca = $this->Submarca->newEmptyEntity();
        if ($this->request->is('post')) {
            $submarca = $this->Submarca->patchEntity($submarca, $this->request->getData());
            if ($this->Submarca->save($submarca)) {
                $this->Flash->success(__('The submarca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submarca could not be saved. Please, try again.'));
        }
        $this->set(compact('submarca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submarca id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submarca = $this->Submarca->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submarca = $this->Submarca->patchEntity($submarca, $this->request->getData());
            if ($this->Submarca->save($submarca)) {
                $this->Flash->success(__('The submarca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submarca could not be saved. Please, try again.'));
        }
        $this->set(compact('submarca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submarca id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submarca = $this->Submarca->get($id);
        if ($this->Submarca->delete($submarca)) {
            $this->Flash->success(__('The submarca has been deleted.'));
        } else {
            $this->Flash->error(__('The submarca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
