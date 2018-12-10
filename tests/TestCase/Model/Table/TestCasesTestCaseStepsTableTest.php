<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCasesTestCaseStepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCasesTestCaseStepsTable Test Case
 */
class TestCasesTestCaseStepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCasesTestCaseStepsTable
     */
    public $TestCasesTestCaseSteps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_cases_test_case_steps',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
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
        $config = TableRegistry::exists('TestCasesTestCaseSteps') ? [] : ['className' => TestCasesTestCaseStepsTable::class];
        $this->TestCasesTestCaseSteps = TableRegistry::get('TestCasesTestCaseSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCasesTestCaseSteps);

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
