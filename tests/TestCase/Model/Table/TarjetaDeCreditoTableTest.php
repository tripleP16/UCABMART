<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarjetaDeCreditoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarjetaDeCreditoTable Test Case
 */
class TarjetaDeCreditoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TarjetaDeCreditoTable
     */
    protected $TarjetaDeCredito;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TarjetaDeCredito',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TarjetaDeCredito') ? [] : ['className' => TarjetaDeCreditoTable::class];
        $this->TarjetaDeCredito = $this->getTableLocator()->get('TarjetaDeCredito', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TarjetaDeCredito);

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
