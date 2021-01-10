<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\ExcelForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ExcelForm Test Case
 */
class ExcelFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\ExcelForm
     */
    protected $Excel;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Excel = new ExcelForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Excel);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
