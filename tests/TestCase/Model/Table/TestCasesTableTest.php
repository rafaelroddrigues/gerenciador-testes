<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCasesTable Test Case
 */
class TestCasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCasesTable
     */
    public $TestCases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
        'app.test_case_steps',
        'app.test_cases_test_case_steps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestCases') ? [] : ['className' => TestCasesTable::class];
        $this->TestCases = TableRegistry::get('TestCases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCases);

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
