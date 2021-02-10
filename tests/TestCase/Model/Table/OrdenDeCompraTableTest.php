<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdenDeCompraTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdenDeCompraTable Test Case
 */
class OrdenDeCompraTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdenDeCompraTable
     */
    protected $OrdenDeCompra;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OrdenDeCompra',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OrdenDeCompra') ? [] : ['className' => OrdenDeCompraTable::class];
        $this->OrdenDeCompra = $this->getTableLocator()->get('OrdenDeCompra', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OrdenDeCompra);

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
