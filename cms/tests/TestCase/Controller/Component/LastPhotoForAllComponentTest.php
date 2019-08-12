<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\LastPhotoForAllComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\LastPhotoForAllComponent Test Case
 */
class LastPhotoForAllComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\LastPhotoForAllComponent
     */
    public $LastPhotoForAll;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->LastPhotoForAll = new LastPhotoForAllComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LastPhotoForAll);

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
