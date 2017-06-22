<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdminMappingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdminMappingsTable Test Case
 */
class AdminMappingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdminMappingsTable
     */
    public $AdminMappings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admin_mappings',
        'app.users',
        'app.account_mappings',
        'app.accounts',
        'app.shards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdminMappings') ? [] : ['className' => 'App\Model\Table\AdminMappingsTable'];
        $this->AdminMappings = TableRegistry::get('AdminMappings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdminMappings);

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
