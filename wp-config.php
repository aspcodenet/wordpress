<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'hejsan123' );

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
define( 'AUTH_KEY',         ';dh`uf/(>1(KlK|tCRUjA[-s9?6R%wHty4|j))}k<$Ux4/.B_M$RpF/~,W2@4}v;' );
define( 'SECURE_AUTH_KEY',  'wT.F0f_`^|S&5qFjwoCZX6nhw-FwM]VIGf;8?sB;1j~m*]8ou|JM|sZ1Cms%rs0R' );
define( 'LOGGED_IN_KEY',    '0^0+;}?+adD+7J8Pg[<G07d5PuB;(ZKKvs-12p./mdDx1H1hZGFxOt4FhH/@5_cg' );
define( 'NONCE_KEY',        '!}+&C$Qf$O^}xh1vU-VWx%m 3|Iw,ykDM_6C.2X(/=MX@-$*ub+gB+y>d2tUjZ+n' );
define( 'AUTH_SALT',        'S/$u=t7k(5HsL@Sm@nehY5#=kzE(sq;5E0=AN #/]w8j@^/g;4qgZZ_1hc8~)R )' );
define( 'SECURE_AUTH_SALT', 'Zf{C=IB-z83&xEZ;g?rZ?ui3H`_2p#d$Tk<SE7.1VI@qZ-m(0s<+`S,88`6@Z=[(' );
define( 'LOGGED_IN_SALT',   '3w,yuc&[|^P}bxuTk[6TpYa 6n4[KDi-Da-oJiz,!0rKg3sQ@0u{Dj(Xy}R,/tCl' );
define( 'NONCE_SALT',       '4quvo2u)Q,ci,J+_eUz;f+|5UtM_9G[x/M;5$GF*8=Niq+Q%Y_O?1xTGfDc@o;/[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
