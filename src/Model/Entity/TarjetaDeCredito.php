<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TarjetaDeCredito Entity
 *
 * @property int $met_pag_numero
 * @property string $tar_cre_nombre
 * @property \Cake\I18n\FrozenDate $tar_cre_fecha_emision
 * @property int $tar_cre_cvv
 * @property string $tar_cre_tipo
 * @property int $FK_emi_codigo
 */
class TarjetaDeCredito extends Entity
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
        'tar_cre_nombre' => true,
        'tar_cre_fecha_emision' => true,
        'tar_cre_cvv' => true,
        'tar_cre_tipo' => true,
        'FK_emi_codigo' => true,
    ];
}
