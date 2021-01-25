<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarritoDeComprasVirtual Entity
 *
 * @property int $prod_codigo
 * @property string $cue_usu_email
 * @property int $car_unidades_de_producto
 * @property int $car_com_precio
 */
class CarritoDeComprasVirtual extends Entity
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
        'car_unidades_de_producto' => true,
        'car_com_precio' => true,
        'prod_codigo' => true,
    
    ];
}
