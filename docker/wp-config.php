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
define('DB_NAME', 'gdpr');

/** MySQL database username */
define('DB_USER', 'gdpr');

/** MySQL database password */
define('DB_PASSWORD', 'gdpr');

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
define('AUTH_KEY',         'OoI[%YSsP^>H*|{P*qv`[6qO|UQUZ][hAM=.5V)UL6~-?}eKJ?G PwkscP2??}g_');
define('SECURE_AUTH_KEY',  'j|GgMhx<-K#TeW(Spt2tAX2<F+(hWW|f)WXqSfwd@3-d(Yc+:T;Ya-uJa-Vp+iXs');
define('LOGGED_IN_KEY',    'Cq,n-^Ed/c<e{[5,$ZB@l) bE9#M<?xi% 2>YX-o[TvAS6(l%:Dft9`~=@5/Q,E|');
define('NONCE_KEY',        '5QE?+|^C#e $y0 F^4tKc--p$8vQ:CPcRoZO_W_L:/_YoK0Yoyy5l^+X~k7}B4={');
define('AUTH_SALT',        'qLdG}0+pChv~VR4p%Fu|IMO(}@]r%++ucUC}wy )5+ns:jZ;%^Gr/*nI(Ob>L[*e');
define('SECURE_AUTH_SALT', 'J_q1xEZ)%W>ECZvp m&!++s]+glmj8[dP_XXSML-e|I@&#mg4,fZ8q981~nu7Eh+');
define('LOGGED_IN_SALT',   ')SJ!/pAVP91m8IzWo$K&hC<lkj8`;khvU0Bh9Q-<{w0_xET|/^BBEI9!JJ,FpUQc');
define('NONCE_SALT',       '[GUi]SV2SV.:x@t6H-`~P?,^f?{J.K@|B I~krrxIsK:.YeWLtKn#nGmte_CQTJ|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
