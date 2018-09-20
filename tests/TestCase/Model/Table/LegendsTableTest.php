<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LegendsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LegendsTable Test Case
 */
class LegendsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LegendsTable
     */
    public $Legends;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.legends'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Legends') ? [] : ['className' => LegendsTable::class];
        $this->Legends = TableRegistry::get('Legends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Legends);

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
