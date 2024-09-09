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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'panglima_wp580' );

/** Database username */
define( 'DB_USER', 'panglima_wp580' );

/** Database password */
define( 'DB_PASSWORD', 'hS9yO]9p)5' );

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
define( 'AUTH_KEY',         'ymk75pi5guvqfo1zsom1unoii8oiaygrro6k9tzdg9d09agzeeu3rwn4pxs5nqei' );
define( 'SECURE_AUTH_KEY',  'hu0dbyfhdocyjluza7q7dpfrlpervhy00kbsg7s7lmoib4q6fsamlyswiv9nfsuh' );
define( 'LOGGED_IN_KEY',    'blyae1deqz5lxgl7yrgmvyge8pmtcnevaaqn7ye052oz4bllmyvqglaty0hdboul' );
define( 'NONCE_KEY',        'bdjstw33cy4mm9nxmc74bnxfkq0d4dv4ubkeuknfob2d3xmi7cjzgfrggkvyywfa' );
define( 'AUTH_SALT',        'eg3ekyxvpdckbmjdbwaxgadfja9ivzgclmkup1e1zdaop9me8znt5fueououhcmz' );
define( 'SECURE_AUTH_SALT', 'rhpw5lzvtrocsk539tvo5m9b1dsv6n5ehszzqlysp3lvvlcd6snbx7ak4utlvjn2' );
define( 'LOGGED_IN_SALT',   '5xrcmoq8nhrzgjxigqexbpzmeoddv6gt6zcafvrubtrij2c9ihksbtjyu2yk81qx' );
define( 'NONCE_SALT',       'gk1fmr0wisaclvfngl979h8vuwecmzuypnqnwtc6wzq5hrsbegbu7ch4mphysdzv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpnf_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
