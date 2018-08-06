<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudioSchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudioSchedulesTable Test Case
 */
class StudioSchedulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudioSchedulesTable
     */
    public $StudioSchedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.studio_schedules',
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
        $config = TableRegistry::exists('StudioSchedules') ? [] : ['className' => StudioSchedulesTable::class];
        $this->StudioSchedules = TableRegistry::get('StudioSchedules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudioSchedules);

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
