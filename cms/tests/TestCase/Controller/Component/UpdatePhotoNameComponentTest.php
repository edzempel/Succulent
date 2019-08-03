<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UpdatePhotoNameComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UpdatePhotoNameComponent Test Case
 */
class UpdatePhotoNameComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\UpdatePhotoNameComponent
     */
    public $UpdatePhotoName;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->UpdatePhotoName = new UpdatePhotoNameComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UpdatePhotoName);

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
