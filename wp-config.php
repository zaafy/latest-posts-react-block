<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'brantt' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1234567' );

/** Database hostname */
define( 'DB_HOST', 'brantt-brantt_db-1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'e7^U|QI>].A%Qig)40_mi%zdz]B=1/%aaYT,,{,oJ1fL#QP[OF9;CP%;;drF!OSJ' );
define( 'SECURE_AUTH_KEY',   ' KU/+Dt=Tpk%])7*!vp@s8@H>TiCQ)7tW6c!Us|Zuo[}]>S#JDhQdy3]hHm|-hu:' );
define( 'LOGGED_IN_KEY',     'B2!CHwW[N*V.Yl~{7iK|f7Rcs8XPtxYy}VyC?!rZZxEb/+8jJG{yVpn@0`ktdW@d' );
define( 'NONCE_KEY',         '0,5tFg0!f4<kC@w=YrO6/z#D`o4IM];YtWRbZzUIidH3uK$8teUcX5NoHxe4O(dS' );
define( 'AUTH_SALT',         '$ D*o-W.{D{2<oP4YuA.e~XMg|6Bi,C^9&q`O.TyuuRo&i}AN 3Q&TpCGx8yT~6h' );
define( 'SECURE_AUTH_SALT',  'lrJ,^n_U7Gy~ g6vL%k>hOIlIC,L*JuQ1 C)fc8;pPdc9bpd8v/xo[b[m(tmU=*`' );
define( 'LOGGED_IN_SALT',    'j1aB&P)v}b{1*#kV&iwtl%*DP1>yQ~wY;).z$}No@54/jUn&SpWlv;#PUqX~m((l' );
define( 'NONCE_SALT',        '9Y<je@I^*QW5e`m`6Cc:~ZeVU+Vjf])HJb5bs2wxYwVc>^m`m,WKD^,!`FT1NddZ' );
define( 'WP_CACHE_KEY_SALT', 'k;w ~^%?GfdN%{^_e!zSXq&>fNll3F=~ry7~YB)i(:y|mOadL_=KT6OGJjqgd|kZ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

define( 'FS_METHOD', 'direct' );


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
