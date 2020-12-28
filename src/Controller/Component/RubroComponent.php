<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Rubro component
 */
class RubroComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function rubros(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT rub_codigo, rub_tipo FROM rubro ')->fetchAll('assoc');
    }

    public function rubroSelect($rubroSQL){
        $rubros = array() ; 
        $i = 0;
        foreach($rubroSQL as $estado){
            $rubros += [
                $rubroSQL[$i]['rub_codigo']=>$rubroSQL[$i]['rub_tipo'],
            ];
            $i ++;
        };
        return $rubros;
    }
}
