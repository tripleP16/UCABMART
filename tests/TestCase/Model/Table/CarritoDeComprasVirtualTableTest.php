<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarritoDeComprasVirtualTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarritoDeComprasVirtualTable Test Case
 */
class CarritoDeComprasVirtualTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarritoDeComprasVirtualTable
     */
    protected $CarritoDeComprasVirtual;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CarritoDeComprasVirtual',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CarritoDeComprasVirtual') ? [] : ['className' => CarritoDeComprasVirtualTable::class];
        $this->CarritoDeComprasVirtual = $this->getTableLocator()->get('CarritoDeComprasVirtual', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CarritoDeComprasVirtual);

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
