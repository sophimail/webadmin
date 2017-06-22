<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipientBccDomainTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipientBccDomainTable Test Case
 */
class RecipientBccDomainTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipientBccDomainTable
     */
    public $RecipientBccDomain;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipient_bcc_domain'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecipientBccDomain') ? [] : ['className' => 'App\Model\Table\RecipientBccDomainTable'];
        $this->RecipientBccDomain = TableRegistry::get('RecipientBccDomain', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecipientBccDomain);

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
