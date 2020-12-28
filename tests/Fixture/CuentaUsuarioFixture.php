<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CuentaUsuarioFixture
 */
class CuentaUsuarioFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cuenta_usuario';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cue_usu_email' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'cue_usu_contrasena' => ['type' => 'string', 'length' => 400, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'cue_usu_puntos' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FK_persona_natural' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_persona_juridica' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_empleado' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_empleado' => ['type' => 'index', 'columns' => ['FK_empleado'], 'length' => []],
            'FK_persona_natural' => ['type' => 'index', 'columns' => ['FK_persona_natural'], 'length' => []],
            'FK_persona_juridica' => ['type' => 'index', 'columns' => ['FK_persona_juridica'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cue_usu_email'], 'length' => []],
            'cue_usu_email' => ['type' => 'unique', 'columns' => ['cue_usu_email'], 'length' => []],
            'cuenta_usuario_ibfk_3' => ['type' => 'foreign', 'columns' => ['FK_persona_juridica'], 'references' => ['persona_juridica', 'per_jur_rif'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuenta_usuario_ibfk_2' => ['type' => 'foreign', 'columns' => ['FK_persona_natural'], 'references' => ['persona_natural', 'per_nat_cedula'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuenta_usuario_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_empleado'], 'references' => ['empleado', 'emp_cedula'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'cue_usu_email' => '60ea2660-1c5b-4888-be90-83fd0779d9dc',
                'cue_usu_contrasena' => 'Lorem ipsum dolor sit amet',
                'cue_usu_puntos' => 1,
                'FK_persona_natural' => 'Lorem ipsum dolor sit amet',
                'FK_persona_juridica' => 'Lorem ipsum dolor sit amet',
                'FK_empleado' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
