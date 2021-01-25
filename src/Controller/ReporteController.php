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
        $maximo_nat = $connection->execute('SELECT MAX(per_nat_identificador_tienda) maximo FROM ucabmart.persona_natural WHERE FK_tie_codigo ='.$tienda)->fetchAll('assoc');
        $identificador = $connection->execute('SELECT per_nat_identificador_tienda FROM ucabmart.persona_natural WHERE per_nat_cedula = '."'".$id."'" )->fetchAll('assoc');
        $maximo_jur = $connection->execute('SELECT MAX(per_jur_identificador_tienda) maximo FROM ucabmart.persona_juridica WHERE FK_tie_codigo ='.$tienda)->fetchAll('assoc');

        if(empty($identificador[0]['per_nat_identificador_tienda'])){

            if($maximo_nat[0]['maximo']> $maximo_jur[0]['maximo']){
                $connection->update('persona_natural', ['per_nat_identificador_tienda' => $maximo_nat[0]['maximo'] + 1 ], ['per_nat_cedula' => $id]);
                $this->set('identificador',$maximo_nat[0]['maximo'] + 1 );
            }else{
                $connection->update('persona_natural', ['per_nat_identificador_tienda' => $maximo_jur[0]['maximo'] + 1 ], ['per_nat_cedula' => $id]);
                $this->set('identificador',$maximo_jur[0]['maximo'] + 1 );
            }
            
        }else{
            $this->set('identificador',$identificador[0]['per_nat_identificador_tienda'] );
        }
        $this->set('persona', $persona);
        //return $this->redirect(['controller'=>'PersonaNatural','action' => 'index']);
    }
    public function personajuridicareport ($id, $tienda){
        $persona = $id;
        $connection = ConnectionManager::get('default');
        $maximo_nat = $connection->execute('SELECT MAX(per_nat_identificador_tienda) maximo FROM ucabmart.persona_natural WHERE FK_tie_codigo ='.$tienda)->fetchAll('assoc');
        $identificador = $connection->execute('SELECT per_jur_identificador_tienda FROM ucabmart.persona_juridica WHERE per_jur_rif= '."'".$id."'" )->fetchAll('assoc');
        $maximo_jur = $connection->execute('SELECT MAX(per_jur_identificador_tienda) maximo FROM ucabmart.persona_juridica WHERE FK_tie_codigo ='.$tienda)->fetchAll('assoc');
        if(empty($identificador[0]['per_jur_identificador_tienda'])){

            if($maximo_nat[0]['maximo']> $maximo_jur[0]['maximo']){
                $connection->update('persona_juridica', ['per_jur_identificador_tienda' => $maximo_nat[0]['maximo'] + 1 ], ['per_jur_rif' => $id]);
                $this->set('identificador',$maximo_nat[0]['maximo'] + 1 );
            }else{
                $connection->update('persona_juridica', ['per_jur_identificador_tienda' => $maximo_jur[0]['maximo'] + 1 ], ['per_jur_rif' => $id]);
                $this->set('identificador',$maximo_jur[0]['maximo'] + 1 );
            }
            
        }else{
            $this->set('identificador',$identificador[0]['per_jur_identificador_tienda'] );
        }
        $this->set('persona', $persona); 
    }


    public function asistenciahorarioinforeport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function empleadoshorasreport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function ingresotiendareport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function egresotiendareport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }


}
