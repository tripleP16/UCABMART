<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RubroComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RubroComponent Test Case
 */
class RubroComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\RubroComponent
     */
    protected $Rubro;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Rubro = new RubroComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rubro);

        parent::tearDown();
    }
}
