<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\TelefonoComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\TelefonoComponent Test Case
 */
class TelefonoComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\TelefonoComponent
     */
    protected $Telefono;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Telefono = new TelefonoComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Telefono);

        parent::tearDown();
    }
}
