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
define( 'DB_NAME', 'my-project' );

/** MySQL database username */
define( 'DB_USER', 'my-project' );

/** MySQL database password */
define( 'DB_PASSWORD', 'my-password' );

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
define( 'AUTH_KEY',         'rD7)idtg/1GtC^;&TM4.R!-lXIh0{wM_2]k]{SYIQ/:%,W_l+@Yd%Vxi#D1CaFY@' );
define( 'SECURE_AUTH_KEY',  'aw3/.UdrF#~|&(H*dp~t%/0pXy(ZWYAJ!0,0VtPb>6Y**h!I^+dl[9J3[W)`MX*k' );
define( 'LOGGED_IN_KEY',    '@KSk8rTSG)8~CFF-.`*-H$@hX#.Ke9+C1h1I/M%J*.vm^Q<%eFk{*DHb9_Pc!=qE' );
define( 'NONCE_KEY',        'D`@]Twd?jO#4sQYjsiZ_BOBX(cB@%U9ibKT0.8UhmY4v$;^P~h:.lG:M<O&,/{+D' );
define( 'AUTH_SALT',        '8OSI:bs)GQSk<H 39+ew)+C` 1ZE#LBB=ox//+1cK.Zo%@{{lFr}%p58W%HFYc%P' );
define( 'SECURE_AUTH_SALT', 'f3=v#O`c{I_W:qMes50Wu6}a_6t?@twD*V)RX!Hn5==`2X#oE2-[j}rB/ci+90Ro' );
define( 'LOGGED_IN_SALT',   'L*eQnhk3~c_*v<K$?Gi6 ?F4+.|y6gp62vhmT5mFass@0afuz3JaN!NnYV_Lu+3[' );
define( 'NONCE_SALT',       'gvfyG{v<}ImD@wR]6eO fM?O@xw/x[t{G4i;|M:b^i1Rfya|hW;oVTLGwea2@@eO' );

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
