<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamousDancersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamousDancersTable Test Case
 */
class FamousDancersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamousDancersTable
     */
    public $FamousDancers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famous_dancers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FamousDancers') ? [] : ['className' => FamousDancersTable::class];
        $this->FamousDancers = TableRegistry::get('FamousDancers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamousDancers);

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
