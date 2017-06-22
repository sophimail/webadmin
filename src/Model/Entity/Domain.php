<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Domain Entity.
 *
 * @property string $domain
 * @property string $description
 * @property int $aliases
 * @property int $mailboxes
 * @property int $maxquota
 * @property int $quota
 * @property string $transport
 * @property bool $backupmx
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 * @property \App\Model\Entity\Alias[] $alias
 */
class Domain extends Entity
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
