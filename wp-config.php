<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'undefinedCudaCore' );

/** MySQL database password */
define( 'DB_PASSWORD', '12h8h7k22' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'NYs/qF!fdSIBti|]Fv9F6BX~>a:Q7Cjq.Fv~TKf3|KZxTo;uF;Fl#3EU{.k 3_Kh' );
define( 'SECURE_AUTH_KEY',  'S&2Rp(Pmy4^Am`?FV2;)M2`C;6,+70pU!Tu/u_S.H;%.6mW^2OgYU:vY3G5#7qRO' );
define( 'LOGGED_IN_KEY',    'q>bX3X-Vz?Y$8Qxk}YZh} $8c*!Q?^N0c5uMeEXr(7dW=HZ0;a)7330u]e,zSoIA' );
define( 'NONCE_KEY',        'ZUde-S[Cu2}F5:e[1neyvHr@@X9v^D[@q8>+)/)zs,,fTbW0$$r:&-L:tPX(a2Lu' );
define( 'AUTH_SALT',        'v&qQ_x-:D/rava~Y0C,Y,*fY?8OoG1!<z9YA`s=p=?U:yyJp Mt?)dGJN?bzx)fI' );
define( 'SECURE_AUTH_SALT', 'T<pB6D?b9iLznS~!E[GF`W7uXOWF4Fg^tx%7~6=y=cwBT+HT_?Hxo]3Coms}O8hw' );
define( 'LOGGED_IN_SALT',   'P>}TCh=u0`S7c8+ggo>Xn6b9=.gG~}+b |@GJe=U.m>MK*uN5>!W~+~4bo/Ec}DE' );
define( 'NONCE_SALT',       'i)@#*MFj3hliSaV_B^T=Akjw k|aex25Pfwdp,#cRLeXx[GV)%]Jz8+zf fRjq|@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
