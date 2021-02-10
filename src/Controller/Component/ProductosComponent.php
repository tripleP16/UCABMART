<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Productos component
 */
class ProductosComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function productos($tienda){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT producto.prod_codigo , prod_nombre, prod_imagen, prod_precio_bolivar, pas_prod_cantidad FROM producto JOIN pasillo_producto ON pasillo_producto.prod_codigo = producto.prod_codigo JOIN zona_pasillo ON zona_pasillo.zon_pas_codigo = pasillo_producto.zon_pas_codigo WHERE fk_tie_codigo = :i', ['i'=>$tienda])->fetchAll('assoc');
    }

    public function producto($tienda, $prod_codigo){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT pas_prod_cantidad FROM producto JOIN pasillo_producto ON pasillo_producto.prod_codigo = producto.prod_codigo JOIN zona_pasillo ON zona_pasillo.zon_pas_codigo = pasillo_producto.zon_pas_codigo WHERE fk_tie_codigo = :i AND producto.prod_codigo = :j', ['i'=>$tienda, 'j'=>$prod_codigo])->fetchAll('assoc');
    }

    public function precio($codigoProducto){
        $connection = ConnectionManager::get('default');
        return $connection->execute('SELECT prod_precio_bolivar FROM producto WHERE prod_codigo = :i', ['i'=>$codigoProducto])->fetchAll('assoc');
    }
}
