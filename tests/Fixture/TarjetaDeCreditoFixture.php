<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TarjetaDeCreditoFixture
 */
class TarjetaDeCreditoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tarjeta_de_credito';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'met_pag_numero' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tar_cre_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'tar_cre_fecha_emision' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tar_cre_cvv' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tar_cre_tipo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_emi_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tarjeta_de_credito_ibfk_1' => ['type' => 'index', 'columns' => ['FK_emi_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['met_pag_numero'], 'length' => []],
            'tarjeta_de_credito_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_emi_codigo'], 'references' => ['emisor', 'emi_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'met_pag_numero' => 1,
                'tar_cre_nombre' => 'Lorem ipsum dolor sit amet',
                'tar_cre_fecha_emision' => '2021-01-25',
                'tar_cre_cvv' => 1,
                'tar_cre_tipo' => 'Lorem ipsum dolor sit amet',
                'FK_emi_codigo' => 1,
            ],
        ];
        parent::init();
    }
}
