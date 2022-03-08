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
define( 'DB_NAME', 'academic' );

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
define( 'AUTH_KEY',         'c{F;%HbhQ]CYW/jQSl)tawI7oo;fA8Y{Q?}PP%[ts+b/L#iMGMwA$GZnA3Dax@3:' );
define( 'SECURE_AUTH_KEY',  ',^@cS|k5ti(4ugt*Jd]p?9f.3QiEp_ s1jnoE/1Xob)s~QEmX!{bZDoo;k+PmxRx' );
define( 'LOGGED_IN_KEY',    'b/]yny58W3F)#Gy[Gu1JtVQwmz/ke(*ha^nVm/2q@7i +M8G:Y(9&H>3*,4w98TA' );
define( 'NONCE_KEY',        'F.,9y5`2c@Cv88eI:1Oys(nnIwB/?#EC+Yx.7h7zim!>gW(^Jw4/6RmnFzdNx!(&' );
define( 'AUTH_SALT',        'ct)e}G*[dh)YYr@*g;!J<U@@;{S|n(<?R7_soIt[B3(zn$>I+hM/y^[49-,G7~HN' );
define( 'SECURE_AUTH_SALT', '{<DX,Zfz6dS%P.#8Y+kI=|p=QH^6b5Bcg_LNHz:#!7ve3 }8rwb&CM]gxoA`J[S;' );
define( 'LOGGED_IN_SALT',   ':Up7Br:i_?I:ampT3M)S^+W|/m@CUr?v?sH8?ueHR4JZfA>fBDDOW9G9JD`&5:V-' );
define( 'NONCE_SALT',       '0t:8pc@!a[&[C%u0Uc<&v#+W{n{E>E}5s2AK&xGC_[DqY1<KoQBc1(x*C8yf!g?.' );

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
define( 'JETPACK_DEV_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
