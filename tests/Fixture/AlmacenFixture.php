<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlmacenFixture
 */
class AlmacenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'almacen';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'alm_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'alm_dirección' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['alm_codigo'], 'length' => []],
            'alm_codigo' => ['type' => 'unique', 'columns' => ['alm_codigo'], 'length' => []],
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
                'alm_codigo' => 1,
                'alm_dirección' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
