<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipientBccUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipientBccUserTable Test Case
 */
class RecipientBccUserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipientBccUserTable
     */
    public $RecipientBccUser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipient_bcc_user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecipientBccUser') ? [] : ['className' => 'App\Model\Table\RecipientBccUserTable'];
        $this->RecipientBccUser = TableRegistry::get('RecipientBccUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecipientBccUser);

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
