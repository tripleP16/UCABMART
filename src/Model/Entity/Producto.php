<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $prod_codigo
 * @property string $prod_nombre
 * @property string $prod_descripcion
 * @property string $prod_imagen
 * @property float $prod_precio_bolivar
 * @property string|null $FK_submarca
 * @property string|null $FK_proveedor
 *
 * @property \App\Model\Entity\Factura[] $factura
 * @property \App\Model\Entity\Pasillo[] $pasillo
 * @property \App\Model\Entity\Notimart[] $notimart
 * @property \App\Model\Entity\Zona[] $zona
 */
class Producto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'prod_nombre' => true,
        'prod_descripcion' => true,
        'prod_imagen' => true,
        'prod_precio_bolivar' => true,
        'FK_submarca' => true,
        'FK_proveedor' => true,
        'factura' => true,
        'pasillo' => true,
        'producto_notimart' => true,
        'zona' => true,
    ];
}
