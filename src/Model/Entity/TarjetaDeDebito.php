<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TarjetaDeDebito Entity
 *
 * @property int $met_pag_numero
 * @property string $tar_deb_tipo_cuenta
 * @property string $tar_deb_tipo
 * @property int $FK_emi_codigo
 * @property int $tar_deb_cvv
 * @property \Cake\I18n\FrozenDate|null $tar_deb_fecha_emision
 * @property string $tar_deb_titular
 */
class TarjetaDeDebito extends Entity
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
        'tar_deb_tipo_cuenta' => true,
        'tar_deb_tipo' => true,
        'FK_emi_codigo' => true,
        'tar_deb_cvv' => true,
        'tar_deb_fecha_emision' => true,
        'tar_deb_titular' => true,
    ];
}
