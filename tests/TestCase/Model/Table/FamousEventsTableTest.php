<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousEventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousEventsTable Test Case
 */
class FamousEventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousEventsTable
     */
    public $FamousEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_events',
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
        $config = TableRegistry::exists('FamousEvents') ? [] : ['className' => FamousEventsTable::class];
        $this->FamousEvents = TableRegistry::get('FamousEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousEvents);

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
