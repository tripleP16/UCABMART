<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Rol component
 */
class RolComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function roles(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT rol_codigo, rol_nombre FROM rol WHERE rol_codigo <> 9 AND rol_codigo <> 11')->fetchAll('assoc');
    }

    public function rolSelect($rolSQL){
        $roles = array() ; 
        $i = 0;
        foreach($rolSQL as $estado){
            $roles += [
                $rolSQL[$i]['rol_codigo']=>$rolSQL[$i]['rol_nombre'],
            ];
            $i ++;
        };
        return $roles;
    }
}
