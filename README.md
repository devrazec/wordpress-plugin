# Install WordPress with sqlite

Download WordPRess 6.5.5:
- Link: https://wordpress.org/download/releases/#branch-65

Download plugin sqlite:
- Link: https://wordpress.org/plugins/sqlite-database-integration/

Copy the entire plugin folder into:
- wp-content/plugins/sqlite-database-integration

Move:
- /wp-content/plugins/sqlite-database-integration/db.copy to /wp-content/db.php

Create the SQLite database folder:
- mkdir wp-content/database

Permissions:
- chmod 755 wp-content/database

Rename:
- /wp-config-sample.php to /wp-config.php

# Start Wordpress
- php -S localhost:8080
- http://localhost:8080/

Check database:
- wp-content/database/.ht.sqlite

# Admin Panel
User: admin
Password: password
http://localhost:8080/wp-admin

# PHP.ini settings

```

/usr/local/etc/php/8.4/php.ini
/usr/local/etc/php/8.2/php.ini

upload_max_filesize = 128M
post_max_size = 128M
memory_limit = 512M
max_execution_time = 500
max_input_time = 300
max_input_vars = 3000

sudo apachectl restart
brew services restart php
php-fpm --restart

```
# Install Wpbakery Plugin

https://downloads.wordpress.org/plugin/layouts-for-wpbakery.zip
