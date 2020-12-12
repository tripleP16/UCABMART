<?php
declare(strict_types=1);

namespace App\Controller;

class InicioController extends AppController {
    public function initialize(): void
    {
        
    }
    public function index(){
        
    }
    public function buscar(){
        $tag = $this->request->getData('barrabusqueda'); 
        //aca va el codigo para buscar productos
        
    }
}

?>