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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dev_semistories' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'JXVrme O.#=:A4.VZ5jQ0pTOBd.UFi}42n6G|>hz/}9$Rs0ha?4rGd_FmWSh:>=!' );
define( 'SECURE_AUTH_KEY',  't#cuR6t!N8vBOZmwv {]e]R#UD$j(H$<6(Ed( <+Os)9`9eaoU 4=XJLE&p!{?E6' );
define( 'LOGGED_IN_KEY',    '?sin~MsnaT?gD&Uc%ObjUvas^k7X[xi?bF<o&9EXebqhbJ| gks^*>.G>/Tat+c}' );
define( 'NONCE_KEY',        '^MbZekb8h}Rp>cdAeg8[=XRUn7H[i1Ks.WTHiTENNaM)spg;iC;{Ly+ olNJCo:{' );
define( 'AUTH_SALT',        '/@r%4Z.Qn=!4%w8}lMxmjTY:|I-maGb[$PrD&EOYCS8/}sR=a,CX^%{.!lP,Z%73' );
define( 'SECURE_AUTH_SALT', 'OPj5{bb.B7:HGdG%V/,Q}fonrevw&GoF!pbb?RT(p8Qir9>Sua)zcJm]vl`;4:PR' );
define( 'LOGGED_IN_SALT',   'sR2=JF)fq1({;O~:;IhYB60oyIaw<LNq/5O58@)Z34|H3tQFC[_22_0R_mp*HMV4' );
define( 'NONCE_SALT',       'x-a]y:+p^ov;wp%,eK.s`+}QL&&C8,y&5~.q^]xu(eUOz2LBd0,w*Dkl=v@C}#iR' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ss_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
