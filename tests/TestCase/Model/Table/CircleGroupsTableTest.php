<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CircleGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CircleGroupsTable Test Case
 */
class CircleGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CircleGroupsTable
     */
    public $CircleGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.circle_groups',
        'app.circles',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CircleGroups') ? [] : ['className' => CircleGroupsTable::class];
        $this->CircleGroups = TableRegistry::get('CircleGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CircleGroups);

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
