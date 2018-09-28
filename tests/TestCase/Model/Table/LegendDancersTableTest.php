<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LegendDancersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LegendDancersTable Test Case
 */
class LegendDancersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LegendDancersTable
     */
    public $LegendDancers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.legend_dancers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LegendDancers') ? [] : ['className' => LegendDancersTable::class];
        $this->LegendDancers = TableRegistry::get('LegendDancers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LegendDancers);

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
