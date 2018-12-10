<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCaseStepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCaseStepsTable Test Case
 */
class TestCaseStepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCaseStepsTable
     */
    public $TestCaseSteps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_case_steps',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
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
        $config = TableRegistry::exists('TestCaseSteps') ? [] : ['className' => TestCaseStepsTable::class];
        $this->TestCaseSteps = TableRegistry::get('TestCaseSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCaseSteps);

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
