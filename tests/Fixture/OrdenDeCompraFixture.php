<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdenDeCompraFixture
 */
class OrdenDeCompraFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'orden_de_compra';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'ord_com_numero' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ord_com_fecha_creada' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ord_com_fecha_despacho' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ord_com_pagada' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_pro_rif' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_tie_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'orden_de_compra_ibfk_1' => ['type' => 'index', 'columns' => ['FK_pro_rif'], 'length' => []],
            'orden_de_compra_ibfk_2_idx' => ['type' => 'index', 'columns' => ['FK_tie_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ord_com_numero'], 'length' => []],
            'orden_de_compra_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_tie_codigo'], 'references' => ['tienda', 'tie_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'orden_de_compra_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_pro_rif'], 'references' => ['proveedor', 'pro_rif'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'ord_com_numero' => 1,
                'ord_com_fecha_creada' => '2021-02-09',
                'ord_com_fecha_despacho' => '2021-02-09',
                'ord_com_pagada' => 'Lorem ipsum dolor sit amet',
                'FK_pro_rif' => 'Lorem ipsum dolor sit amet',
                'FK_tie_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
