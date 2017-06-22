<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministratorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministratorsTable Test Case
 */
class AdministratorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministratorsTable
     */
    public $Administrators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.administrators',
        'app.social_accounts',
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
        $config = TableRegistry::exists('Administrators') ? [] : ['className' => 'App\Model\Table\AdministratorsTable'];
        $this->Administrators = TableRegistry::get('Administrators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Administrators);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
