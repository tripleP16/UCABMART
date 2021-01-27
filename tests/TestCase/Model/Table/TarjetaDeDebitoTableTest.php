<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarjetaDeDebitoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarjetaDeDebitoTable Test Case
 */
class TarjetaDeDebitoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TarjetaDeDebitoTable
     */
    protected $TarjetaDeDebito;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TarjetaDeDebito',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TarjetaDeDebito') ? [] : ['className' => TarjetaDeDebitoTable::class];
        $this->TarjetaDeDebito = $this->getTableLocator()->get('TarjetaDeDebito', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TarjetaDeDebito);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
