<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BarraBusquedaComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BarraBusquedaComponent Test Case
 */
class BarraBusquedaComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\BarraBusquedaComponent
     */
    protected $BarraBusquedaComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->BarraBusquedaComponent = new BarraBusquedaComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BarraBusquedaComponent);

        parent::tearDown();
    }
}
