<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExecutionTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExecutionTypeTable Test Case
 */
class ExecutionTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExecutionTypeTable
     */
    public $ExecutionType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.execution_type',
        'app.test_executions',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.test_phases',
        'app.users',
        'app.roles',
        'app.environments',
        'app.bugs',
        'app.test_case_steps',
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
        $config = TableRegistry::exists('ExecutionType') ? [] : ['className' => ExecutionTypeTable::class];
        $this->ExecutionType = TableRegistry::get('ExecutionType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExecutionType);

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
