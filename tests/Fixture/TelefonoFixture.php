<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TelefonoFixture
 */
class TelefonoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'telefono';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'tel_numero' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tel_tipo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_persona_natural' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_persona_juridica' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_personal_de_contacto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_empleado' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_persona_natural' => ['type' => 'index', 'columns' => ['FK_persona_natural'], 'length' => []],
            'FK_persona_juridica' => ['type' => 'index', 'columns' => ['FK_persona_juridica'], 'length' => []],
            'FK_personal_de_contacto' => ['type' => 'index', 'columns' => ['FK_personal_de_contacto'], 'length' => []],
            'FK_empleado' => ['type' => 'index', 'columns' => ['FK_empleado'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tel_numero'], 'length' => []],
            'tel_numero' => ['type' => 'unique', 'columns' => ['tel_numero'], 'length' => []],
            'telefono_ibfk_4' => ['type' => 'foreign', 'columns' => ['FK_empleado'], 'references' => ['empleado', 'emp_cedula'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'telefono_ibfk_3' => ['type' => 'foreign', 'columns' => ['FK_personal_de_contacto'], 'references' => ['personal_de_contacto', 'per_con_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'telefono_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_persona_juridica'], 'references' => ['persona_juridica', 'per_jur_rif'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'telefono_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_persona_natural'], 'references' => ['persona_natural', 'per_nat_cedula'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'tel_numero' => 1,
                'tel_tipo' => 'Lorem ipsum dolor sit amet',
                'FK_persona_natural' => 'Lorem ipsum dolor sit amet',
                'FK_persona_juridica' => 'Lorem ipsum dolor sit amet',
                'FK_personal_de_contacto' => 1,
                'FK_empleado' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
