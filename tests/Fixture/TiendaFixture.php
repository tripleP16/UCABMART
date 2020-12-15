<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TiendaFixture
 */
class TiendaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tienda';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'tie_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tie_direccion' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'tie_rif' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_alm_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_lug_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_alm_codigo' => ['type' => 'index', 'columns' => ['FK_alm_codigo'], 'length' => []],
            'FK_lug_codigo' => ['type' => 'index', 'columns' => ['FK_lug_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tie_codigo'], 'length' => []],
            'tie_codigo' => ['type' => 'unique', 'columns' => ['tie_codigo'], 'length' => []],
            'tie_rif' => ['type' => 'unique', 'columns' => ['tie_rif'], 'length' => []],
            'tienda_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_lug_codigo'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tienda_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_alm_codigo'], 'references' => ['almacen', 'alm_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'tie_codigo' => 1,
                'tie_direccion' => 'Lorem ipsum dolor sit amet',
                'tie_rif' => 1,
                'FK_alm_codigo' => 1,
                'FK_lug_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
