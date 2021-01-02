<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZonaProductoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZonaProductoTable Test Case
 */
class ZonaProductoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ZonaProductoTable
     */
    protected $ZonaProducto;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ZonaProducto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ZonaProducto') ? [] : ['className' => ZonaProductoTable::class];
        $this->ZonaProducto = $this->getTableLocator()->get('ZonaProducto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ZonaProducto);

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
