<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LugarTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LugarTable Test Case
 */
class LugarTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LugarTable
     */
    protected $Lugar;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Lugar',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lugar') ? [] : ['className' => LugarTable::class];
        $this->Lugar = $this->getTableLocator()->get('Lugar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Lugar);

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
