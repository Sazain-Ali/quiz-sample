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
define( 'DB_NAME', 'quiz1' );

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
define( 'AUTH_KEY',         'H#11cH|a$cx?cSWO~0}y3VnMloFl=YY+9}W;PD<0ZNUuRkB%#4kE<a*DT@!j.vPt' );
define( 'SECURE_AUTH_KEY',  'Hjfx@cyABYh+^r90DTsrA;ItRCj-P^e-ibfw_+]]/a]q*g}pQ/U)_5Y_i=Bv{Nt`' );
define( 'LOGGED_IN_KEY',    '{Gmf<DK.w)z]Z`Hee52.w)_(o~xD=RzWcvY_q8y.;uI^26/gRHI0;}Co4Gjq&LMo' );
define( 'NONCE_KEY',        ',rQ|HMej(OsG6B/oS~T{Uf:;6g)eo~!E)#+ -5XujM:AB-T~GITvb,Ujt_8/MPPS' );
define( 'AUTH_SALT',        'Xg$hUS j_zzD~LVwZRQ6IP~lZ5>aN)pm|Oe!!6JY1(y@x4eYaeh>iTlmLRF)_EQf' );
define( 'SECURE_AUTH_SALT', ';SDsHa#lZ|Z3)C$;OYx=H__u^)#PZ?~Itiu#EnVZ/xI>f(o&:+VXb&<-w6gvgT_9' );
define( 'LOGGED_IN_SALT',   'qzNso^uhUl@u`I+DiKAX_=:9<w*C1J]I4&UK,RMD3i80~KxMSKbwCICT]HrBSBsT' );
define( 'NONCE_SALT',       'Z?L!K@y=yl}*#Se:Q~3?*8(VX:4wOF@wIxOln&CdUh3OfnzomMxMt<7t9^t,g{_9' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
