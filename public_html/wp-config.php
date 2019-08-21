<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache/* increase memory limit */define( 'WP_MEMORY_LIMIT', '128M' );



/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'glor2773_globeroving');

/** MySQL database username */
define('DB_USER', 'glor2773_septychasanah');

/** MySQL database password */
define('DB_PASSWORD', 'Hakunamatata77');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'nXS*iT}Ev:s>Wh?A6W$JHpF{B!Q=n:wM4ykH@s_wtw%nq%(/2QSIGI8cD{3i!K>{');
define('SECURE_AUTH_KEY',  'Y7B$.1re,xC$ys1FpE<l0NwS(2?#*Aj1}WL  >EXQx8@5VcAUE{(u%?<f_|lHH(F');
define('LOGGED_IN_KEY',    'EX6;)v)q[}],?T< .2}[g[L +!~|=#@GMR43FE& S.D2Nw!,!vwc+.1Q3/T?MR}G');
define('NONCE_KEY',        'N;J@8WfI{*qnU,(0%#0O}Gb:C5b&~n+5dPDVUN}ce#*C]qt#Z)p$3?-A-0iG+<.n');
define('AUTH_SALT',        ')-1b[DMukZ5/U (vrLH}#6e91&6Hz 6p&L/MY<QgCs4s^UPywaK.2HAvq)-<XK#|');
define('SECURE_AUTH_SALT', 'DQ]L-BI8lx/,WE1gIFd=5KypLcq(qqlzE}2,AW!7wHlo?y>Uhb/IG,l-56r9:xM;');
define('LOGGED_IN_SALT',   '*,{;/A>BH=g*&Qmwe7Ma0Cr>zu,u|UWy_W[#I2_;O>3;&S7WBE<lz?*U*m^0:WM/');
define('NONCE_SALT',       '=HY<63}j-.UM$(;9gG(c/D_`I)^JNWthi7lK4g;_]-tTNAjy!qS#6u407&?|wo|a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
// define('FORCE_SSL_ADMIN', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
