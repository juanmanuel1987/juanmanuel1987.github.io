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
define( 'DB_NAME', 'luminarias' );

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
define( 'AUTH_KEY',         '*JbNR^C@e_HsV^8h(i[w57{U|f]m^V7P/6Uz;y7j=[1=z@W[C$eV|`v=s_`Qm){Y' );
define( 'SECURE_AUTH_KEY',  'DO_yctwh/pa0uJB<P7T}/|:o^p3;E<8OK().Xqftn(OhgzFQE6M*SGg0E.i7(CW^' );
define( 'LOGGED_IN_KEY',    'dya$~b+cC]i+NY?VR ]C;a1#e<_r<BlmYYvnw[l/$55*pQu5.LT&Zy5PAhfL/z@v' );
define( 'NONCE_KEY',        '@*7gn]up5f{3=1;2PK&%29Un<i-hYx4(Na.WQ$ukm6).tj@>AR=--POOVkJ9AFiK' );
define( 'AUTH_SALT',        '`Bz.^m8}Gory*95xKq@m>E)0j~}:oIn[~A1i@=/zSi_(fCsq*7B.8,o}:MN1>8kL' );
define( 'SECURE_AUTH_SALT', 'aO^Mr9  zHb>,DZlDu_j5HK13%/JQE0,/!g{wrgR5JKB;b#m|gYd9e=k/-e!mZl,' );
define( 'LOGGED_IN_SALT',   '>M$t#!0+VqjgE8{^HDm|1kI&SA)gkI(gZ^Z(.&nHSkV7w+!c-4v`E*<{&eGB!Xl}' );
define( 'NONCE_SALT',       '_qx{pPMXP!5AH/7!:VLy6@,wep=Hp#cS&#Z%`eroO#DH]Z[!a%UQWB&01IQd8p#C' );

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
