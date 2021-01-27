<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EstadoFactura Entity
 *
 * @property int $est_codigo
 * @property int $fac_numero
 * @property \Cake\I18n\FrozenTime $fac_fecha_hora
 */
class EstadoFactura extends Entity
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
        'fac_fecha_hora' => true,
    ];
}
