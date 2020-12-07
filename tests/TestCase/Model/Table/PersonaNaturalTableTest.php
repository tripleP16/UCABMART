<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonaNaturalTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonaNaturalTable Test Case
 */
class PersonaNaturalTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonaNaturalTable
     */
    protected $PersonaNatural;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PersonaNatural',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PersonaNatural') ? [] : ['className' => PersonaNaturalTable::class];
        $this->PersonaNatural = $this->getTableLocator()->get('PersonaNatural', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PersonaNatural);

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
