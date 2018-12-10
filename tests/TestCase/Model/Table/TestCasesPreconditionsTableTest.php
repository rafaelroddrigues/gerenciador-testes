<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCasesPreconditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCasesPreconditionsTable Test Case
 */
class TestCasesPreconditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCasesPreconditionsTable
     */
    public $TestCasesPreconditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_cases_preconditions',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.preconditions',
        'app.requirements',
        'app.test_cases_requirements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestCasesPreconditions') ? [] : ['className' => TestCasesPreconditionsTable::class];
        $this->TestCasesPreconditions = TableRegistry::get('TestCasesPreconditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCasesPreconditions);

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
