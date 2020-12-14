<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelefonoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelefonoTable Test Case
 */
class TelefonoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TelefonoTable
     */
    protected $Telefono;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Telefono',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Telefono') ? [] : ['className' => TelefonoTable::class];
        $this->Telefono = $this->getTableLocator()->get('Telefono', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Telefono);

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
