<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecommendMusicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecommendMusicsTable Test Case
 */
class RecommendMusicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecommendMusicsTable
     */
    public $RecommendMusics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recommend_musics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecommendMusics') ? [] : ['className' => RecommendMusicsTable::class];
        $this->RecommendMusics = TableRegistry::get('RecommendMusics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecommendMusics);

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
