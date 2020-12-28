<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonalDeContacto Entity
 *
 * @property int $per_con_codigo
 * @property string $per_con_nombre
 * @property string $per_con_apellido
 * @property string $FK_pro_rif
 */
class PersonalDeContacto extends Entity
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
        'per_con_nombre' => true,
        'per_con_apellido' => true,
        'FK_pro_rif' => true,
    ];
}
