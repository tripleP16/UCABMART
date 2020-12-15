<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\LugarComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\LugarComponent Test Case
 */
class LugarComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\LugarComponent
     */
    protected $Lugar;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Lugar = new LugarComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Lugar);

        parent::tearDown();
    }
}
