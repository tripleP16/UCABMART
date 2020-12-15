<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tienda Entity
 *
 * @property int $tie_codigo
 * @property string $tie_direccion
 * @property int $tie_rif
 * @property int $FK_alm_codigo
 * @property int $FK_lug_codigo
 */
class Tienda extends Entity
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
        'tie_direccion' => true,
        'tie_rif' => true,
        'FK_alm_codigo' => true,
        'FK_lug_codigo' => true,
    ];
}
