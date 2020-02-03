<?php

namespace Select2\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Select2\View\Helper\Select2Helper;

/**
 * Select2\View\Helper\Select2Helper Test Case
 */
class Select2HelperTest extends TestCase {

    /**
     * Test subject
     *
     * @var Select2Helper
     */
    public $Select2;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $view = new View();
        $this->Select2 = new Select2Helper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Select2);
        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
