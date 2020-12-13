<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proveedor Entity
 *
 * @property string $pro_rif
 * @property string $pro_razon_social
 * @property string $pro_denominacion_comercial
 * @property string $pro_pagina_web
 * @property string $pro_direccion_fisica
 * @property string $pro_direccion_fiscal
 * @property int $lugar
 * @property int $lugar_fiscal
 *
 * @property \App\Model\Entity\Rubro[] $rubro
 */
class Proveedor extends Entity
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
        'pro_razon_social' => true,
        'pro_denominacion_comercial' => true,
        'pro_pagina_web' => true,
        'pro_direccion_fisica' => true,
        'pro_direccion_fiscal' => true,
        'lugar' => true,
        'lugar_fiscal' => true,
        'rubro' => true,
    ];
}
