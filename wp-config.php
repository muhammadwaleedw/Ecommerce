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
define( 'DB_NAME', 'Floxia-ecomm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'l?1lsb*A4Bsw^cz$v!-MK`86ST_/@g73qVpUe>M_{mRpddw)LmdXG59P6]A}6Kq=' );
define( 'SECURE_AUTH_KEY',  'y>mVL>bhKi,x67?}J4LmpY1b`{/Tbb=otn%._sY6}MHGOuJ!| )h0V[i[RSk3R:<' );
define( 'LOGGED_IN_KEY',    '@0tMJR2~{AbhLPs]_][MsJ%Z=@>XrSzcfD0L`s/1PQf3Z*^t,QORax<zgl%hF0l@' );
define( 'NONCE_KEY',        'rS#>&^S|U0SuPfL?WtI_SU=xoied}0TKO(VM,P9!SsPZqs}6>U!Kw28Mwcy;<^e1' );
define( 'AUTH_SALT',        'dW6:w@cs}Zo1xn2Ih/%3_k+?b`l2e?C/g@BMP-:.<H9C*Wf._%Fd{hI1k$/XhHtX' );
define( 'SECURE_AUTH_SALT', 'nXV}LY*Foh*yl$5QNI/#OwRc}+@YmIYvUF6(=QMp^gFMe1Ef&7LSld4np/3Jjug@' );
define( 'LOGGED_IN_SALT',   '],c%ms#wx1Da#5{l0OSN-G,SKa4>B/>HN`}%l!VAmEZ 5[]n&L7dTV,bcz+>gx><' );
define( 'NONCE_SALT',       'TK*{PHC)~<nvk{`xV6] FeJitlEL.|tigAv&NQ@_[JmITx-C2Qv9n13~{fK+l?;6' );

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
