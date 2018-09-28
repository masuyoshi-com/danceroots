<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LegendTeamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LegendTeamsTable Test Case
 */
class LegendTeamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LegendTeamsTable
     */
    public $LegendTeams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.legend_teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LegendTeams') ? [] : ['className' => LegendTeamsTable::class];
        $this->LegendTeams = TableRegistry::get('LegendTeams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LegendTeams);

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
}
