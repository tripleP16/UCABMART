<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * Tienda Controller
 *
 * @property \App\Model\Table\TiendaTable $Tienda
 * @method \App\Model\Entity\Tienda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiendaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Gestion Tienda'){
                    if(in_array($this->request->getParam('action'), array('index','add','edit','delete', 'getBeneficios', 'getTiendas','getEstados','municipios', 'parroquias'))){
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
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT tie_codigo, tie_direccion, tie_rif,FK_alm_codigo, lug_nombre FROM ucabmart.tienda JOIN ucabmart.lugar ON tienda.FK_lug_codigo = lugar.lug_codigo;');

        $this->set(compact('query'));
    }

    /**
     * View method
     *
     * @param string|null $id Tienda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tienda = $this->Tienda->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tienda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('Lugar'); 
        $this->loadComponent('Almacen');
        $this->getAlmacenes();
        $this->getEstados(); 
        $tienda = $this->Tienda->newEmptyEntity();

        if ($this->request->is('post')) {
            $tienda = $this->Tienda->patchEntity($tienda, $this->request->getData());
            
            $tienda->FK_alm_codigo = $this->crearAlmacen( $tienda->tie_direccion);
            if ($this->Tienda->save($tienda)) {
               

                return $this->redirect(['controller'=>'inicio','action' => 'index']);
            }
            $this->Flash->error(__('The tienda could not be saved. Please, try again.'));
        }
        $this->set(compact('tienda'));
    }

    public function crearAlmacen( $direccion){
        $connection = ConnectionManager::get('default');
        $connection->insert('almacen',[
            'alm_dirección'=>$direccion,
            'alm_codigo'=>null
        ]);

        $codigo = $connection->execute('SELECT MAX(alm_codigo ) alm_codigo FROM almacen ')->fetchAll('assoc');
        return $codigo[0]['alm_codigo'];

    }
    public function getAlmacenes(){
        $almacenSQL = $this->Almacen->almacenes(); 
        $almacenes = $this->Almacen->almacenSelect($almacenSQL);
        $this->set('almacenes',$almacenes);
    }

    public function getEstados(){
        $estadosSQL = $this->Lugar->estados(); 
        $estados = $this->Lugar->lugarSelect($estadosSQL);
        $this->set('estados', $estados);
    }

    public function municipios(){
        $id = $this->request->getData('id');
        $tipo = 'lugar';
        $this->loadComponent('Lugar'); 
        $municipiosSQL = $this->Lugar->municipios($id); 
        $municipios = $this->Lugar->devolverSelect($municipiosSQL, $tipo);
        exit(json_encode($municipios));
    
    }

    public function parroquias(){
        $id = $this->request->getData('id');
        $this->loadComponent('Lugar'); 
        $tipo = 'lugar';
        $parroquiasSQL= $this->Lugar->parroquias($id); 
        $parroquias = $this->Lugar->devolverSelect($parroquiasSQL, $tipo);
        exit(json_encode($parroquias));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Tienda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tienda = $this->Tienda->get($id, [
            'contain' => [],
        ]);
        $this->loadComponent('Lugar'); 
        $this->getEstados(); 
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tienda = $this->Tienda->patchEntity($tienda, $this->request->getData());
            if ($this->Tienda->save($tienda)) {
                $this->Flash->success(__('The tienda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tienda could not be saved. Please, try again.'));
        }
        $this->set(compact('tienda'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tienda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tienda = $this->Tienda->get($id);
        if ($this->Tienda->delete($tienda)) {
            $this->Flash->success(__('The tienda has been deleted.'));
        } else {
            $this->Flash->error(__('The tienda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
