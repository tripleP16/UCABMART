<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolTable Test Case
 */
class RolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolTable
     */
    protected $Rol;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rol',
        'app.CuentaUsuario',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rol') ? [] : ['className' => RolTable::class];
        $this->Rol = $this->getTableLocator()->get('Rol', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rol);

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
