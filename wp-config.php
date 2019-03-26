<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ecocyclists');

/** MySQL database username */
define('DB_USER', 'ecocyclists_usr');

/** MySQL database password */
define('DB_PASSWORD', '12345');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '20jkpEO)P0K^t9!uTCtSHIFNizo3BTpiEsR*LhoB*gu8V!JEHwv3Nv5IBf^nbGTx');
define('SECURE_AUTH_KEY',  'ilAIUx32osCHJQ(T3JwTvA2vD(N@7plB9gmNN6&V^nVTHYUlOhZgccN9%LkPXaf9');
define('LOGGED_IN_KEY',    'x1BTRWbYc%Z(xBcrO39srI5pEb#YhF7lGyqs5)wW0zP^E9z62Sb4kPn0VYBDnbiD');
define('NONCE_KEY',        'i7I#$F^^m@%91dKI%%2vfZoU)bWQw!7ajZPfiZkq52eccXKT4BbTby1!BJMsW01K');
define('AUTH_SALT',        'GkM6@nVl%%f8t0rTu8r4EdU!4DTCvH&t@jLhX#YdI^5&bzcx9WjXQt4u&DY*Q!2L');
define('SECURE_AUTH_SALT', '4HtDM%NeKK04mOz%V8^AjiY$QU8WM8C9eipsz!bo)s35Jhew0BpqypwuIci#Pvab');
define('LOGGED_IN_SALT',   'mYDrBHUKt%tQXcTxYtTWUSCIkg^!1T$oMV(x0c(BpKW3tn91H3DUrbBM8rO$TYWw');
define('NONCE_SALT',       'oADv%sl1x0cBmP8@S!MkAV5GN$0tqbPlf!j)87uOfL&xrO8y(bQr&NRXVc(x$V#H');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
