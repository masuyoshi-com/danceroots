<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DanceMusicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DanceMusicsTable Test Case
 */
class DanceMusicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DanceMusicsTable
     */
    public $DanceMusics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dance_musics',
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
        $config = TableRegistry::exists('DanceMusics') ? [] : ['className' => DanceMusicsTable::class];
        $this->DanceMusics = TableRegistry::get('DanceMusics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DanceMusics);

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
