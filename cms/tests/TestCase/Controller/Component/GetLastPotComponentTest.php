<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\GetLastPotComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\GetLastPotComponent Test Case
 */
class GetLastPotComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\GetLastPotComponent
     */
    public $GetLastPot;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->GetLastPot = new GetLastPotComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GetLastPot);

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
