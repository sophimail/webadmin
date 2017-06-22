<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SenderBccDomain Entity.
 *
 * @property string $domain
 * @property string $bcc_address
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $expired
 * @property bool $active
 */
class SenderBccDomain extends Entity
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
        'domain' => false,
    ];
}
