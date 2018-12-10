<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsPreconditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsPreconditionsTable Test Case
 */
class ProjectsPreconditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsPreconditionsTable
     */
    public $ProjectsPreconditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects_preconditions',
        'app.projects',
        'app.preconditions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectsPreconditions') ? [] : ['className' => ProjectsPreconditionsTable::class];
        $this->ProjectsPreconditions = TableRegistry::get('ProjectsPreconditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsPreconditions);

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
