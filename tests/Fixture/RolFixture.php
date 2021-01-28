<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolFixture
 */
class RolFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'rol';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'rol_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rol_nombre' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['rol_codigo'], 'length' => []],
            'rol_codigo' => ['type' => 'unique', 'columns' => ['rol_codigo'], 'length' => []],
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
                'rol_codigo' => 1,
                'rol_nombre' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
