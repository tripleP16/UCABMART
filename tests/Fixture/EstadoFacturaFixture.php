<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstadoFacturaFixture
 */
class EstadoFacturaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'estado_factura';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'est_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fac_numero' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fac_fecha_hora' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'estado_factura_ibfk_2' => ['type' => 'index', 'columns' => ['fac_numero'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['est_codigo', 'fac_numero'], 'length' => []],
            'estado_factura_ibfk_2' => ['type' => 'foreign', 'columns' => ['fac_numero'], 'references' => ['factura', 'fac_numero'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'estado_factura_ibfk_1' => ['type' => 'foreign', 'columns' => ['est_codigo'], 'references' => ['estado', 'est_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'est_codigo' => 1,
                'fac_numero' => 1,
                'fac_fecha_hora' => '2021-01-26 17:47:43',
            ],
        ];
        parent::init();
    }
}
