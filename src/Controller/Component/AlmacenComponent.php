<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Almacen component
 */
class AlmacenComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function almacenes(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT alm_codigo, alm_dirección FROM almacen')->fetchAll('assoc');
    }

    public function almacenSelect($almacenSQL){
        $tiendas = array() ; 
        $i = 0;
        foreach($almacenSQL as $tienda){
            $tiendas += [
                $almacenSQL[$i]['alm_codigo']=>$almacenSQL[$i]['alm_dirección']
            ];
            $i ++;
        };
        return $tiendas;
    }
}
