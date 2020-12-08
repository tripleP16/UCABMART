<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonaNaturalFixture
 */
class PersonaNaturalFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'persona_natural';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'per_nat_cedula' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_rif' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_primer_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_segundo_nombre' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_primer_apellido' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_segundo_apellido' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_nat_direccion' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_tie_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_lug_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_tie_codigo' => ['type' => 'index', 'columns' => ['FK_tie_codigo'], 'length' => []],
            'FK_lug_codigo' => ['type' => 'index', 'columns' => ['FK_lug_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['per_nat_cedula'], 'length' => []],
            'per_nat_cedula' => ['type' => 'unique', 'columns' => ['per_nat_cedula'], 'length' => []],
            'per_nat_rif' => ['type' => 'unique', 'columns' => ['per_nat_rif'], 'length' => []],
            'persona_natural_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_lug_codigo'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persona_natural_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_tie_codigo'], 'references' => ['tienda', 'tie_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'per_nat_cedula' => 'bb65d6e6-550c-45dd-910a-b2051913dce4',
                'per_nat_rif' => 'Lorem ipsum dolor sit amet',
                'per_nat_primer_nombre' => 'Lorem ipsum dolor sit amet',
                'per_nat_segundo_nombre' => 'Lorem ipsum dolor sit amet',
                'per_nat_primer_apellido' => 'Lorem ipsum dolor sit amet',
                'per_nat_segundo_apellido' => 'Lorem ipsum dolor sit amet',
                'per_nat_direccion' => 'Lorem ipsum dolor sit amet',
                'FK_tie_codigo' => 1,
                'FK_lug_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
