<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkspacesCodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkspacesCodesTable Test Case
 */
class WorkspacesCodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkspacesCodesTable
     */
    public $WorkspacesCodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.workspaces_codes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WorkspacesCodes') ? [] : ['className' => WorkspacesCodesTable::class];
        $this->WorkspacesCodes = TableRegistry::get('WorkspacesCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkspacesCodes);

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
