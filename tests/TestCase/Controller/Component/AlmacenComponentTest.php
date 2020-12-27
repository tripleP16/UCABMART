<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AlmacenComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AlmacenComponent Test Case
 */
class AlmacenComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\AlmacenComponent
     */
    protected $Almacen;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Almacen = new AlmacenComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Almacen);

        parent::tearDown();
    }
}
