<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefectsTable Test Case
 */
class DefectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefectsTable
     */
    public $Defects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.defects',
        'app.test_case_steps',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.workspaces',
        'app.preconditions',
        'app.test_cases_preconditions',
        'app.requirements',
        'app.test_cases_requirements',
        'app.test_cases_test_case_steps',
        'app.executions',
        'app.users',
        'app.roles',
        'app.phases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Defects') ? [] : ['className' => DefectsTable::class];
        $this->Defects = TableRegistry::get('Defects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Defects);

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
