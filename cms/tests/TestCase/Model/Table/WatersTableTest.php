<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WatersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WatersTable Test Case
 */
class WatersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WatersTable
     */
    public $Waters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Waters',
        'app.Plants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Waters') ? [] : ['className' => WatersTable::class];
        $this->Waters = TableRegistry::getTableLocator()->get('Waters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Waters);

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
