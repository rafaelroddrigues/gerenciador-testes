<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExecutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExecutionsTable Test Case
 */
class ExecutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExecutionsTable
     */
    public $Executions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.executions',
        'app.users',
        'app.roles',
        'app.phases',
        'app.projects',
        'app.test_cases',
        'app.test_plans',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
        'app.test_case_steps',
        'app.test_cases_test_case_steps',
        'app.test_cases_executions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Executions') ? [] : ['className' => ExecutionsTable::class];
        $this->Executions = TableRegistry::get('Executions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Executions);

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
