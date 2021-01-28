<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rol Entity
 *
 * @property int $rol_codigo
 * @property string $rol_nombre
 *
 * @property \App\Model\Entity\CuentaUsuario[] $cuenta_usuario
 */
class Rol extends Entity
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
        'rol_nombre' => true,
        'cuenta_usuario' => true,
    ];
}
