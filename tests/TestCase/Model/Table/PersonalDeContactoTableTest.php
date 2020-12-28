<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonalDeContactoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonalDeContactoTable Test Case
 */
class PersonalDeContactoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonalDeContactoTable
     */
    protected $PersonalDeContacto;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PersonalDeContacto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PersonalDeContacto') ? [] : ['className' => PersonalDeContactoTable::class];
        $this->PersonalDeContacto = $this->getTableLocator()->get('PersonalDeContacto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PersonalDeContacto);

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
