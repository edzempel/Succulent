<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PotsTable Test Case
 */
class PotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PotsTable
     */
    public $Pots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pots',
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
        $config = TableRegistry::getTableLocator()->exists('Pots') ? [] : ['className' => PotsTable::class];
        $this->Pots = TableRegistry::getTableLocator()->get('Pots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pots);

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
