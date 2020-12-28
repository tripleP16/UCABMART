<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiendaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiendaTable Test Case
 */
class TiendaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TiendaTable
     */
    protected $Tienda;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tienda',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tienda') ? [] : ['className' => TiendaTable::class];
        $this->Tienda = $this->getTableLocator()->get('Tienda', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tienda);

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
