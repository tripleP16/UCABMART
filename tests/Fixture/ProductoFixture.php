<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductoFixture
 */
class ProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'producto';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'prod_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'prod_nombre' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'prod_descripcion' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'prod_imagen' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'prod_precio_bolivar' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'FK_submarca' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_proveedor' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_submarca' => ['type' => 'index', 'columns' => ['FK_submarca'], 'length' => []],
            'FK_proveedor' => ['type' => 'index', 'columns' => ['FK_proveedor'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['prod_codigo'], 'length' => []],
            'prod_codigo' => ['type' => 'unique', 'columns' => ['prod_codigo'], 'length' => []],
            'producto_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_proveedor'], 'references' => ['proveedor', 'pro_rif'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'producto_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_submarca'], 'references' => ['submarca', 'sub_nombre'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'prod_nombre' => 'Lorem ipsum dolor sit amet',
                'prod_descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'prod_imagen' => 'Lorem ipsum dolor sit amet',
                'prod_precio_bolivar' => 1,
                'FK_submarca' => 'Lorem ipsum dolor sit amet',
                'FK_proveedor' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
