<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SenderBccDomainTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SenderBccDomainTable Test Case
 */
class SenderBccDomainTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SenderBccDomainTable
     */
    public $SenderBccDomain;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sender_bcc_domain'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SenderBccDomain') ? [] : ['className' => 'App\Model\Table\SenderBccDomainTable'];
        $this->SenderBccDomain = TableRegistry::get('SenderBccDomain', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SenderBccDomain);

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
