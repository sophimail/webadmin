<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShardsTable Test Case
 */
class ShardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShardsTable
     */
    public $Shards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shards',
        'app.accounts',
        'app.shards_accounts',
        'app.users',
        'app.users_shards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shards') ? [] : ['className' => 'App\Model\Table\ShardsTable'];
        $this->Shards = TableRegistry::get('Shards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shards);

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
