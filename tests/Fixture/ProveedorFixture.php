<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProveedorFixture
 */
class ProveedorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'proveedor';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'pro_rif' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pro_razon_social' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pro_denominacion_comercial' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pro_pagina_web' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pro_direccion_fisica' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pro_direccion_fiscal' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'lugar' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lugar_fiscal' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'lugar' => ['type' => 'index', 'columns' => ['lugar'], 'length' => []],
            'lugar_fiscal' => ['type' => 'index', 'columns' => ['lugar_fiscal'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['pro_rif'], 'length' => []],
            'pro_rif' => ['type' => 'unique', 'columns' => ['pro_rif'], 'length' => []],
            'pro_denominacion_comercial' => ['type' => 'unique', 'columns' => ['pro_denominacion_comercial'], 'length' => []],
            'pro_pagina_web' => ['type' => 'unique', 'columns' => ['pro_pagina_web'], 'length' => []],
            'proveedor_ibfk_2' => ['type' => 'foreign', 'columns' => ['lugar_fiscal'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'proveedor_ibfk_1' => ['type' => 'foreign', 'columns' => ['lugar'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'pro_rif' => 'e5f47dd3-b5af-44f5-ac27-6dee449eb1f1',
                'pro_razon_social' => 'Lorem ipsum dolor sit amet',
                'pro_denominacion_comercial' => 'Lorem ipsum dolor sit amet',
                'pro_pagina_web' => 'Lorem ipsum dolor sit amet',
                'pro_direccion_fisica' => 'Lorem ipsum dolor sit amet',
                'pro_direccion_fiscal' => 'Lorem ipsum dolor sit amet',
                'lugar' => 1,
                'lugar_fiscal' => 1,
            ],
        ];
        parent::init();
    }
}
