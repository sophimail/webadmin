<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipientBccDomainFixture
 *
 */
class RecipientBccDomainFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'recipient_bcc_domain';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'domain' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bcc_address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        'expired' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '9999-12-31 00:00:00', 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'bcc_address' => ['type' => 'index', 'columns' => ['bcc_address'], 'length' => []],
            'expired' => ['type' => 'index', 'columns' => ['expired'], 'length' => []],
            'active' => ['type' => 'index', 'columns' => ['active'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['domain'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'domain' => '518def38-99d1-4022-bc2a-52b1cc60220d',
            'bcc_address' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-05-22 16:07:44',
            'modified' => '2016-05-22 16:07:44',
            'expired' => '2016-05-22 16:07:44',
            'active' => 1
        ],
    ];
}
