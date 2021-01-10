<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Excel Controller
 *
 * @method \App\Model\Entity\Excel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExcelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $excel = $this->paginate($this->Excel);

        $this->set(compact('excel'));
    }

    /**
     * View method
     *
     * @param string|null $id Excel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $excel = $this->Excel->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('excel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $excel = $this->Excel->newEmptyEntity();
        if ($this->request->is('post')) {
            $excel = $this->Excel->patchEntity($excel, $this->request->getData());
            if ($this->Excel->save($excel)) {
                $this->Flash->success(__('The excel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excel could not be saved. Please, try again.'));
        }
        $this->set(compact('excel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Excel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $excel = $this->Excel->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $excel = $this->Excel->patchEntity($excel, $this->request->getData());
            if ($this->Excel->save($excel)) {
                $this->Flash->success(__('The excel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excel could not be saved. Please, try again.'));
        }
        $this->set(compact('excel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Excel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $excel = $this->Excel->get($id);
        if ($this->Excel->delete($excel)) {
            $this->Flash->success(__('The excel has been deleted.'));
        } else {
            $this->Flash->error(__('The excel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function reporteasistenciaexcel (){

    }
}
