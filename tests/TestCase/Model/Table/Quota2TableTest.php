<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Quota2Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Quota2Table Test Case
 */
class Quota2TableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Quota2Table
     */
    public $Quota2;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quota2'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Quota2') ? [] : ['className' => 'App\Model\Table\Quota2Table'];
        $this->Quota2 = TableRegistry::get('Quota2', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quota2);

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
