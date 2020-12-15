<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubmarcaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubmarcaTable Test Case
 */
class SubmarcaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubmarcaTable
     */
    protected $Submarca;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Submarca',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Submarca') ? [] : ['className' => SubmarcaTable::class];
        $this->Submarca = $this->getTableLocator()->get('Submarca', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Submarca);

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
