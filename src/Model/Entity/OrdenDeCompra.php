<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdenDeCompra Entity
 *
 * @property int $ord_com_numero
 * @property \Cake\I18n\FrozenDate $ord_com_fecha_creada
 * @property \Cake\I18n\FrozenDate|null $ord_com_fecha_despacho
 * @property string $ord_com_pagada
 * @property string $FK_pro_rif
 * @property int $FK_tie_codigo
 */
class OrdenDeCompra extends Entity
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
        'ord_com_fecha_creada' => true,
        'ord_com_fecha_despacho' => true,
        'ord_com_pagada' => true,
        'FK_pro_rif' => true,
        'FK_tie_codigo' => true,
    ];
}
