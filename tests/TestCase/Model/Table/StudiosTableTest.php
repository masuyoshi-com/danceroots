<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudiosTable Test Case
 */
class StudiosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudiosTable
     */
    public $Studios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.studios',
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
        'app.organizers',
        'app.reports',
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
        $config = TableRegistry::exists('Studios') ? [] : ['className' => StudiosTable::class];
        $this->Studios = TableRegistry::get('Studios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Studios);

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
