<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Beneficio component
 */
class BeneficioComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public  function beneficios(){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT ben_codigo, ben_nombre FROM beneficio ')->fetchAll('assoc');
    }
    public function beneficioSelect($beneficioSQL){
        $beneficios = array() ; 
        $i = 0;
        foreach($beneficioSQL as $beneficio){
            $beneficios += [
                $beneficioSQL[$i]['ben_codigo']=>$beneficioSQL[$i]['ben_nombre'],
            ];
            $i ++;
        };
        return $beneficios;
    }

}
