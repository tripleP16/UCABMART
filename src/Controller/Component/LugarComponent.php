<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Core\StaticConfigTrait;
/**
 * Lugar component
 */
class LugarComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public  function estados(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT lug_nombre, lug_codigo FROM lugar WHERE lug_tipo= "estado"')->fetchAll('assoc');
    }

    public function municipios($id){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT lug_nombre, lug_codigo FROM lugar WHERE lug_tipo= "municipio" AND FK_lug_código = '.$id)->fetchAll('assoc'); //Por favor modificar a municipio
    }

    public function parroquias($id){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT lug_nombre, lug_codigo FROM lugar WHERE lug_tipo= "parroquia" AND FK_lug_código = '.$id)->fetchAll('assoc');
    }

    public function estadoSelect($estadoSQL){
        $estados = array() ; 
        $i = 0;
        foreach($estadoSQL as $estado){
            $estados += [
                $estadoSQL[$i]['lug_codigo']=>$estadoSQL[$i]['lug_nombre']
            ];
            $i ++;
        };
        return $estados;
    }
    
}
