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

    public function municipios(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT lug_nombre, lug_codigo , FK_lug_código FROM lugar WHERE lug_tipo= "municipio"')->fetchAll('assoc'); 
    }

    public function parroquias(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT lug_nombre, lug_codigo, FK_lug_código  FROM lugar WHERE lug_tipo= "parroquia"')->fetchAll('assoc');
    }

    public function lugarSelect($lugarSQL){
        $lugares = array() ; 
        $i = 0;
        foreach($lugarSQL as $estado){
            $lugares += [
                $lugarSQL[$i]['lug_codigo']=>$lugarSQL[$i]['lug_nombre']
            ];
            $i ++;
        };
        return $lugares;
    }
    
}
