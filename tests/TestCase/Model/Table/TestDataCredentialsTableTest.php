<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestDataCredentialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestDataCredentialsTable Test Case
 */
class TestDataCredentialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestDataCredentialsTable
     */
    public $TestDataCredentials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.test_data_credentials',
        'app.test_data_links'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TestDataCredentials') ? [] : ['className' => TestDataCredentialsTable::class];
        $this->TestDataCredentials = TableRegistry::get('TestDataCredentials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TestDataCredentials);

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
