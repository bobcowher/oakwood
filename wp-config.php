<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'oakwoods_wp1');

/** MySQL database username */
define('DB_USER', 'oakwoods_wp');

/** MySQL database password */
define('DB_PASSWORD', 'ch5RaCh8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'HDFKGL6qYLsdwAvbO2WflW0aTvAEMZEeGINej3ephWWHTBDOJJfTr3yqIFealbhh');
define('SECURE_AUTH_KEY',  '1o4Y6CArQCCmn3PPblNQJRKGZEbuIDiEf8SxjbexA1j4bJHhakwMwaOZKSQxA0Po');
define('LOGGED_IN_KEY',    'cuLQ9vTmOlpYevlwb9t4RyxanaiJedhiWkPLk8JHoktKzvZZ8VVw3yQUTsmByugw');
define('NONCE_KEY',        '3DUURQalgE7wOGXqrhsI56DgvMwqm2uFkplDvMqysMXNJBQQqg8hif91uQmz7PzM');
define('AUTH_SALT',        'IYULb7K2pfm8YkuZkR9HrhkPRdJku9bc3SuiNpIVTmsfhjrQfCwLvYXDmk1xaFLt');
define('SECURE_AUTH_SALT', 'jhZeI4mnmRx63bxLTs61fd23szAMwQPzlt1tx2mqCfcrES12ihLqqSCg0lXFjySb');
define('LOGGED_IN_SALT',   'Lv65Q3kokE6UKErAmh9pYuAZuj7XqBZyPWuuaNlL1UewsBNEjVfiBqAyoidgYg2p');
define('NONCE_SALT',       'b9BGmISYDuxOjcBdXp0XyW3aUBfVda7w0ExjS37XJMRurnb6ts9uc5iPdnCrwWmD');
define('WP_TEMP_DIR',      '/home/oakwoods/domains/oakwoodsystems.net/public_html/wp-content/uploads');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
