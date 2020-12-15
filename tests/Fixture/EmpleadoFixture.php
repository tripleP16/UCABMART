<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpleadoFixture
 */
class EmpleadoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'empleado';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'emp_cedula' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'emp_primer_nombre' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'emp_segundo_nombre' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'emp_primer_apellido' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'emp_segundo_apellido' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'emp_direccion_hab' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_lug_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_lug_codigo' => ['type' => 'index', 'columns' => ['FK_lug_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['emp_cedula'], 'length' => []],
            'empleado_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_lug_codigo'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'emp_cedula' => 'fcef208a-e87a-45dd-b2f2-e9262d01d61a',
                'emp_primer_nombre' => 'Lorem ipsum dolor sit amet',
                'emp_segundo_nombre' => 'Lorem ipsum dolor sit amet',
                'emp_primer_apellido' => 'Lorem ipsum dolor sit amet',
                'emp_segundo_apellido' => 'Lorem ipsum dolor sit amet',
                'emp_direccion_hab' => 'Lorem ipsum dolor sit amet',
                'FK_lug_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
