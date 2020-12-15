<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\TiendaComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\TiendaComponent Test Case
 */
class TiendaComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\TiendaComponent
     */
    protected $Tienda;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Tienda = new TiendaComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tienda);

        parent::tearDown();
    }
}
