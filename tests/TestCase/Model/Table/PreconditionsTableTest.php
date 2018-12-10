<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreconditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreconditionsTable Test Case
 */
class PreconditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PreconditionsTable
     */
    public $Preconditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.preconditions',
        'app.test_cases',
        'app.test_plans',
        'app.projects',
        'app.test_cases_preconditions',
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
        $config = TableRegistry::exists('Preconditions') ? [] : ['className' => PreconditionsTable::class];
        $this->Preconditions = TableRegistry::get('Preconditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Preconditions);

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
