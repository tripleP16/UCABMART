<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadoFacturaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadoFacturaTable Test Case
 */
class EstadoFacturaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadoFacturaTable
     */
    protected $EstadoFactura;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EstadoFactura',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EstadoFactura') ? [] : ['className' => EstadoFacturaTable::class];
        $this->EstadoFactura = $this->getTableLocator()->get('EstadoFactura', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EstadoFactura);

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
