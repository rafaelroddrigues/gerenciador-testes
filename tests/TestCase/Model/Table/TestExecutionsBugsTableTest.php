<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestExecutionsBugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestExecutionsBugsTable Test Case
 */
class TestExecutionsBugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestExecutionsBugsTable
     */
    public $TestExecutionsBugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_executions_bugs',
        'app.test_executions',
        'app.execution_types',
        'app.test_cases',
        'app.test_plans',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.test_phases',
        'app.users',
        'app.roles',
        'app.environments',
        'app.bugs',
        'app.test_case_steps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestExecutionsBugs') ? [] : ['className' => TestExecutionsBugsTable::class];
        $this->TestExecutionsBugs = TableRegistry::get('TestExecutionsBugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestExecutionsBugs);

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
