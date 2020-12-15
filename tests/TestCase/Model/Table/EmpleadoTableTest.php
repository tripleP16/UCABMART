<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpleadoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpleadoTable Test Case
 */
class EmpleadoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpleadoTable
     */
    protected $Empleado;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Empleado',
        'app.Beneficio',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Empleado') ? [] : ['className' => EmpleadoTable::class];
        $this->Empleado = $this->getTableLocator()->get('Empleado', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Empleado);

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
}
