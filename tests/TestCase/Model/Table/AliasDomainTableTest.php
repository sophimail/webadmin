<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AliasDomainTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AliasDomainTable Test Case
 */
class AliasDomainTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AliasDomainTable
     */
    public $AliasDomain;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('AliasDomain') ? [] : ['className' => 'App\Model\Table\AliasDomainTable'];
        $this->AliasDomain = TableRegistry::get('AliasDomain', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AliasDomain);

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
