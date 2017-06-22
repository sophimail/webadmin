<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountMappingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountMappingsTable Test Case
 */
class AccountMappingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountMappingsTable
     */
    public $AccountMappings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.account_mappings',
        'app.accounts',
        'app.shards',
        'app.admin_mappings',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AccountMappings') ? [] : ['className' => 'App\Model\Table\AccountMappingsTable'];
        $this->AccountMappings = TableRegistry::get('AccountMappings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountMappings);

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
