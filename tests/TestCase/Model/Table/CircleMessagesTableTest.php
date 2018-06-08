<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CircleMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CircleMessagesTable Test Case
 */
class CircleMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CircleMessagesTable
     */
    public $CircleMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.circle_messages',
        'app.circles',
        'app.users',
        'app.circle_groups',
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
        'app.organizers',
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
        $config = TableRegistry::exists('CircleMessages') ? [] : ['className' => CircleMessagesTable::class];
        $this->CircleMessages = TableRegistry::get('CircleMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CircleMessages);

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
