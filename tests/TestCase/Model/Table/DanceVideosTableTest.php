<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DanceVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DanceVideosTable Test Case
 */
class DanceVideosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DanceVideosTable
     */
    public $DanceVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dance_videos',
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
        $config = TableRegistry::exists('DanceVideos') ? [] : ['className' => DanceVideosTable::class];
        $this->DanceVideos = TableRegistry::get('DanceVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DanceVideos);

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
