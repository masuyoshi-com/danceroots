<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DanceMoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DanceMoviesTable Test Case
 */
class DanceMoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DanceMoviesTable
     */
    public $DanceMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dance_movies',
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
        $config = TableRegistry::exists('DanceMovies') ? [] : ['className' => DanceMoviesTable::class];
        $this->DanceMovies = TableRegistry::get('DanceMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DanceMovies);

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
