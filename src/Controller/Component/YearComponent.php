<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Year component
 */
class YearComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function yearSelect(){
        $year = date("Y");
        $respuesta = array(); 
        for ($i=1950; $i < $year ; $i++) { 
            $respuesta+=[
                $i=>$i
            ];
        }

        return $respuesta;
        
    }

    public function mesSelect(){
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
        $respuesta = array(); 
        for ($i=0; $i <12 ; $i++) { 
            if($i < 9){
                $respuesta+=[
                    '0'.strval($i+1)=>$meses[$i]
                ];
            }else{
                $respuesta+=[
                    strval($i+1)=>$meses[$i]
                ];

            }
            
        }
        return $respuesta;
    }
}
