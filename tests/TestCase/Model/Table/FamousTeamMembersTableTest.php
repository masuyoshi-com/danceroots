<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousTeamMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousTeamMembersTable Test Case
 */
class FamousTeamMembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousTeamMembersTable
     */
    public $FamousTeamMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_team_members',
        'app.users',
        'app.famous_teams',
        'app.famous_dancers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FamousTeamMembers') ? [] : ['className' => FamousTeamMembersTable::class];
        $this->FamousTeamMembers = TableRegistry::get('FamousTeamMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousTeamMembers);

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
