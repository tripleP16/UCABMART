<?php
declare(strict_types=1);

namespace App\Controller;

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


    public function login(){
        if($this->request->is('post')){
           // $cuentaUsuario = $this->Auth->identify();
            
            $cuentaUsuario = "Hola";
            if($cuentaUsuario){
               $this->Auth->setUser($cuentaUsuario);
                 return $this->redirect(['controller'=>'PersonaNatural','action' => 'index']);
            }
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function autenticacion(){
        
    }
}