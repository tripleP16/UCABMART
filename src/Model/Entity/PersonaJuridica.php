<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonaJuridica Entity
 *
 * @property string $per_jur_rif
 * @property string $per_jur_denominacion_comercial
 * @property string $per_jur_razon_social
 * @property string $per_jur_pagina_web
 * @property float $per_jur_capital_disponible
 * @property string $per_jur_direccion_fiscal
 * @property string $per_jur_direccion_fiscal_principal
 * @property int $FK_tie_codigo
 * @property int $lugar
 * @property int $lugar_fiscal
 */
class PersonaJuridica extends Entity
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
        'per_jur_rif'=>true,
        'per_jur_denominacion_comercial' => true,
        'per_jur_razon_social' => true,
        'per_jur_pagina_web' => true,
        'per_jur_capital_disponible' => true,
        'per_jur_direccion_fiscal' => true,
        'per_jur_direccion_fiscal_principal' => true,
        'FK_tie_codigo' => true,
        'telefono'=>true, 
        'cuenta_usuario'=>true,
        'lugar' => true,
        'lugar_fiscal' => true,
    ];
}
