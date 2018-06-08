<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganizersTable Test Case
 */
class OrganizersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrganizersTable
     */
    public $Organizers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizers',
        'app.users',
        'app.circle_groups',
        'app.circles',
        'app.dance_movies',
        'app.dance_musics',
        'app.dance_videos',
        'app.dancers',
        'app.event_entries',
        'app.events',
        'app.event_replies',
        'app.feedbacks',
        'app.generals',
        'app.jobs',
        'app.job_replies',
        'app.messages',
        'app.target_users',
        'app.message_replies',
        'app.reports',
        'app.studios',
        'app.team_groups',
        'app.teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Organizers') ? [] : ['className' => OrganizersTable::class];
        $this->Organizers = TableRegistry::get('Organizers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organizers);

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
