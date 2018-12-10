<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCasesExecutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCasesExecutionsTable Test Case
 */
class TestCasesExecutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCasesExecutionsTable
     */
    public $TestCasesExecutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_cases_executions',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
        'app.test_case_steps',
        'app.test_cases_test_case_steps',
        'app.executions',
        'app.bugs',
        'app.phases',
        'app.users',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestCasesExecutions') ? [] : ['className' => TestCasesExecutionsTable::class];
        $this->TestCasesExecutions = TableRegistry::get('TestCasesExecutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCasesExecutions);

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
