<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonalDeContactoFixture
 */
class PersonalDeContactoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'personal_de_contacto';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'per_con_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'per_con_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'per_con_apellido' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_pro_rif' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_pro_rif' => ['type' => 'index', 'columns' => ['FK_pro_rif'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['per_con_codigo'], 'length' => []],
            'per_con_codigo' => ['type' => 'unique', 'columns' => ['per_con_codigo'], 'length' => []],
            'per_con_apellido' => ['type' => 'unique', 'columns' => ['per_con_apellido'], 'length' => []],
            'personal_de_contacto_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_pro_rif'], 'references' => ['proveedor', 'pro_rif'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'per_con_codigo' => 1,
                'per_con_nombre' => 'Lorem ipsum dolor sit amet',
                'per_con_apellido' => 'Lorem ipsum dolor sit amet',
                'FK_pro_rif' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
