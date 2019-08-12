<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\DeletePhotoComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\DeletePhotoComponent Test Case
 */
class DeletePhotoComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\DeletePhotoComponent
     */
    public $DeletePhoto;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->DeletePhoto = new DeletePhotoComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeletePhoto);

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
