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
define('DB_NAME', 'babybio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R?BN#).G}8RVaz0]b60!aU0?g  =Y7M_Iw3%`g$i3T`:^1q*o%`dTnSFZPa_Kpt/');
define('SECURE_AUTH_KEY',  'js|x>F-Prlv)u>:6Q?Yw5gv+q|]+7X^U9lL>-TU=krxl,<v[0`-YE;^@KsK9y-aL');
define('LOGGED_IN_KEY',    ' K1EotapN</>h3wwn A/2+/ Du?v6ims_uh4^T`I[_&EMmW Gcb8O]QY+dbgs~^@');
define('NONCE_KEY',        'my+vn.Dmk-KN_U<T:`zd9!d(AA$;YrMK0b#~][ld4k2QJ<|?t6>a`vlVVJZ5sUUg');
define('AUTH_SALT',        '(5?,T>s*K&Z=?2dVlmKl#_&|>EF$F_)?7O>UM-dHDmJSbY7`=[XW43 #!l&s!097');
define('SECURE_AUTH_SALT', 'trjRgC,Td[YNE0ck(w&.H<D6|r])XTdk4je@1bMA8Q1<Ab71=WrPS[O}I]H(<mBp');
define('LOGGED_IN_SALT',   'Awl-5(;jWAfR(iOT^*q^;a?Hw74m~]-zfF,aLERR$Y^XO2L/hK#QJWb;PqJ2U@A<');
define('NONCE_SALT',       'gFR6H/khhJyMYSQTQZ9NmN&rT+gbo7u.|w<XIuW=:^cD0N/wLktQFKE<C9ivF4tk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bb_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
