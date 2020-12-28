<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CuentaUsuario Entity
 *
 * @property string $cue_usu_email
 * @property string $cue_usu_contrasena
 * @property int $cue_usu_puntos
 * @property string|null $FK_cue_persona_natural
 * @property string|null $FK_persona_juridica
 * @property string|null $FK_empleado
 */
class CuentaUsuario extends Entity
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
        'cue_usu_email'=>true,
        'cue_usu_contrasena' => true,
        'cue_usu_puntos' => true,
        'FK_cue_persona_natural' => true,
        'FK_persona_juridica' => true,
        'FK_empleado' => true,
    ];
}
