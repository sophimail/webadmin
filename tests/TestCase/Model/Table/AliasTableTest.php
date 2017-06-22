<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AliasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AliasTable Test Case
 */
class AliasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AliasTable
     */
    public $Alias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alias',
        'app.domain',
        'app.alias_domain'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Alias') ? [] : ['className' => 'App\Model\Table\AliasTable'];
        $this->Alias = TableRegistry::get('Alias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Alias);

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
