<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThreadCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThreadCommentsTable Test Case
 */
class ThreadCommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThreadCommentsTable
     */
    public $ThreadComments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.thread_comments',
        'app.users',
        'app.threads',
        'app.thread_replies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThreadComments') ? [] : ['className' => ThreadCommentsTable::class];
        $this->ThreadComments = TableRegistry::get('ThreadComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThreadComments);

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
