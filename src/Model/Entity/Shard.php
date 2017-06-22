<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shard Entity.
 *
 * @property string $id
 * @property string $domain
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Account[] $accounts
 * @property \App\Model\Entity\User[] $users
 */
class Shard extends Entity
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
