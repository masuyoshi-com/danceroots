<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThreadRepliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThreadRepliesTable Test Case
 */
class ThreadRepliesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThreadRepliesTable
     */
    public $ThreadReplies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.thread_replies',
        'app.users',
        'app.threads',
        'app.thread_comments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThreadReplies') ? [] : ['className' => ThreadRepliesTable::class];
        $this->ThreadReplies = TableRegistry::get('ThreadReplies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThreadReplies);

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
