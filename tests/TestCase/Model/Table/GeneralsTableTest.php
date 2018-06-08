<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneralsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneralsTable Test Case
 */
class GeneralsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneralsTable
     */
    public $Generals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.generals',
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
        $config = TableRegistry::exists('Generals') ? [] : ['className' => GeneralsTable::class];
        $this->Generals = TableRegistry::get('Generals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Generals);

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
