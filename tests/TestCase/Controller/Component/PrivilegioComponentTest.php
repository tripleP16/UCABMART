<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PrivilegioComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PrivilegioComponent Test Case
 */
class PrivilegioComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\PrivilegioComponent
     */
    protected $Privilegio;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Privilegio = new PrivilegioComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Privilegio);

        parent::tearDown();
    }
}
