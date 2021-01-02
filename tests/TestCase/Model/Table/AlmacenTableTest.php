<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlmacenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlmacenTable Test Case
 */
class AlmacenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlmacenTable
     */
    protected $Almacen;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Almacen',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Almacen') ? [] : ['className' => AlmacenTable::class];
        $this->Almacen = $this->getTableLocator()->get('Almacen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Almacen);

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
