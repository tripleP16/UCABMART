<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarritoDeComprasVirtualFixture
 */
class CarritoDeComprasVirtualFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'carrito_de_compras_virtual';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'prod_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cue_usu_email' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'car_unidades_de_producto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'car_com_precio' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'carrito_de_compras_virtual_ibfk_2' => ['type' => 'index', 'columns' => ['cue_usu_email'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['prod_codigo', 'cue_usu_email'], 'length' => []],
            'carrito_de_compras_virtual_ibfk_2' => ['type' => 'foreign', 'columns' => ['cue_usu_email'], 'references' => ['cuenta_usuario', 'cue_usu_email'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'carrito_de_compras_virtual_ibfk_1' => ['type' => 'foreign', 'columns' => ['prod_codigo'], 'references' => ['producto', 'prod_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'cue_usu_email' => '72446632-dc89-4e96-a500-44c35f34046d',
                'car_unidades_de_producto' => 1,
                'car_com_precio' => 1,
            ],
        ];
        parent::init();
    }
}
