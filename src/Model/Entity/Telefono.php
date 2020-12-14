<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Telefono Entity
 *
 * @property int $tel_numero
 * @property string $tel_tipo
 * @property string|null $FK_persona_natural
 * @property string|null $FK_persona_juridica
 * @property int|null $FK_personal_de_contacto
 * @property string|null $FK_empleado
 */
class Telefono extends Entity
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
        'tel_tipo' => true,
        'FK_persona_natural' => true,
        'FK_persona_juridica' => true,
        'FK_personal_de_contacto' => true,
        'FK_empleado' => true,
    ];
}
