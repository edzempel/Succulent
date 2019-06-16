<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlantsTable Test Case
 */
class PlantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlantsTable
     */
    public $Plants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Plants',
        'app.Users',
        'app.Photos',
        'app.Pots',
        'app.Waters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Plants') ? [] : ['className' => PlantsTable::class];
        $this->Plants = TableRegistry::getTableLocator()->get('Plants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Plants);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
