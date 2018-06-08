<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeedbacksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeedbacksTable Test Case
 */
class FeedbacksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeedbacksTable
     */
    public $Feedbacks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.feedbacks',
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
        'app.generals',
        'app.jobs',
        'app.job_replies',
        'app.messages',
        'app.target_users',
        'app.message_replies',
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
        $config = TableRegistry::exists('Feedbacks') ? [] : ['className' => FeedbacksTable::class];
        $this->Feedbacks = TableRegistry::get('Feedbacks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Feedbacks);

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
