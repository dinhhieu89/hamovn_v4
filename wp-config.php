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
define('DB_NAME', 'hamovn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'adminhamovn@2017');

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
define('AUTH_KEY',         '8KwPI4S)nv.~4ER+Z(BUR{OMSXwP?,3ajzCtF`O,INUa<#L, ZICl^q~*9x|g6*X');
define('SECURE_AUTH_KEY',  'KYZGPOd>r?F5%ez.xd}?g+z>I}y~OMLJqwp?@(l#c(WSC{(Z,WWb9-Y7+,v{d]O5');
define('LOGGED_IN_KEY',    '+G6uomW0ef@5yLol*weCq1dBTV,wEQ)xJxyM.[#{EFr=e]2Z-hU-_wE(=/P}_uc{');
define('NONCE_KEY',        'lz1QTeBP8Z):%`!;H|DJ{*gC=N@MePJ{AI-{b[_m/vYbRdjrF(xGTS.pnE2MWa}]');
define('AUTH_SALT',        'K#x08`a:Q#np7vGc]Y!l1c}1<sj!2:~X+Ycw2AY(YF3vVgQb$aLRVzC7 #W!=n1P');
define('SECURE_AUTH_SALT', 'S@C6^:Fif+bD9lcJ1~$](|I+ec{d:uzb|r7`2`G;g%hSKS4Kf-u(&D%C!(`d,V(W');
define('LOGGED_IN_SALT',   'U*^%aG}&^i*)0`:C0]q$~$qnB~A2ZT|Rp^<@qHa]#gsHF dV^J}9+@>fQmFl Bvq');
define('NONCE_SALT',       'GRX?b`|0fK/{8/:i18y`I19QO7K>eN1US~9dBihIB~PVZ#XdoRY!pMUnWGikqyw1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'p5qaqv9oi_';

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
//define('WP_DEBUG', true);
//define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'FS_METHOD', 'direct' );
//Disable File Edits
define('DISALLOW_FILE_EDIT', true);
