<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\GetLastWaterComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\GetLastWaterComponent Test Case
 */
class GetLastWaterComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\GetLastWaterComponent
     */
    public $GetLastWater;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->GetLastWater = new GetLastWaterComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GetLastWater);

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
