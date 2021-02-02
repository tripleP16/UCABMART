<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductoNotimartFixture
 */
class ProductoNotimartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'producto_notimart';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'prod_not_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'prod_not_descuento' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prod_not_fecha_inicio' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'prod_not_fecha_FIN' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'FK_prod_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'producto_notimart_ibfk_1' => ['type' => 'index', 'columns' => ['FK_prod_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['prod_not_codigo'], 'length' => []],
            'prod_not_codigo' => ['type' => 'unique', 'columns' => ['prod_not_codigo'], 'length' => []],
            'producto_notimart_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_prod_codigo'], 'references' => ['producto', 'prod_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'prod_not_codigo' => 1,
                'prod_not_descuento' => 1,
                'prod_not_fecha_inicio' => '2021-01-31',
                'prod_not_fecha_FIN' => '2021-01-31',
                'FK_prod_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
