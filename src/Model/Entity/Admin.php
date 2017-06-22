<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity.
 *
 * @property string $username
 * @property string $password
 * @property bool $superadmin
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 * @property \App\Model\Entity\Domain[] $domain
 */
class Admin extends Entity
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
        'username' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
