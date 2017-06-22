<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountMapping Entity.
 *
 * @property string $id
 * @property string $account_id
 * @property \App\Model\Entity\Account $account
 * @property string $shard_id
 * @property \App\Model\Entity\Shard $shard
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\AdminMapping[] $admin_mappings
 */
class AccountMapping extends Entity
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
        'id' => false,
    ];
}
