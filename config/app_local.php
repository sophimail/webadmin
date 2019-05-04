<?php
return [
    'reCaptcha' => [
        'secret' => 'CHANGE ME',
        'key' => 'CHANGE ME'
        ],

    '_Constants' => [
        /**
	* Dovecot password encryption method
        * Available methods:
        * 'MD5'
        * 'SHA256-CRYPT'
        * 'SHA512-CRYPT'
        * 'MD5-CRYPT'
        * List available dovecot crypt methods: doveadm pw -l
        * Ref.: http://wiki.dovecot.org/Authentication/PasswordSchemes
        *
	*/
	'encrypt' => 'SHA512-CRYPT',
        'quota_multiplier' => '1048576', // Constant to convert Bytes to MB and vice versa. Either use '1024000' or '1048576'
        'password_length' => '5',
        'strong_password' => true, // at least two letters, at least two numbers, at least one special character (Validation rules: MailboxTable.php)
        'aliases' => '10',
        'mailboxes' => '10',
        'maxquota' => '10',
        'unlimited' => '10485760', // 10TB - define unlimited in MB (eg. total storage capacity)
        'domain_quota_default' => '2000',
        'transport_options' => ['virtual' => 'virtual',  'local' => 'local',  'relay' => 'relay'],
        'transport_default' => 'virtual',
            /**
             * If you don't want to have the domain in your mailbox set this to 'false'.
             * Examples:
             *  true: /usr/local/virtual/domain.tld/username@domain.tld
             *  false:  /usr/local/virtual/domain.tld/username
             *
             *  For custom function
             *  change '_create_maildir()' in MailboxTable.php
             *
             */
        'domain_in_mailbox' => false,
    ],
];
