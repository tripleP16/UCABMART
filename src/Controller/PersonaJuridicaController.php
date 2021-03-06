<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

use Cake\Event\EventInterface;


/**
 * PersonaJuridica Controller
 *
 * @property \App\Model\Table\PersonaJuridicaTable $PersonaJuridica
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaJuridicaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT per_jur_rif, per_jur_denominacion_comercial,per_jur_capital_disponible,tie_direccion,lug_nombre, tie_codigo FROM ucabmart.persona_juridica JOIN ucabmart.lugar ON lug_codigo = lugar_fiscal JOIN ucabmart.tienda ON persona_juridica.FK_tie_codigo = tie_codigo;')->fetchAll('assoc');

        $this->set(compact('query'));
    }
    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['add','getEstados', 'getTiendas', 'municipios', 'parroquias']);
        
    }
    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'E jur'){
                    if(in_array($this->request->getParam('action'), array('edit'))){
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
    
    public function initialize():void{
        parent::initialize();
    }
   
    /**
     * View method
     *
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personaJuridica = $this->PersonaJuridica->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('personaJuridica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
        $this->getEstados();
        $this->getTiendas();
        $personaJuridica = $this->PersonaJuridica->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            if ($this->PersonaJuridica->save($personaJuridica)) {
                $this->insertarRol($this->request->getData('cuenta_usuario.cue_usu_email'));
                return $this->redirect(['controller'=>'inicio','action' => 'index']);
            }
            
        }
        $this->set(compact('personaJuridica'));
    }
    public function insertarRol($email){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol_cuenta_usuario', [
            'rol_codigo'=>11, 
            'cue_usu_email'=>$email
        ]);
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
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personaJuridica = $this->PersonaJuridica->get($id, [
            'contain' => [],
        ]);
        $this->loadComponent('Lugar'); 
        $this->loadComponent('Tienda');
        $this->getEstados();
        $this->getTiendas();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            if ($this->PersonaJuridica->save($personaJuridica)) {
                $this->Flash->success(__('The persona juridica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona juridica could not be saved. Please, try again.'));
        }
        $this->set(compact('personaJuridica'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personaJuridica = $this->PersonaJuridica->get($id);
        if ($this->PersonaJuridica->delete($personaJuridica)) {
            $this->Flash->success(__('The persona juridica has been deleted.'));
        } else {
            $this->Flash->error(__('The persona juridica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
