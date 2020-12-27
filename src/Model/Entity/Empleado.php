<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empleado Entity
 *
 * @property string $emp_cedula
 * @property string $emp_primer_nombre
 * @property string|null $emp_segundo_nombre
 * @property string $emp_primer_apellido
 * @property string|null $emp_segundo_apellido
 * @property string $emp_direccion_hab
 * @property int $FK_lug_codigo
 *
 * @property \App\Model\Entity\Beneficio[] $beneficio
 */
class Empleado extends Entity
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
        'emp_primer_nombre' => true,
        'emp_segundo_nombre' => true,
        'emp_primer_apellido' => true,
        'emp_segundo_apellido' => true,
        'emp_direccion_hab' => true,
        'FK_lug_codigo' => true,
        'beneficio' => true,
        'cuenta_usuario'=>true,
        'telefono' => true,
        'rol' => true,
        'beneficio' => true,

    ];
}
