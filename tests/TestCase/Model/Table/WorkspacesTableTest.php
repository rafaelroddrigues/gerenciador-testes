<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkspacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkspacesTable Test Case
 */
class WorkspacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkspacesTable
     */
    public $Workspaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.workspaces',
        'app.projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Workspaces') ? [] : ['className' => WorkspacesTable::class];
        $this->Workspaces = TableRegistry::get('Workspaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Workspaces);

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
