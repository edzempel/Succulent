<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\LogoHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\LogoHelper Test Case
 */
class LogoHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\LogoHelper
     */
    public $Logo;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Logo = new LogoHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Logo);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
