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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'H3mFGn6/_F)~bL4M)m(E`K2yHRiVSE/]wNwdp<=#X&kGV/+(Wfk7VOTTz1(eN!B6' );
define( 'SECURE_AUTH_KEY',   'Z{/)3]t`&0@}8z^yREL+R_.K8H+6jb@(^pk`w|eE9ZRD1/`dE 8O!J|<g78FM,]W' );
define( 'LOGGED_IN_KEY',     '3[Hz}+YcIJ^2P:2VAOd/#z2b6chig(iIl<2+fP^u+6/B(:qZf*O0.S{+&}6Mh{gS' );
define( 'NONCE_KEY',         ';@D(<84GH;5[?`Ae)2uKa,- H],!,d`jd_amo4;o$kMC8#|C.GiJ4v{p]n@YIxuY' );
define( 'AUTH_SALT',         'A.VJ${|MdWGYX+KPTU3u$haAbC[(L(G*ZU]f` 7W818*`n#.s&l!0s15o#m7;ssz' );
define( 'SECURE_AUTH_SALT',  '(U_&Xj![1V(H?b_FJ;_.8D|//-M]~xGs9qPQGfJSf0](nU+jxM>End/MEa+Om1w!' );
define( 'LOGGED_IN_SALT',    '$TP~9|~dgxNER3$mkE;?I<0|.KUo1JEwY;q@+F3=,x[#f2ni*tiVCFyFV<1w6AO-' );
define( 'NONCE_SALT',        'lhPDR{~!M*(u|3.AoZ,-Jq+UVqOuSyOuHAQrA`$Z&>;2GE.*DuaC-wNPgf3[<4x9' );
define( 'WP_CACHE_KEY_SALT', 'owuw_oZDP7~;fu!Wze7#N>4JD$/5-PRJ~VrA :1*#Rpr6Ho.[!nR-F>Wcm5T6wfJ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
