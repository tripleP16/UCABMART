<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * Reporte Controller
 *
 * @method \App\Model\Entity\Reporte[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReporteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $reporte = $this->paginate($this->Reporte);

        $this->set(compact('reporte'));
    }

    /**
     * View method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reporte = $this->Reporte->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('reporte'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reporte = $this->Reporte->newEmptyEntity();
        if ($this->request->is('post')) {
            $reporte = $this->Reporte->patchEntity($reporte, $this->request->getData());
            if ($this->Reporte->save($reporte)) {
                $this->Flash->success(__('The reporte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporte could not be saved. Please, try again.'));
        }
        $this->set(compact('reporte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reporte = $this->Reporte->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reporte = $this->Reporte->patchEntity($reporte, $this->request->getData());
            if ($this->Reporte->save($reporte)) {
                $this->Flash->success(__('The reporte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporte could not be saved. Please, try again.'));
        }
        $this->set(compact('reporte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reporte = $this->Reporte->get($id);
        if ($this->Reporte->delete($reporte)) {
            $this->Flash->success(__('The reporte has been deleted.'));
        } else {
            $this->Flash->error(__('The reporte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function archivo (){
        
    }
    public function personanaturalreport ($id, $tienda){
        $persona = $id;
        $connection = ConnectionManager::get('default');
        $maximo_nat = $connection->execute('SELECT MAX(per_nat_identificador_tienda) as maximo FROM ucabmart.persona_natural WHERE FK_tie_codigo ='.$tienda)->fetchAll('assoc');
        $identificador = $connection->execute('SELECT per_nat_identificador_tienda FROM ucabmart.persona_natural WHERE per_nat_cedula = '."'".$id."'" )->fetchAll('assoc');
        if(empty($identificador['per_nat_identificador_tienda'])){
            $connection->update('persona_natural', ['per_nat_identificador_tienda' => $maximo_nat['maximo'] + 1 ], ['per_nat_cedula' => $id]);
            $this->set('identificador',$maximo_nat['maximo'] + 1 );
        }else{
            $this->set('identificador',$identificador['per_nat_identificador_tienda'] );
        }
        $this->set('persona', $persona);
        //return $this->redirect(['controller'=>'PersonaNatural','action' => 'index']);
    }
    public function personajuridicareport (){

    }
}
