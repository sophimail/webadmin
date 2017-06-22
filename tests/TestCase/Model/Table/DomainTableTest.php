<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DomainTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DomainTable Test Case
 */
class DomainTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DomainTable
     */
    public $Domain;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.domain',
        'app.alias',
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
        $config = TableRegistry::exists('Domain') ? [] : ['className' => 'App\Model\Table\DomainTable'];
        $this->Domain = TableRegistry::get('Domain', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Domain);

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
