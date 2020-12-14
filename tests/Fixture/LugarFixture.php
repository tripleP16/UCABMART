<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LugarFixture
 */
class LugarFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lugar';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'lug_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'lug_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'lug_tipo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_lug_código' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'lugar_ibfk_1' => ['type' => 'index', 'columns' => ['FK_lug_código'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['lug_codigo'], 'length' => []],
            'lug_codigo' => ['type' => 'unique', 'columns' => ['lug_codigo'], 'length' => []],
            'lugar_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_lug_código'], 'references' => ['lugar', 'lug_codigo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'lug_codigo' => 1,
                'lug_nombre' => 'Lorem ipsum dolor sit amet',
                'lug_tipo' => 'Lorem ipsum dolor sit amet',
                'FK_lug_código' => 1,
            ],
        ];
        parent::init();
    }
}
