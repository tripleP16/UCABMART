<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonaNatural Entity
 *
 * @property string $per_nat_cedula
 * @property string $per_nat_rif
 * @property string $per_nat_primer_nombre
 * @property string|null $per_nat_segundo_nombre
 * @property string $per_nat_primer_apellido
 * @property string|null $per_nat_segundo_apellido
 * @property string $per_nat_direccion
 * @property int $FK_tie_codigo
 * @property int $FK_lug_codigo
 *
 * @property \App\Model\Entity\Telefono[] $telefono
 */
class PersonaNatural extends Entity
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
        'per_nat_rif' => true,
        'per_nat_primer_nombre' => true,
        'per_nat_segundo_nombre' => true,
        'per_nat_primer_apellido' => true,
        'per_nat_segundo_apellido' => true,
        'per_nat_direccion' => true,
        'FK_tie_codigo' => true,
        'FK_lug_codigo' => true,
        'telefono' => true,
        'per_nat_cedula'=>true,
        'cuenta_usuario'=>true

    ];

}
