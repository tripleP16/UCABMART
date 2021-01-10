<?php
declare(strict_types=1);

namespace App\Controller;
use App\Form\ExcelForm;
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
        $ExcelForm = new ExcelForm();
        if ($this->request->is('post')) {
            if ($ExcelForm->execute($this->request->getData())) {
                $attachment = $this->request->getUploadedFile('archivo_excel');
               
                $name = $attachment->getClientFilename();
                $target = WWW_ROOT.'excel'.DS.$name;
                $attachment->moveTo($target);
                $this->pruebaexcel($target, $this->request->getData('dia_inicio'),$this->request->getData('dia_fin'));
                $this->Flash->success('We will get back to you soon.');
               
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        
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


    

    public function pruebaexcel ($ruta, $dia_inicio, $dia_fin){
        die($ruta." ".$dia_inicio." ".$dia_fin);
    }
}
