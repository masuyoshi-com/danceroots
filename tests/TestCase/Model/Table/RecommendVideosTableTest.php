<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecommendVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecommendVideosTable Test Case
 */
class RecommendVideosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecommendVideosTable
     */
    public $RecommendVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recommend_videos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecommendVideos') ? [] : ['className' => RecommendVideosTable::class];
        $this->RecommendVideos = TableRegistry::get('RecommendVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecommendVideos);

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
