<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Privilegio component
 */
class PrivilegioComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function privilegioes(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT priv_codigo, priv_nombre FROM privilegio WHERE priv_codigo <> 15 AND priv_codigo <> 13')->fetchAll('assoc');
    }

    public function privilegioSelect($privilegioSQL){
        $privilegioes = array() ; 
        $i = 1;
        foreach($privilegioSQL as $estado){
            $privilegioes += [
                $estado['priv_codigo']=>$estado['priv_nombre'],
            ];
            $i ++;
        };
        return $privilegioes;
    }
}


