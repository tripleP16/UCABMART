<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZonaFixture
 */
class ZonaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'zona';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'zon_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'zon_nombre' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'zon_refrigeracion' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'zon_capacidad' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_alm_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_rub_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'zona_ibfk_1' => ['type' => 'index', 'columns' => ['FK_alm_codigo'], 'length' => []],
            'zona_ibfk_2' => ['type' => 'index', 'columns' => ['FK_rub_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['zon_codigo'], 'length' => []],
            'zon_codigo' => ['type' => 'unique', 'columns' => ['zon_codigo'], 'length' => []],
            'zona_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_rub_codigo'], 'references' => ['rubro', 'rub_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'zona_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_alm_codigo'], 'references' => ['almacen', 'alm_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'zon_codigo' => 1,
                'zon_nombre' => 'Lorem ipsum dolor sit amet',
                'zon_refrigeracion' => 'Lorem ipsum dolor sit amet',
                'zon_capacidad' => 1,
                'FK_alm_codigo' => 1,
                'FK_rub_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
