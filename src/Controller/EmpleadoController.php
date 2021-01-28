<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Empleado Controller
 *
 * @property \App\Model\Table\EmpleadoTable $Empleado
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpleadoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT emp_cedula, emp_primer_nombre, emp_primer_apellido, lug_nombre, tie_direccion FROM ucabmart.empleado JOIN ucabmart.lugar ON lugar.lug_codigo = FK_lug_codigo JOIN ucabmart.tienda ON tie_codigo = FK_tie_codigo ;')->fetchAll('assoc');
        $this->set(compact('query'));
       
    }

    /**
     * View method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empleado = $this->Empleado->get($id, [
            'contain' => ['Beneficio'],
        ]);

        $this->set(compact('empleado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function salvarRoles($roles, $usuario){
        $connection = ConnectionManager::get('default');
        foreach($roles as $rol){    
            $connection->insert('rol_cuenta_usuario', [
            'rol_codigo' => $rol,
            'cue_usu_email' => $usuario
            ]);
        }
    }
    public function add()
    {
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
     
        $this->getEstados();
        $this->getTiendas();
        $this->getBeneficios();
        $this->getRoles();
        $empleado = $this->Empleado->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $empleado = $this->Empleado->patchEntity($empleado, $this->request->getData());  // SE INSERTA LA PERSONA NATURAL 
            if ($this->Empleado->save($empleado)) {
                $this->salvarRoles($this->request->getData('roles'), $this->request->getData('cuenta_usuario.cue_usu_email'));
                    return $this->redirect(['controller'=>'inicio','action' => 'index']);

                
            }
            
        }
        $this->set(compact('empleado'));
    }

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'E empleado'){
                    if(in_array($this->request->getParam('action'), array('edit', 'getBeneficios', 'getTiendas','getEstados','municipios', 'parroquias'))){
                        return true;
                    }           
                }elseif($privilegio == 'Despedir'){
                    if(in_array($this->request->getParam('action'), array('delete'))){
                        return true;
                    }
                }elseif($privilegio == 'Contratar'){
                    if(in_array($this->request->getParam('action'), array('add', 'getBeneficios', 'getTiendas','getEstados','municipios', 'parroquias', 'getRoles'))){
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

    public function getRoles(){
        $this->loadComponent('Rol');
        $rolSQL= $this->Rol->roles(); 
        $roles = $this->Rol->rolSelect($rolSQL); 
        $this->set('roles',$roles);
    }
    public function getBeneficios(){
        $this->loadComponent('Beneficio');
        $beneficioSQL= $this->Beneficio->beneficios(); 
        $beneficios = $this->Beneficio->beneficioSelect($beneficioSQL); 
        $this->set('beneficio',$beneficios);
    }

    public function getTiendas(){
        $tiendasSQL = $this->Tienda->tiendas(); 
        $tiendas = $this->Tienda->tiendaSelect($tiendasSQL);
        $this->set('tiendas', $tiendas);
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
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empleado = $this->Empleado->get($id, [
            'contain' => ['Beneficio'],
        ]);
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
        $this->getEstados();
        $this->getTiendas();
        $this->getBeneficios();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $empleado = $this->Empleado->patchEntity($empleado, $this->request->getData());
            if ($this->Empleado->save($empleado)) {
                $this->Flash->success(__('The empleado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empleado could not be saved. Please, try again.'));
        }
        $beneficio = $this->Empleado->Beneficio->find('list', ['limit' => 200]);
        $this->set(compact('empleado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empleado = $this->Empleado->get($id);
        if ($this->Empleado->delete($empleado)) {
            $this->Flash->success(__('The empleado has been deleted.'));
        } else {
            $this->Flash->error(__('The empleado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
