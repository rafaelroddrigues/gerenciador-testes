<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestCasesRequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestCasesRequirementsTable Test Case
 */
class TestCasesRequirementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestCasesRequirementsTable
     */
    public $TestCasesRequirements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_cases_requirements',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.requirements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestCasesRequirements') ? [] : ['className' => TestCasesRequirementsTable::class];
        $this->TestCasesRequirements = TableRegistry::get('TestCasesRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestCasesRequirements);

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
