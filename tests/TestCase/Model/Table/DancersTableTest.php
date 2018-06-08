<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DancersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DancersTable Test Case
 */
class DancersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DancersTable
     */
    public $Dancers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dancers',
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
        $config = TableRegistry::exists('Dancers') ? [] : ['className' => DancersTable::class];
        $this->Dancers = TableRegistry::get('Dancers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dancers);

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
