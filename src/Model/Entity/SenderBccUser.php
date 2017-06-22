<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SenderBccUser Entity.
 *
 * @property string $username
 * @property string $bcc_address
 * @property string $domain
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $expired
 * @property bool $active
 */
class SenderBccUser extends Entity
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
}
