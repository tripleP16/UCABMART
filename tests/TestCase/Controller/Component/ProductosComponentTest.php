<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ProductosComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ProductosComponent Test Case
 */
class ProductosComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ProductosComponent
     */
    protected $Productos;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Productos = new ProductosComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productos);

        parent::tearDown();
    }
}
