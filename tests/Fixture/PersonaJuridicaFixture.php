<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonaJuridicaFixture
 */
class PersonaJuridicaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'persona_juridica';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'per_jur_rif' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_jur_denominacion_comercial' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_jur_razon_social' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_jur_pagina_web' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_jur_capital_disponible' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'per_jur_direccion_fiscal' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_jur_direccion_fiscal_principal' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_tie_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lugar' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lugar_fiscal' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_tie_codigo' => ['type' => 'index', 'columns' => ['FK_tie_codigo'], 'length' => []],
            'lugar' => ['type' => 'index', 'columns' => ['lugar'], 'length' => []],
            'lugar_fiscal' => ['type' => 'index', 'columns' => ['lugar_fiscal'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['per_jur_rif'], 'length' => []],
            'per_jur_rif' => ['type' => 'unique', 'columns' => ['per_jur_rif'], 'length' => []],
            'per_jur_denominacion_comercial' => ['type' => 'unique', 'columns' => ['per_jur_denominacion_comercial'], 'length' => []],
            'per_jur_pagina_web' => ['type' => 'unique', 'columns' => ['per_jur_pagina_web'], 'length' => []],
            'persona_juridica_ibfk_3' => ['type' => 'foreign', 'columns' => ['lugar_fiscal'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persona_juridica_ibfk_2' => ['type' => 'foreign', 'columns' => ['lugar'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persona_juridica_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_tie_codigo'], 'references' => ['tienda', 'tie_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'per_jur_rif' => '8b394a9a-776d-4bc1-b8fc-308ca02b7ae8',
                'per_jur_denominacion_comercial' => 'Lorem ipsum dolor sit amet',
                'per_jur_razon_social' => 'Lorem ipsum dolor sit amet',
                'per_jur_pagina_web' => 'Lorem ipsum dolor sit amet',
                'per_jur_capital_disponible' => 1,
                'per_jur_direccion_fiscal' => 'Lorem ipsum dolor sit amet',
                'per_jur_direccion_fiscal_principal' => 'Lorem ipsum dolor sit amet',
                'FK_tie_codigo' => 1,
                'lugar' => 1,
                'lugar_fiscal' => 1,
            ],
        ];
        parent::init();
    }
}
