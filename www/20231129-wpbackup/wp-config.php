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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kalemoto_wp425' );

/** Database username */
define( 'DB_USER', 'kalemoto_wp425' );

/** Database password */
define( 'DB_PASSWORD', 'S5!BXp-5z0' );

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
define( 'AUTH_KEY',         'uzary4wcwfhxgsd0w2mrwxyt2pyvha9ffdlcjbqxr4azhnxu3zpdwuliiqkuplac' );
define( 'SECURE_AUTH_KEY',  'luzkvo5c3ga7iqzqm7q3hig92smfsy9fw9pnmfso9bn3wlrudbonadtsbo2axsur' );
define( 'LOGGED_IN_KEY',    'b2mucj8us4unjelmmc0bkqyhd95xdviukjdu1oiniyz3z8bydepbbwyyniz0h257' );
define( 'NONCE_KEY',        's503kwhrdjwxtphg1398rowguvprdmzwmbvmccyirhmryfdzfddv8chw5tqxhegy' );
define( 'AUTH_SALT',        'oz5e1bm0697na9km9pymh0dophvc7o28xt7fqd32vqgncsffyux687foenw3cnku' );
define( 'SECURE_AUTH_SALT', 'l8jxsfqst80bm2hwxgvb1pkyrfcgiu7ak7ycwyqjzk273ixuttt690vagwa5fqzd' );
define( 'LOGGED_IN_SALT',   'p2glusn4siprknxwniz84nhsixwksqbhfa8dnvdwyksf2zcyguqugyfy7gohvcxf' );
define( 'NONCE_SALT',       'qssrlhpsceyoyjvnibouf4dv6jtl3j7zsz6j4vpogz5chpxsx2h4yy3hdn1nvi1u' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp55_';

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
