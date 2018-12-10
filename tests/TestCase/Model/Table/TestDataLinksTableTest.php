<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestDataLinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestDataLinksTable Test Case
 */
class TestDataLinksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestDataLinksTable
     */
    public $TestDataLinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_data_links',
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
        $config = TableRegistry::exists('TestDataLinks') ? [] : ['className' => TestDataLinksTable::class];
        $this->TestDataLinks = TableRegistry::get('TestDataLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestDataLinks);

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
