<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZonaProductoFixture
 */
class ZonaProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'zona_producto';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'prod_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zon_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zon_pro_cantidad_de_producto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'zona_producto_ibfk_2' => ['type' => 'index', 'columns' => ['zon_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['prod_codigo', 'zon_codigo'], 'length' => []],
            'zona_producto_ibfk_2' => ['type' => 'foreign', 'columns' => ['zon_codigo'], 'references' => ['zona', 'zon_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'zona_producto_ibfk_1' => ['type' => 'foreign', 'columns' => ['prod_codigo'], 'references' => ['producto', 'prod_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'prod_codigo' => 1,
                'zon_codigo' => 1,
                'zon_pro_cantidad_de_producto' => 1,
            ],
        ];
        parent::init();
    }
}
