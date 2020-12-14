<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubmarcaFixture
 */
class SubmarcaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'submarca';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'sub_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'sub_descripcion' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['sub_nombre'], 'length' => []],
            'sub_nombre' => ['type' => 'unique', 'columns' => ['sub_nombre'], 'length' => []],
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
                'sub_nombre' => '49b3d46a-823d-4350-963a-b36eaf7244cc',
                'sub_descripcion' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
