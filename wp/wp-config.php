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
define( 'DB_NAME', 'panglima_wp271' );

/** Database username */
define( 'DB_USER', 'panglima_wp271' );

/** Database password */
define( 'DB_PASSWORD', '5p]6Sc-7jl' );

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
define( 'AUTH_KEY',         'zbz7uxzvqjyj7jmr54d1awsnsewljgfyiaefkygxavtlw6rndi6ixjzvrydqsadt' );
define( 'SECURE_AUTH_KEY',  '3ttppukugbfbjgptmozvm03tvzn1sqpmihks2eqybh1ldzvndwagjtnuvtublbo5' );
define( 'LOGGED_IN_KEY',    'jvkw7rxhztonqpsos5mjrpetzjivqznefj8q6bsu7e7wt0qavggi9owuk5wfdc3m' );
define( 'NONCE_KEY',        'idnetkszzzofspsh1uyiqdymykeyjujtuh9o2by8aygi6xxprl2ox0xpkspwa5e1' );
define( 'AUTH_SALT',        'joj7ya5qqvdxasxv41ipkymuzukp9j3zqga6fpxqiw8wdvyhsofsbwhqx7jg4hkt' );
define( 'SECURE_AUTH_SALT', 'h3bydj3dfrbp2muggaq0f4sdi816paif7tdgqfb6tbyvafdlbswpfylebbbihl1o' );
define( 'LOGGED_IN_SALT',   'jxtmhhni8ejaeig5claa6z8nfpnxdfk4pw2zv3uwkkt8qf1nmsismrzn8hl8zv8z' );
define( 'NONCE_SALT',       '6jblg6xyf05r6znexvgk78ztto0wservbtx2o8rvuo5resoa4h3i3keppcxuxjib' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp82_';

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
