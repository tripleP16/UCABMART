<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        set_time_limit(0);
        ini_set('memory_limit', '10000M');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'CuentaUsuario',
                'action' => 'login',
                //'plugin' => 'Users'
            ], 
            'Form' => [
                'fields' => ['username' => 'cue_usu_email', 'password' => 'cue_usu_contrasena']
            ]
        ]);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function obtenerPrivilegios($rol){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT priv_nombre FROM ucabmart.privilegio JOIN ucabmart.cuenta_privilegio ON cuenta_privilegio.priv_codigo = privilegio.priv_codigo WHERE rol_codigo = :r',['r'=>$rol])->fetchAll('assoc');
        $respuesta = array();
        $i = 0;
        foreach($query as $query){
         
            $respuesta+=[ 
                'Privilegio'[$i] =>$query['priv_nombre']
            ];
            $i++;
        }
        return $respuesta;
    }


    public function obtenerTienda($persona, $rol){
        $connection = ConnectionManager::get('default');
        if($rol == 9){
            $query = $connection->execute('SELECT FK_tie_codigo FROM ucabmart.persona_natural WHERE per_nat_cedula = :p',['p'=>$persona])->fetchAll('assoc');
        }elseif($rol== 11){
            $query = $connection->execute('SELECT FK_tie_codigo FROM ucabmart.persona_juridica WHERE per_jur_rif = :p',['p'=>$persona])->fetchAll('assoc');
        }else{
            $query = $connection->execute('SELECT FK_tie_codigo FROM ucabmart.empleado WHERE emp_cedula = :p',['p'=>$persona])->fetchAll('assoc');
        }
        return $query[0]['FK_tie_codigo'];
    }

    
    public function beforeRender(EventInterface $event){
        
        
        if($this->request->getSession()->read('Auth.User')){
            $rol = $this->request->getSession()->read('Auth.User')['rol'];
            $privilegios = $this->obtenerPrivilegios($rol); 
            $tienda = $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
            $this->set('tienda',$tienda);
            $this->set('privilegios', $privilegios);
            $this->set('loggedIn', true);
        }else{
            $this->set('loggedIn', false);
        }
    }


}
