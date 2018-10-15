<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousRootsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousRootsTable Test Case
 */
class FamousRootsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousRootsTable
     */
    public $FamousRoots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_roots',
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
        $config = TableRegistry::exists('FamousRoots') ? [] : ['className' => FamousRootsTable::class];
        $this->FamousRoots = TableRegistry::get('FamousRoots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousRoots);

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
