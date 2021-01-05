<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZonaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZonaTable Test Case
 */
class ZonaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ZonaTable
     */
    protected $Zona;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Zona',
        'app.Pasillo',
        'app.Producto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Zona') ? [] : ['className' => ZonaTable::class];
        $this->Zona = $this->getTableLocator()->get('Zona', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Zona);

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
