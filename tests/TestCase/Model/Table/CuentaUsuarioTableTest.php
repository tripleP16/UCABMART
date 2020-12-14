<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuentaUsuarioTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuentaUsuarioTable Test Case
 */
class CuentaUsuarioTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CuentaUsuarioTable
     */
    protected $CuentaUsuario;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('CuentaUsuario') ? [] : ['className' => CuentaUsuarioTable::class];
        $this->CuentaUsuario = $this->getTableLocator()->get('CuentaUsuario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CuentaUsuario);

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
