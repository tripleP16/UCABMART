<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductoNotimart Entity
 *
 * @property int $prod_not_codigo
 * @property int $prod_not_descuento
 * @property \Cake\I18n\FrozenDate $prod_not_fecha_inicio
 * @property \Cake\I18n\FrozenDate $prod_not_fecha_FIN
 * @property int $FK_prod_codigo
 */
class ProductoNotimart extends Entity
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
        'prod_not_descuento' => true,
        'prod_not_fecha_inicio' => true,
        'prod_not_fecha_FIN' => true,
        'FK_prod_codigo' => true,
    ];
}
