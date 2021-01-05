<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BeneficioComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BeneficioComponent Test Case
 */
class BeneficioComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\BeneficioComponent
     */
    protected $Beneficio;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Beneficio = new BeneficioComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Beneficio);

        parent::tearDown();
    }
}
