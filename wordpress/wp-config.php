<?php
@ini_set('display_errors', 1);
@ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** @desc this loads the composer autoload file */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';
/** @desc this instantiates Dotenv and passes in our path to .env */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
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
defined('WORDPRESS_ENV') or define('WORDPRESS_ENV', $_ENV['WORDPRESS_ENV']);
defined('WP_HOME') or define('WP_HOME', $_ENV['WP_HOME']);
defined('DB_NAME') or define('DB_NAME', $_ENV['DB_NAME']);
defined('DB_USER') or define('DB_USER', $_ENV['DB_USER']);
defined('DB_PASSWORD') or define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
defined('SHOP_IS_ON_FRONT') or define('SHOP_IS_ON_FRONT', $_ENV['SHOP_IS_ON_FRONT']);

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
$logfile = dirname(__DIR__) . '/log/error.log';
$logdir = dirname( __DIR__ ) . '/log';
define('ERRORLOGFILE', $logfile );
define('WC_LOG_DIR', $logdir );

if (WORDPRESS_ENV === 'development' || WORDPRESS_ENV === 'staging') {
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', $logfile);
    define('WP_DEBUG_DISPLAY', true);
    define('SAVEQUERIES', true);
    define('SCRIPT_DEBUG', true);
    define('DIEONDBERROR', true);
    define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
    
    /** optional: custom error handler
     function exceptions_error_handler($severity, $message, $filename, $lineno) {
     if (error_reporting() == 0) {
     return;
     }
     if (error_reporting() & $severity) {
     throw new ErrorException($message, 0, $severity, $filename, $lineno);
     }
     }
     set_error_handler('exceptions_error_handler'); **/
}

if (WORDPRESS_ENV === 'production') {
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', $logfile );
    define('WP_DEBUG_DISPLAY', false);
    define('SAVEQUERIES', false);
    define('SCRIPT_DEBUG', false);
    define('DIEONDBERROR', false);
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
