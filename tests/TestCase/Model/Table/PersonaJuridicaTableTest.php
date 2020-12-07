<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonaJuridicaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonaJuridicaTable Test Case
 */
class PersonaJuridicaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonaJuridicaTable
     */
    protected $PersonaJuridica;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PersonaJuridica',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PersonaJuridica') ? [] : ['className' => PersonaJuridicaTable::class];
        $this->PersonaJuridica = $this->getTableLocator()->get('PersonaJuridica', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PersonaJuridica);

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
