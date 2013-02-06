<?php
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
define('DB_NAME', 'oakwoods_wp3');

/** MySQL database username */
define('DB_USER', 'dev1');

/** MySQL database password */
define('DB_PASSWORD', 'Ch8fRef5');

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
define('AUTH_KEY',         '22dy9DEH=Pj:FDm&x7f(]zp2DPT?7[G6d<1O_]AcW>lL7bO,TbGpT8]:d>}4Z*}n');
define('SECURE_AUTH_KEY',  '2x6]efyCYpd-p/D1+Ry<OQ$.}tb?E{Tg!d^iTO%]G]oNL8jbg0n4F-ZN43-pW>V-');
define('LOGGED_IN_KEY',    'R*IxHX|GdRn)HR-;:rV8*Oe~kP>&=FO37Oz!L<Lz)R|U=*hs4w`vYb^Knjw5F9|z');
define('NONCE_KEY',        '5^o(A(}o[i_j-OEW]M^+so0QMsD-J%KQfr]$ .A9Ffh[APQ+J4;Lhd-qPu3)^7I#');
define('AUTH_SALT',        '+,yC>|s;-c&M)W4$=mB6E2E4$!z )M%-oA{X!SFso(0P#vzd{Q:A0)Ka=pF4Zlo(');
define('SECURE_AUTH_SALT', 'E+Vqd8{ C| U2dn7i9kBn7t8+U^EapQ9w/8.MU1^s|{a)q%&gCT`FN`hFh;C+_++');
define('LOGGED_IN_SALT',   'm+|:O-P!L7Dixuga(|W9$ mCi[~l`FL9KX+1r_j-Y`!8J x4%p-&B&F[;DvW/Aj@');
define('NONCE_SALT',       '5(%-~QC@8B&oPjx#e4taGI|EzLYgr1F&ywi(Ff,hfT%~BGJ]h8RHuks{/;ps,@n`');

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
