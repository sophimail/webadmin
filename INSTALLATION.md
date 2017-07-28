## INSTALLATION
- `composer clearcache` (optional)
- Clone the current master with: `git clone https://github.com/sophimail/webadmin.git`
- `cd webadmin`
- Install dependencies: `composer install`
- `chown -R :your-web-server-group-name webadmin`



## Database initialization

Note: Database for SophiMail Webadmin must use UTF-8 character set. Create a new database with DB name \`a0001\`.

- `create database a0001 default character set utf8;`
- `mysql a0001 < SQL/mysql.initial.sql`


## DSN configuration
Modify file: config/app.php

- Default Datasource: DB: a0001 on localhost.
The default administrative database for server locations, administrators and domain attributes.

- DB1 remote Datasource, it is the actual email server database (according to PostfixAdmin db scheme). This can be a remote database on different location.
 
Additionally, one can add as many datasource as the email servers under administration. For instance add DB2 as another datasource to manage another remote email server.
Thus, within a single web instance an administrator can manage multiple email server engines on different locations, even on-premise. Remember to enable port 3306 on firewall on remote machines only for the web server IP running the webadmin virtual host.


## Create Superadmin user
- `cd webadmin`
- `bin/cake users addSuperuser`


## Final steps
- Configure apache for the new virtual host
- Login as superuser and the password given above (addSuperuser step)
- After login, create datasources under Manage -> Locations and provide the datasource DSN name given in app.php found in 'DSN configuration' section above e.g. Datasource: DB1

