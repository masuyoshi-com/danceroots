<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousArtistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousArtistsTable Test Case
 */
class FamousArtistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousArtistsTable
     */
    public $FamousArtists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_artists',
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
        $config = TableRegistry::exists('FamousArtists') ? [] : ['className' => FamousArtistsTable::class];
        $this->FamousArtists = TableRegistry::get('FamousArtists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousArtists);

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
