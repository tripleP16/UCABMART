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
    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'E nat'){
                    if(in_array($this->request->getParam('action'), array('personanaturalreport','asistenciahorarioinfoADDreport'))){
                        return true;
                    }           
                }elseif($privilegio == 'E jur'){
                    if(in_array($this->request->getParam('action'), array('personajuridicareport'))){
                        return true;
                    }
                }elseif($privilegio == 'Asistencia'){
                    if(in_array($this->request->getParam('action'), array( 'asistenciahorarioinfoaddreport',' asistenciahorarioinforeport', 'empleadoshorasaddreport','empleadoshorasreport' ))){
                        return true;
                    }
                }elseif($privilegio == 'Rendimiento'){
                    if(in_array($this->request->getParam('action'), array('ingresotiendaaddreport', 'ingresotiendareport', 'egresotiendaaddreport', 'egresotiendareport', 'diezmejoresclientesreport','cincomejoresclientesmontoreport', 'mesesproductivosdelyearaddreport', 'mesesproductivosdelyearreport','productosvendidospormesaddreport', 'productosvendidospormesreport','ordenesdecomprareport', 'ordenesdecompraaddreport'))){
                        return true;
                    }

                }
                
            }
            
            return false;
        }else{
            return false;
        }

        return false;
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


    public function asistenciahorarioinfoaddreport (){
        if ($this->request->is('post')) {
        return $this->redirect(['action' => 'asistenciahorarioinforeport', $this->request->getData('dia_inicio'),$this->request->getData('dia_fin')]);
        }
    }

    public function asistenciahorarioinforeport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function empleadoshorasaddreport (){
        if ($this->request->is('post')) {
        return $this->redirect(['action' => 'empleadoshorasreport', $this->request->getData('dia_inicio'),$this->request->getData('dia_fin')]);
        }
    }
    
    public function empleadoshorasreport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function ingresotiendaaddreport (){
        if ($this->request->is('post')) {
        return $this->redirect(['action' => 'ingresotiendareport', $this->request->getData('dia_inicio'),$this->request->getData('dia_fin')]);
        }
    }

    public function ingresotiendareport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function egresotiendaaddreport (){
        if ($this->request->is('post')) {
        return $this->redirect(['action' => 'egresotiendareport', $this->request->getData('dia_inicio'),$this->request->getData('dia_fin')]);
        }
    }

    public function egresotiendareport ($dia_inicio, $dia_fin){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
    }

    public function diezmejoresclientesreport ($dia_inicio, $dia_fin, $codigo_tienda){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
        $this->set('codigo_tienda', $codigo_tienda);
    }

    public function cincomejoresclientesmontoreport($dia_inicio, $dia_fin, $codigo_tienda){
        $this->set('dia_inicio', $dia_inicio);
        $this->set('dia_fin', $dia_fin);
        $this->set('codigo_tienda', $codigo_tienda);
    }

    public function mesesproductivosdelyearaddreport(){
        if ($this->request->is('post')) {
            return $this->redirect(['action' => 'mesesproductivosdelyearreport', $this->request->getData('year')]);
        }
    }

    public function mesesproductivosdelyearreport($year){
        $this->set('year', $year);
    }

    public function productosvendidospormesaddreport (){
        $this->loadComponent('Year');
        $years = $this->Year->yearSelect(); 
        $mes = $this->Year->mesSelect(); 
        $this->set('mes', $mes);
        $this->set('year', $years);
        
        if ($this->request->is('post')) {
            if($this->request->getData('month')>12 || $this->request->getData('month')<0){ 
                $this->Flash->error(__('Número de mes inválido. Por favor intente de nuevo con meses de 1-12.'));
                return $this->redirect(['action' => 'productosvendidospormesaddreport']);
            }else{
                return $this->redirect(['action' => 'productosvendidospormesreport', $this->request->getData('year'), $this->request->getData('month')]);    
            }
        }
    }
    public function ordenesdecompraaddreport(){
        $this->loadComponent('Tienda');
        $this->getTiendas();

    }
    public function getTiendas(){
        $tiendasSQL = $this->Tienda->tiendas(); 
        $tiendas = $this->Tienda->tiendaSelect($tiendasSQL);
        $this->set('tiendas', $tiendas);
    }
    public function productosvendidospormesreport($year,$month){
        $this->set('year', $year);
        $this->set('month', $month);
    }



    public function ordenesdecomprareport($codigo_orden_de_compra){
        $this->set('codigo_orden_de_compra', $codigo_orden_de_compra);
    }
  


}
