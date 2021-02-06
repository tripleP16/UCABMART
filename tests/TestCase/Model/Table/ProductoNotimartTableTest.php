<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductoNotimartTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductoNotimartTable Test Case
 */
class ProductoNotimartTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductoNotimartTable
     */
    protected $ProductoNotimart;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductoNotimart',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductoNotimart') ? [] : ['className' => ProductoNotimartTable::class];
        $this->ProductoNotimart = $this->getTableLocator()->get('ProductoNotimart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductoNotimart);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
