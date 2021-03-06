<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * EstadoFactura Controller
 *
 * @property \App\Model\Table\EstadoFacturaTable $EstadoFactura
 * @method \App\Model\Entity\EstadoFactura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstadoFacturaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $connection = ConnectionManager::get('default');
        //$estadoFactura = $this->paginate($this->EstadoFactura);
        $query= $connection->execute('SELECT fac_numero,fac_fecha_hora,est_nombre,estado_factura.est_codigo FROM ucabmart.estado_factura JOIN ucabmart.estado ON estado_factura.est_codigo=estado.est_codigo');

        $this->set('query',$query);

        //$this->set(compact('estadoFactura'));
    }

    /**
     * View method
     *
     * @param string|null $id Estado Factura id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadoFactura = $this->EstadoFactura->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('estadoFactura'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadoFactura = $this->EstadoFactura->newEmptyEntity();
        if ($this->request->is('post')) {
            $estadoFactura = $this->EstadoFactura->patchEntity($estadoFactura, $this->request->getData());
            if ($this->EstadoFactura->save($estadoFactura)) {
                $this->Flash->success(__('The estado factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estado factura could not be saved. Please, try again.'));
        }
        $this->set(compact('estadoFactura'));
    }

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Despacho' || $privilegio == 'Entrega'){
                    if(in_array($this->request->getParam('action'), array('index', 'edit'))){
                        return true;
                    }else{
                        return false;
                    }
                        
                }
            }
            
            return false;
        }else{
            return false;
        }

        return false;
    }
    /**
     * Edit method
     *
     * @param string|null $id Estado Factura id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($codigo,$facNumero)
    {
       
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT * FROM ucabmart.estado_factura WHERE fac_numero=:i AND est_codigo=:e',['i'=>$facNumero,'e'=>$codigo])->fetchAll('assoc');
        $this->set('query',$query );
        $estados = $this->obtenerEstados();
        $this->set('estados',$estados );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->actualizar($this->request->getData('Estado'), $facNumero, $codigo); 

            return $this->redirect(['action' => 'index']);

            $this->Flash->error(__('The estado factura could not be saved. Please, try again.'));
        }
    }

    public function actualizar($estado_codigo, $facNumero, $codigoPrevio){
        $connection = ConnectionManager::get('default');
        $connection->update('estado_factura', ['est_codigo' => $estado_codigo], ['est_codigo'=>$codigoPrevio, 'fac_numero'=>$facNumero]);

    }

    public function obtenerEstados(){ 
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT * FROM ucabmart.estado')->fetchAll('assoc');
        return $this->devolverSelect($query);
    }

    public function devolverSelect($estadoSQL){
        $estados = array() ; 
        $i = 0;
        foreach($estadoSQL as $estado){
            $estados += [
                $estadoSQL[$i]['est_codigo']=>$estadoSQL[$i]['est_nombre']
            ];
            $i ++;
        };
        return $estados;
    }


    /**
     * Delete method
     *
     * @param string|null $id Estado Factura id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadoFactura = $this->EstadoFactura->get($id);
        if ($this->EstadoFactura->delete($estadoFactura)) {
            $this->Flash->success(__('The estado factura has been deleted.'));
        } else {
            $this->Flash->error(__('The estado factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
