<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TestExecutionsBugsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TestExecutionsBugsController Test Case
 */
class TestExecutionsBugsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
