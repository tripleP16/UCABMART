<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Cajero Controller
 * @property \App\Model\Table\PersonaNaturalTable $PersonaNatural
 *  @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @method \App\Model\Entity\Cajero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CajeroController extends AppController
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
                if($privilegio == 'Cajero'){
                    if(in_array($this->request->getParam('action'), array('index', 'anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural'))){
                        return true;
                    }           
                }elseif($privilegio == 'Rellenar Pasillo'){
                    if(in_array($this->request->getParam('action'), array('index','anadirCliente','anadirClienteJuridico','registradora', 'buscarClienteNatural'))){
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
    public function cargar(){
        $tienda = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $this->loadComponent('Productos'); 
        $productos = $this->Productos-> productos($tienda); 
        $this->set('productos',$productos);
        $this->viewBuilder()->setLayout('cajero');
    }
    public function index()
    {
        $this->cargar();
    }

    public function anadirCliente(){
        $this->cargar();
        $this->loadComponent('Lugar');   
        $this->loadModel('PersonaNatural');
        $this->getEstados();
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());  
            $personaNatural->FK_tie_codigo = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']); // SE INSERTA LA PERSONA NATURAL 
            if ($this->PersonaNatural->save($personaNatural)) {
                    $this->insertarRol($this->request->getData('cuenta_usuario.cue_usu_email'));
                    return $this->redirect(['action' => 'index']);

                
            }
            
        }
        
        $this->set(compact('personaNatural'));
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
    
    public function buscarClienteNatural(){

        $this->cargar();
    }

    public function insertarRol($email){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol_cuenta_usuario', [
            'rol_codigo'=>9, 
            'cue_usu_email'=>$email
        ]);
    }


    public function registradora(){

        $this->cargar();
    }

    public function insertarRol2($email){
        $connection = ConnectionManager::get('default');
        $connection->insert('rol_cuenta_usuario', [
            'rol_codigo'=>11, 
            'cue_usu_email'=>$email
        ]);
    }

    public function  anadirClienteJuridico(){
        $this->cargar();
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
        $this->loadModel('PersonaJuridica');
        $this->getEstados();

        $personaJuridica = $this->PersonaJuridica->newEmptyEntity();
        if ($this->request->is('post')) {
           
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            $personaJuridica->FK_tie_codigo = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
            if ($this->PersonaJuridica->save($personaJuridica)) {
                $this->insertarRol2($this->request->getData('cuenta_usuario.cue_usu_email'));
                return $this->redirect(['action' => 'index']);
            }else{
                die("Hola");
            }
            
        }
        $this->set(compact('personaJuridica'));
    }

    
}
