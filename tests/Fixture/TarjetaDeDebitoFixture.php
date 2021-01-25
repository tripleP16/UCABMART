<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TarjetaDeDebitoFixture
 */
class TarjetaDeDebitoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tarjeta_de_debito';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'met_pag_numero' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tar_deb_tipo_cuenta' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'tar_deb_tipo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'FK_emi_codigo' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tar_deb_cvv' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tar_deb_fecha_emision' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'tar_deb_titular' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'tarjeta_de_debito_ibfk_1' => ['type' => 'index', 'columns' => ['FK_emi_codigo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['met_pag_numero'], 'length' => []],
            'tarjeta_de_debito_ibfk_1' => ['type' => 'foreign', 'columns' => ['FK_emi_codigo'], 'references' => ['emisor', 'emi_codigo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'tar_deb_tipo_cuenta' => 'Lorem ipsum dolor sit amet',
                'tar_deb_tipo' => 'Lorem ipsum dolor sit amet',
                'FK_emi_codigo' => 1,
                'tar_deb_cvv' => 1,
                'tar_deb_fecha_emision' => '2021-01-25',
                'tar_deb_titular' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
