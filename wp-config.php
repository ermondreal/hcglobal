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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hcglobal' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ']Ly,7Jyt/N%@.6t-k%+BJwy50&$izr$VAm*_rk>{-iPa_3z$8&qt!R$D}9U}oz%_' );
define( 'SECURE_AUTH_KEY',  '4iv SGHXoEO9F,40d]W%r*FM{^qzm]0_HIaLb+Ca+oPxmOrzixkT7I?boB`^S~)u' );
define( 'LOGGED_IN_KEY',    'QRcd9<M_;b]I1F`kTTT2AI_%9-3V&`/OFUr6B&_NCJIA>~bnD^SwMVmbYtaS2wTW' );
define( 'NONCE_KEY',        'L@rdTQbY>gSn0U|F9_5`Ubi@,y^C1b+gR,P#0qgFxLj~.95]Vo%^g8?3+AQNl*|r' );
define( 'AUTH_SALT',        'J2dm#z66J-K}DCyO*hj@aB.w`X/R:$~9VQE!cLN7J|SLo%4tv^L!N_C^;HA;Pr=.' );
define( 'SECURE_AUTH_SALT', 'l{6d%lUNya*_c%c>M@dtR&-ytS-pkodEZ,-usVPmu|s:#dM6V],:2DaxmQ5}+F71' );
define( 'LOGGED_IN_SALT',   'Qu%?*qV!u[si%jdpcA%2MVA[A5D05GvSd?_``qcH/XFqSjKW211N^eO!/v!v8y^l' );
define( 'NONCE_SALT',       'c{J<B}R[uymqHBoZAWDHWb3|Z$,L-20cgp_y%#J,8W}eIwOENz$&`#n~I9Ee-Ni`' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
