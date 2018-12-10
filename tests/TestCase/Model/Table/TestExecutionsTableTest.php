<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestExecutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestExecutionsTable Test Case
 */
class TestExecutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestExecutionsTable
     */
    public $TestExecutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_executions',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
        'app.test_case_steps',
        'app.test_cases_test_case_steps',
        'app.test_phases',
        'app.users',
        'app.roles',
        'app.environments',
        'app.bugs',
        'app.test_executions_bugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestExecutions') ? [] : ['className' => TestExecutionsTable::class];
        $this->TestExecutions = TableRegistry::get('TestExecutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestExecutions);

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
