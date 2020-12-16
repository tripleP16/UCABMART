<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Tienda component
 */
class TiendaComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function tiendas(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT tie_direccion, tie_codigo FROM tienda')->fetchAll('assoc');
    }

    public function tiendaSelect($tiendaSQL){
        $tiendas = array() ; 
        $i = 0;
        foreach($tiendaSQL as $tienda){
            $tiendas += [
                $tiendaSQL[$i]['tie_codigo']=>$tiendaSQL[$i]['tie_direccion']
            ];
            $i ++;
        };
        return $tiendas;
    }
}
