<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;


/**
 * Rol Controller
 *
 * @property \App\Model\Table\RolTable $Rol
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolController extends AppController
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
                if($privilegio == 'Crear Rol'){
                    if(in_array($this->request->getParam('action'), array('add'))){
                        return true;
                    }           
                }elseif($privilegio == 'Editar Rol'){
                    if(in_array($this->request->getParam('action'), array('edit'))){
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
        $rol = $this->paginate($this->Rol);

        $this->set(compact('rol'));
    }

    /**
     * View method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rol = $this->Rol->get($id, [
            'contain' => ['CuentaUsuario'],
        ]);

        $this->set(compact('rol'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function salvarRol($nombre){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol', [
            'rol_nombre' => $nombre,
        ]);
    }

    public function salvarPrivilegios($rol_codigo, $privilegios){
        $connection = ConnectionManager::get('default');

        foreach ($privilegios as $privilegio){
            $connection->insert('cuenta_privilegio', [
                'rol_codigo' => $rol_codigo,
                'priv_codigo'=>$privilegio +1
            ]);
        }
    }

    public function obtenerCodigo(){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT MAX(rol_codigo) as maximo FROM rol WHERE rol_codigo <> 9 AND rol_codigo <> 11')->fetchAll('assoc');
        return $query[0]['maximo'];
    }
    public function add()
    {
        $this->getPriv();
        if ($this->request->is('post')) {
            if($this->request->getData('rol_nombre') == null ||$this->request->getData('privilegios') == null ){
                $this->Flash->error(__('Datos en blanco'));
            }else{
                $this->salvarRol($this->request->getData('rol_nombre') );
                $this->salvarPrivilegios($this->obtenerCodigo(), $this->request->getData('privilegios'));
                return $this->redirect(['controller'=>'inicio','action' => 'index']);
            }
        }
       
    }

    public function getPriv(){
        $this->loadComponent('Privilegio');
        $privilegioSQL= $this->Privilegio->privilegioes(); 
        $privilegio = $this->Privilegio->privilegioSelect($privilegioSQL); 
        $this->set('privilegios',$privilegio);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rol = $this->Rol->get($id, [
            'contain' => ['CuentaUsuario'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rol = $this->Rol->patchEntity($rol, $this->request->getData());
            if ($this->Rol->save($rol)) {
                $this->Flash->success(__('The rol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rol could not be saved. Please, try again.'));
        }
        $cuentaUsuario = $this->Rol->CuentaUsuario->find('list', ['limit' => 200]);
        $this->set(compact('rol', 'cuentaUsuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rol = $this->Rol->get($id);
        if ($this->Rol->delete($rol)) {
            $this->Flash->success(__('The rol has been deleted.'));
        } else {
            $this->Flash->error(__('The rol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
