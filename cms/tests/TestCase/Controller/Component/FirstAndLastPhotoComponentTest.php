<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\FirstAndLastPhotoComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\FirstAndLastPhotoComponent Test Case
 */
class FirstAndLastPhotoComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\FirstAndLastPhotoComponent
     */
    public $FirstAndLastPhoto;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->FirstAndLastPhoto = new FirstAndLastPhotoComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FirstAndLastPhoto);

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
