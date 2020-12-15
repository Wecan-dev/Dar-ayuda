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
define( 'DB_NAME', 'darayuda' );

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
define( 'AUTH_KEY',         '/zi*8(e.@*^Bg=+a_H}rBASwKz=O2mL0Gp7CX2-7iOs##W4d!8> THJ-Pv%kwMBG' );
define( 'SECURE_AUTH_KEY',  '>P$uA.rGHP$&4DoZN[z]fMfxMzsaYcCVW]uj>=s7&%POhxxtRd:qHH3uHd)Xy,5>' );
define( 'LOGGED_IN_KEY',    'k[p.@:3b/kmm+|&&5CT9Zz[t6rH8!vuvJR8iep]H_e.3KO2(?3oy{2Rgn?Z2gUpm' );
define( 'NONCE_KEY',        '+]cntFLO(N3XVxg,T*@ Hrk#;x_K=l{n;j+:[!:7<j5kA2$TI!lgatLSO,i]XU6X' );
define( 'AUTH_SALT',        'Ipr)<Uex,US2}>XST^$i^-i:D3R$XO_qrfCcwB@hy7SN>pJ#(<5w;ciD=|IZrf_i' );
define( 'SECURE_AUTH_SALT', 'XHf*kC0f@%Wg3I^+y-rfN.+2obO,HF,uX.f+sA<*w0p~7+MaKb%{.65rzHS!k]Le' );
define( 'LOGGED_IN_SALT',   ' [ugF@]F!Sw*2Hc2B!$LC-zD=>z*&F{*F);H2Irv``ng1eBQS-Sr7dtOYi_57QK!' );
define( 'NONCE_SALT',       '(!SD@E*QoXdQW95ItBNbA1 ebk^hjGPhcl2xZwr<7__2(H::66v;F=Z7-dRgzKB ' );

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
define('FS_METHOD', 'direct');
