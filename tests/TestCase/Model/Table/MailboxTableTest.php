<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MailboxTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MailboxTable Test Case
 */
class MailboxTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MailboxTable
     */
    public $Mailbox;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mailbox'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mailbox') ? [] : ['className' => 'App\Model\Table\MailboxTable'];
        $this->Mailbox = TableRegistry::get('Mailbox', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mailbox);

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
