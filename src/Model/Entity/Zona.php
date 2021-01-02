<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zona Entity
 *
 * @property int $zon_codigo
 * @property string $zon_nombre
 * @property string $zon_refrigeracion
 * @property int $zon_capacidad
 * @property int $FK_alm_codigo
 * @property int $FK_rub_codigo
 *
 * @property \App\Model\Entity\Pasillo[] $pasillo
 * @property \App\Model\Entity\Producto[] $producto
 */
class Zona extends Entity
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
        'zon_nombre' => true,
        'zon_refrigeracion' => true,
        'zon_capacidad' => true,
        'FK_alm_codigo' => true,
        'FK_rub_codigo' => true,
        'pasillo' => true,
        'producto' => true,
    ];
}
