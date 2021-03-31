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
define( 'DB_NAME', 'db_darayuda' );

/** MySQL database username */
define( 'DB_USER', 'adminwecan' );

/** MySQL database password */
define( 'DB_PASSWORD', '_*8gTYWqM9FHU' );

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
define( 'AUTH_KEY',         'X&7qwfbU4c[a%I[YF&i5B#uqriAZq=I~wmIitPJkOT{tiN,S/=xbp*S1duy4~^5 ' );
define( 'SECURE_AUTH_KEY',  '-+kN<S$D5C!.J?#]*$Ne&L>yd{S>rjS6XsS-OtICmY2lZ!n4H7=$UUq,@k|>3zQU' );
define( 'LOGGED_IN_KEY',    'U,<A@Ww)hR^|SthWLn((P/p:7X~MLKKT~ZI`WQ`6fWvQ=e2OvH{9b{G:yVuNM[=(' );
define( 'NONCE_KEY',        'rh^!9/,oQv~))Hle N1F+pK=h`+A[>|,E@hUC>k*V3]Go42WCNWUv-/WF`Ge#8B%' );
define( 'AUTH_SALT',        'RiV2]/{A:*gb!_cUw6&ojWjiQ^Ka$KGDD/.$aVOH8N[G@<rk-YO6(9|9QwRzD@ih' );
define( 'SECURE_AUTH_SALT', 'K!UPh:s[GSzEF**W$OMDo!086|E{`[rKz{F?O$ 8 6=5wmMY$/+L2[.wUHxEnn,b' );
define( 'LOGGED_IN_SALT',   'k/]?5BD^+#fxM_l}%XHA/%QLg@#Wnr~l~+e+*+ny?9:]P+K_oeD)oPTucn0O3zm;' );
define( 'NONCE_SALT',       ':`r-*AS|Ess~HR>JF@mXh*4h|xPi3}1S29C_9#,9ZIeu] |H7P&x`rb~bST,p)gY' );

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
