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

