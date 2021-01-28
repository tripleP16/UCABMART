<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;

/**
 * CuentaUsuario Controller
 *
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CuentaUsuarioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['login','logout']);
        
    }
    public function login(){
        if($this->request->is('post')){
            $cuentaUsuario = $this->autenticacion($this->request->getData('cue_usu_email'),$this->request->getData('cue_usu_contrasena'));
            if($cuentaUsuario){
                if($cuentaUsuario == "Esta Cuenta no esta registrada" || $cuentaUsuario == "Contrasena Incorrecta"){
                    $this->Flash->error(__($cuentaUsuario));
                }else{
                    $cuentaUsuario = $this->cuentaUsuario($this->request->getData('cue_usu_email')); 
                    $this->Auth->setUser($cuentaUsuario);
                    return $this->redirect(['controller'=>'Inicio','action' => 'index']);
                }
               
            }
        }
    }
    public function logout()
    {
        $this->request->getSession()->destroy();
        return $this->redirect($this->Auth->logout());
    }


    public function autenticacion($email, $contrasena){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT cue_usu_email, cue_usu_contrasena FROM cuenta_usuario WHERE cue_usu_email = :e',['e'=>$email])->fetchAll('assoc');
        if($query == null){
            return "Esta Cuenta no esta registrada";
        }else{
            foreach($query as $query){
                if($query['cue_usu_contrasena']== $contrasena){
                    return "Match";
                }else{
                    return "Contrasena Incorrecta";
                }
            }
            
        }
    }


    public function cuentaUsuario($email){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT cue_usu_puntos, FK_persona_natural, FK_persona_juridica, FK_empleado  FROM cuenta_usuario WHERE cue_usu_email = :e',['e'=>$email])->fetchAll('assoc');
        $respuesta = array();
        foreach($query as $query){
           if($query['FK_persona_natural']!=null){
               $respuesta+=[
                   'Persona'=>$query['FK_persona_natural'],
                   'rol' => $this->obtenerRoles($email), 
                   'email'=> $email
               ];
           }elseif($query['FK_persona_juridica']!=null){
            $respuesta+=[
                'Persona'=>$query['FK_persona_juridica'],
                'rol' => $this->obtenerRoles($email), 
                'email'=> $email

            ];
           }else{
            $respuesta+=[
                'Persona'=>$query['FK_empleado'], 
                'rol' => $this->obtenerRoles($email), 
                'email'=> $email
            ];
           }

           
           
        }

        return $respuesta ; 

    }


    public function obtenerRoles($email){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT rol_codigo FROM rol_cuenta_usuario WHERE cue_usu_email = :e',['e'=>$email])->fetchAll('assoc');
        return $query;
    }
}
