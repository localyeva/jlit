<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jlitreal_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         '|wR5@@G)6Q-nkd+O--|@t}y#YPCQx0!|lWCoAQU-QLlkES~5/Y/qp/i(|-u*)T=^');
define('SECURE_AUTH_KEY',  '}Tj,KV8H>m1xf+n+d*i-dx2-]=k}K<7/EOi._<-OXVm5y2*`J,-z9oOhkh%XjZ/]');
define('LOGGED_IN_KEY',    'UTvmr4-08v|LV6#kLI4rhP/-#nxI6L!#)L63du 3j$)z-phS=a_Mi+.Y?)-edL6+');
define('NONCE_KEY',        '*N58pwfdw7bzpX&vvYCK&~|VF_Ofsg|U+3HsI@SXs<l&Rx.bky#f_)^+Ord@|]-h');
define('AUTH_SALT',        'xTY{o2<kh5H|Z.r16*/G@k?7s.4Odq+0mI|K9!9sS|+j#lnP[<wJK2g6BY7.> AG');
define('SECURE_AUTH_SALT', '@>45`Rfsb!!|qFbzjGHIj9?vL24!lM]Br`iOnS$r2;Q^AW:hRHX:wJ F@KeOYc*K');
define('LOGGED_IN_SALT',   'bnp^H|&XZ-0A)%bmmI8lV.1:u_-^uE.uKM. e:v6gZIG.JJWK #R#!o>t0H4hZW~');
define('NONCE_SALT',       '7DlG F0{z~eLL=dcUQDRXmsTRJi8,!V+6Oo/DT+.MwYhf./ 2=NIe:/%aIDP3c-C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');

// Disable Plugin and Theme Update and Installation
// define( 'DISALLOW_FILE_MODS', true );

// Disable all automatic updates:
// define( 'AUTOMATIC_UPDATER_DISABLED', true );

// define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
