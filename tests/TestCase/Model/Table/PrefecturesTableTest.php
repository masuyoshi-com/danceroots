<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrefecturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrefecturesTable Test Case
 */
class PrefecturesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrefecturesTable
     */
    public $Prefectures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prefectures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prefectures') ? [] : ['className' => PrefecturesTable::class];
        $this->Prefectures = TableRegistry::get('Prefectures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prefectures);

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
