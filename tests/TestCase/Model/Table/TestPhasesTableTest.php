<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestPhasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestPhasesTable Test Case
 */
class TestPhasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestPhasesTable
     */
    public $TestPhases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_phases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestPhases') ? [] : ['className' => TestPhasesTable::class];
        $this->TestPhases = TableRegistry::get('TestPhases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestPhases);

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
