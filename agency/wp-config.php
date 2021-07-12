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
define( 'DB_NAME', 'agency' );

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
define( 'AUTH_KEY',         'Csv35qspjtm#^SQ/D)R2uD`lv}(jt2G>u$/KRsLT/^zo2#ehvc<FC=re+^1%OC~R' );
define( 'SECURE_AUTH_KEY',  'Ev;5&S5%+-36)t2B+IHXx>g7nK<{1o^d[4;Ua{-4gxMQbo7>qLo4AQ.8#Hg7*A}0' );
define( 'LOGGED_IN_KEY',    '<^rwlK/{gjfx|.?%pAfbDi!Q;N#6:Al5OcO-Vtr c0-G6%;pT|=m6wW+wX`4p+%j' );
define( 'NONCE_KEY',        's2LJ<AqiJxEb4SX{InDE%2XYqWVQbUsN/2@,axL17Ms$fIq[GG0TxW] oo-QYNqa' );
define( 'AUTH_SALT',        '~DR|5-|@x5r)&rZVm#Y>XAh4Nup/X|o0]%P4]inMw*>1%~c>7$JO;,0]*Nu5mg1h' );
define( 'SECURE_AUTH_SALT', '>C{i>>bI:fHF|F[9.dcHrMTZx0Tj0Bh]uc(bZI|^V_+ZpCS+pMNXaED(f_i>4#&w' );
define( 'LOGGED_IN_SALT',   'cd}<V?7{NTZXmO/>!A.GV~mNm7Lwk+`8skNtF(C~w>deH|*STVb17}Iq Pp@>ta)' );
define( 'NONCE_SALT',       'P,.ycSJc?e`2^ET&wht}qv)Fn>$$*$jpEQMld*u-NNr4jUq(oYvYEp3mh20c$osR' );

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
