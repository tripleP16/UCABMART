<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lugar Entity
 *
 * @property int $lug_codigo
 * @property string $lug_nombre
 * @property string $lug_tipo
 * @property int|null $FK_lug_código
 */
class Lugar extends Entity
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
        'lug_nombre' => true,
        'lug_tipo' => true,
        'FK_lug_código' => true,
    ];
}
