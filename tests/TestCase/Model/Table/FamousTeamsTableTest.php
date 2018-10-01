<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousTeamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousTeamsTable Test Case
 */
class FamousTeamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousTeamsTable
     */
    public $FamousTeams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FamousTeams') ? [] : ['className' => FamousTeamsTable::class];
        $this->FamousTeams = TableRegistry::get('FamousTeams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousTeams);

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
