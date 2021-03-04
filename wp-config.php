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

define('FS_METHOD', 'direct')

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';r=ihjAK+G+BgboYmRE18x]s]~fiW:m-IzZgGNq`JpyDb)#*&EK`IvS8g{WJs_]`' );
define( 'SECURE_AUTH_KEY',  '0RIy8^m$a3uboLYgJ_5IMeus~W_SDV/yyuj%l7CG1d@NW?X)5 izILWx{PBN,*$4' );
define( 'LOGGED_IN_KEY',    'OTBd)im)e=Sd93,~^ziSBxw1$Q!u_fY8?S5q<Rs<?(lG,rsLJU}q+7;Gn h>Df)J' );
define( 'NONCE_KEY',        ' yxe%n!46)Lt+`a[(Z9Fq:V0>vQbY N{8(H5^>UR8%]ahgg^hZzBA|2)huI?4W20' );
define( 'AUTH_SALT',        '<)u.;a/!(u80~dA5*1%Bd.aRq#hyi_x1Ptc]sjVA.RP>v=s3 !SN<@jZU`r=fazq' );
define( 'SECURE_AUTH_SALT', 'YV(_qHP3,{6IJYI5IoBO Ji|.<n7s>4u^vkeR/mZko7MgfwC;_nftQ-CQ)@;M[lC' );
define( 'LOGGED_IN_SALT',   '=wmv.xjQ2oz?/K^CVdwSK1nO<1(Zy=zCzOe|>ni6}GpKFDk+[h,3Z5]uz*&lweIX' );
define( 'NONCE_SALT',       'FLal#$W]h5mT#Ea#`Eb`z8/-YyYRc>C:<6|aA5YBHuB;|=NML-NG@*:Tm00O]xQ*' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
