<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Telefono component
 */
class TelefonoComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function insertarTelefono($tel_numero, $tel_tipo, $check, $claveForanea){
        $connection = ConnectionManager::get('default');
        if($check==0){
            $connection->execute('INSERT INTO telefono (tel_numero, tel_tipo, FK_persona_natural) VALUES (:tel_numero, :tel_tipo, :claveForanea)',['tel_numero'=>$tel_numero, 'tel_tipo'=>$tel_tipo, 'claveForanea'=>$claveForanea]);
        }elseif($check==1){

        }elseif($check==2){

        }elseif($check==3){

        }

    }
}
