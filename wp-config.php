<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'h2568DjjBB1gij' );

/** MySQL database username */
define( 'DB_USER', 'h2568DjjBB1gij' );

/** MySQL database password */
define( 'DB_PASSWORD', 'PGYXT3Ew7S9rYB' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '~#iz&wuhTarY0[^t,P{~Rn/bR)TVL(YY*U5YpkHH_R,=:LI45!.Vo4zz&biQ:giE' );
define( 'SECURE_AUTH_KEY',   '.EjS)_<68JOxq[)3/F_v]W9cb,C-4>6o)t! Ot|!TA/;:fS3U74FlBC( x3ofN->' );
define( 'LOGGED_IN_KEY',     '1R>4`QZc`Ll.IP^{oC5Xd9tKl!~+Xn+ZVJf: FgW=r SbsAHoGNahrxu=[nrrv5R' );
define( 'NONCE_KEY',         'T6;!PGP>O~3>K|{YW74aP1}:ptC,3qk4=QHd^.Hub%sQlqw=cGVIt5e6wzng6*M-' );
define( 'AUTH_SALT',         'AKw;oY]_YaOUhsH_!yv:of@*Q6i2CA(;@o=Zy@i{3n-fn|3^8}Z%dccQZcB7h[X@' );
define( 'SECURE_AUTH_SALT',  'rV,h2<D_LU$[q=W$C`>E^?F#+6ap~+cy_Y[DpkN^ smd$<qEYeK+SooAD)<ro:FX' );
define( 'LOGGED_IN_SALT',    'mkx+58CfIXpBIsX/pPXo2g_d~`e1q$5U&6]^W|&E9{of9N3]/,wDP-L$e$[u!P5q' );
define( 'NONCE_SALT',        '$7U($jZ61YZB|2m?RQ_h#<*M~.44Fp0Nt&[xS R?O0.ky9j(5*(Sn KMa}Es~H99' );
define( 'WP_CACHE_KEY_SALT', '8Vrj``:PvQGcooopZM7T/~_d/Du~QWG&T=u:W] )vK<a*9P4M<+t. P+N%6L]^xR' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
