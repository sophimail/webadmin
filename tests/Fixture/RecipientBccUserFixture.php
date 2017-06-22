<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipientBccUserFixture
 *
 */
class RecipientBccUserFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'recipient_bcc_user';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'username' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bcc_address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'domain' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'primary' => ['type' => 'primary', 'columns' => ['username'], 'length' => []],
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
            'username' => '2f821a5c-c280-4766-86c8-e1423eeeb36e',
            'bcc_address' => 'Lorem ipsum dolor sit amet',
            'domain' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-05-22 16:07:50',
            'modified' => '2016-05-22 16:07:50',
            'expired' => '2016-05-22 16:07:50',
            'active' => 1
        ],
    ];
}
