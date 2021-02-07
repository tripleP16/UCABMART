<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cajero Controller
 *
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
                    if(in_array($this->request->getParam('action'), array('index'))){
                        return true;
                    }           
                }elseif($privilegio == 'Rellenar Pasillo'){
                    if(in_array($this->request->getParam('action'), array('delete'))){
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
        $this->viewBuilder()->setLayout('cajero');
    }

   

    
}
