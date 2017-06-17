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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/yanging/yanging.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'yanging_com');

/** MySQL database username */
define('DB_USER', 'yangingcom');

/** MySQL database password */
define('DB_PASSWORD', '3mg?XNY3');

/** MySQL hostname */
define('DB_HOST', 'mysql.yanging.com');

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
define('AUTH_KEY',         'NPH_U;5UsT23T2;cB?9KwTUw8ym!v#6YIUa!b)DvWwqO1ja#E?V9T&UAM#_HvAGV');
define('SECURE_AUTH_KEY',  '_4b"Ml1pz"gxZ"+0?(poC`RoAJpuiWr5Mzitlmg;Hlt|O/p:*~5RNX8oxe+0%r_f');
define('LOGGED_IN_KEY',    'VbV`47``C2aHmGcyhYIBKP`CaB5UOCee_jam")yK"B:*Tj)Rd:uvwdg*S!q?JWP;');
define('NONCE_KEY',        'OSiP|^G0"@x#m|Np*PW$w(M*e|qNg"nGZ:6Z)TN6yba)tHw&Xez6I+vQ&?NNMlZd');
define('AUTH_SALT',        '?ycrAjKsaxR$%XQbEmdr~lPznG?E4PdjNocOhagB!R|FLfGy!/~^sPzTsX3$3WH*');
define('SECURE_AUTH_SALT', '#bzys#8($#VqQ^Kn@!%*F(;mB0W5UPj2oBu/hGoYqk"d7mos8ldrq3xMCZ1g8RYk');
define('LOGGED_IN_SALT',   'HWQ$qm/Ws0V)0xD6VSCbT:):QlMw(_V(N"UuIhpG%*u;tc5F0:dmBof_32RD17@d');
define('NONCE_SALT',       'nQ4%aO8web2U&_*ml9SpQzcfwth9@RtQTis~Dudw48SBSF;(l:D@x!!*3;#x(OPW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_8eb9n2_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

