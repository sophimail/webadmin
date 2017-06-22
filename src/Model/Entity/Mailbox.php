<?php
/**
 *
 * Copyright (c) 2017 AVERWAY LTD
 *
 * LICENSE:
 *
 * This file is part of SophiMail Dashboard (http://www.sophimail.com).
 *
 * SophiMail Dashboard is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any
 * later version with exceptions for vendors and plugins.
 *
 * See the LICENSE file for a full license statement.
 *
 * SophiMail Dashboard is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with SophiMail Dashboard.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author AVERWAY LTD <support@sophimail.com>
 * @license GNU/GPLv3 or later; https://www.gnu.org/licenses/gpl.html
 * @copyright 2017 AVERWAY LTD
 * 
 * SophiMail is a registered trademark of AVERWAY LTD
 *
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Core\Configure;

/**
 * Mailbox Entity.
 *
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $maildir
 * @property int $quota
 * @property string $local_part
 * @property string $domain
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 */
class Mailbox extends Entity
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
    

    protected function _setPassword($value)
    {
        // SHA512-CRYPT
        if (Configure::read('_Constants.encrypt')=='SHA512-CRYPT') {
            $salt = substr(sha1(rand()), 0, 16);   
            $hashedPassword = "{SHA512-CRYPT}" . crypt($value, "$6$$salt");   
        }
        
        // SHA256-CRYPT
        if (Configure::read('_Constants.encrypt')=='SHA256-CRYPT') {
            $salt = substr(sha1(rand()), 0, 16);            
            $hashedPassword = "{SHA256-CRYPT}" . crypt($value, "$5$$salt");
        }
        
        // MD5
        if (Configure::read('_Constants.encrypt')=='MD5') {
            $salt = substr(md5(rand()), 0, 8);
            $hashedPassword = "{MD5}" . crypt($value, "$1$$salt");
        }
        
        return $hashedPassword;
    }    
}
