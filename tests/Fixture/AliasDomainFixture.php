<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AliasDomainFixture
 *
 */
class AliasDomainFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'alias_domain';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'alias_domain' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'target_domain' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'active' => ['type' => 'index', 'columns' => ['active'], 'length' => []],
            'target_domain' => ['type' => 'index', 'columns' => ['target_domain'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['alias_domain'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
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
            'alias_domain' => 'cc123833-3f6b-4954-ba58-94078f617aad',
            'target_domain' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-05-22 16:07:01',
            'modified' => '2016-05-22 16:07:01',
            'active' => 1
        ],
    ];
}
