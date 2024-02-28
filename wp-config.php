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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '|!)_|23rpYFsV|E`T:TXWCF2-nQLQ/1S)NdeNC?h;pIF]A-d@NWmoW0#^_m4bmr;' );
define( 'SECURE_AUTH_KEY',  '|$Qa4!-yZcA~{#eK=Ym;=~bmG=t_-0sv RwiS:-Ed?wiG5vhq$_eNWI::pxjI{}u' );
define( 'LOGGED_IN_KEY',    'LA7QuL@YXd;?3_?#,43li1_@2,_Z;{(:wlwz2mP4-H,os6a,o|8~@a~(R^vxY?yy' );
define( 'NONCE_KEY',        'Dt0..F8we`rUGKkv,3ZnsyAPgmg8z*8(DL8}I)U.zfNXV3d=@6GaeXr[<;C*Oms}' );
define( 'AUTH_SALT',        'Q&?~i&,$E?x1fhwy:Q;-?#,KwvpHNoDWl>]+f,x /S=[q|D**rb0]tjK8%xS~+F.' );
define( 'SECURE_AUTH_SALT', 'u#1;7Nd[JCeZD268tlZgw]|`%W@ Es=p4W%l]UC/um0!S(MKCD;D<3-BVA_|zm_r' );
define( 'LOGGED_IN_SALT',   'O|^@SC{4S&HqeBF_A9KLb5J^qpcD-q7eff7_MVU|s`,MKnICst=UnB}[,is~dz`s' );
define( 'NONCE_SALT',       '>l/X%MaX]QVSfSh^.kCjbd)D~Ils)4cQI~9p&_ap9S]V S3HZ70b4%S~-t<Gy`}`' );

/**#@-*/

/**
 * WordPress database table prefix.
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
