<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestDataGeneralTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestDataGeneralTable Test Case
 */
class TestDataGeneralTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestDataGeneralTable
     */
    public $TestDataGeneral;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_data_general',
        'app.projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestDataGeneral') ? [] : ['className' => TestDataGeneralTable::class];
        $this->TestDataGeneral = TableRegistry::get('TestDataGeneral', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestDataGeneral);

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
