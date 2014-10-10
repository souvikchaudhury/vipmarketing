<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vipmarketing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '}+KL^QA6sD9|:/u0ORT2J{th`o*{4KYU2_{]R-1=0OE) SpksIHfWFa^lLXX43;q');
define('SECURE_AUTH_KEY',  ' %_jTqmT$oMuw0?)KMhY&,K7V:FVL5`6X&{*Bi#._>njm.c=~m@/dn;ix&tnRtzT');
define('LOGGED_IN_KEY',    'iiqv]rW7[]ADrvmbrfTt{4+TGzO;Fgn~&@WN7JxgC}wf8r7SA[V8ORYIc?otFHna');
define('NONCE_KEY',        '2b =Tczw>(?[Io~d4c`VC)0kT6Eq}jt;6AL5v/*>S:k3q]xO6!kO-*P;Pj>,+Bz)');
define('AUTH_SALT',        '@T&S(o~c!y+c<#ClFM<FLQH~p/2&!7EfELe%$p;;*Nuh/;4c&mYKzPi*A`!B@KNX');
define('SECURE_AUTH_SALT', 'Lul?o<}x@E6xnhKw_*v)krdV{9ZIwnH2X$U0*tj_}%A~$n)D(=gvd{`h};o{WZFA');
define('LOGGED_IN_SALT',   'H[Ec#>Yzc=5$O?NaT<^8 V~IRz;cf,E(v^j*SCzKoD$|0Q0X]l5k0*mr0gb:$G=-');
define('NONCE_SALT',       'A_QeJSE/j-C9TSu5XwP`LL`rGliw@j2!8S=,=y9_zsC=KF=gcls@&#tt_XgI$IN2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
