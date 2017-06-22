<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AliasDomain Entity.
 *
 * @property string $alias_domain
 * @property string $target_domain
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 */
class AliasDomain extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'alias_domain' => false,
    ];
}
