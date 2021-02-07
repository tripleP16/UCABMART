<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\YearComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\YearComponent Test Case
 */
class YearComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\YearComponent
     */
    protected $Year;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Year = new YearComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Year);

        parent::tearDown();
    }
}
