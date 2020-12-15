<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CuentaUsuarioComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CuentaUsuarioComponent Test Case
 */
class CuentaUsuarioComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\CuentaUsuarioComponent
     */
    protected $CuentaUsuario;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CuentaUsuario = new CuentaUsuarioComponent($registry);
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
}
