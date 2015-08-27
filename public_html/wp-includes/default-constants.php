<?php
/**
 * Defines constants and global variables that can be overridden, generally in wp-config.php.
 *
 * @package WordPress
 */

/**
 * Defines initial WordPress constants
 *
 * @see wp_debug_mode()
 *
 * @since 3.0.0
 */
function wp_initial_constants() {
	global $blog_id;

	// set memory limits
	if ( !defined('WP_MEMORY_LIMIT') ) {
		if( is_multisite() ) {
			define('WP_MEMORY_LIMIT', '64M');
		} else {
			define('WP_MEMORY_LIMIT', '40M');
		}
	}

	if ( ! defined( 'WP_MAX_MEMORY_LIMIT' ) ) {
		define( 'WP_MAX_MEMORY_LIMIT', '256M' );
	}

	/**
	 * The $blog_id global, which you can change in the config allows you to create a simple
	 * multiple blog installation using just one WordPress and changing $blog_id around.
	 *
	 * @global int $blog_id
	 * @since 2.0.0
	 */
	if ( ! isset($blog_id) )
		$blog_id = 1;

	// set memory limits.
	if ( function_exists( 'memory_get_usage' ) ) {
		$current_limit = @ini_get( 'memory_limit' );
		$current_limit_int = intval( $current_limit );
		if ( false !== strpos( $current_limit, 'G' ) )
			$current_limit_int *= 1024;
		$wp_limit_int = intval( WP_MEMORY_LIMIT );
		if ( false !== strpos( WP_MEMORY_LIMIT, 'G' ) )
			$wp_limit_int *= 1024;

		if ( -1 != $current_limit && ( -1 == WP_MEMORY_LIMIT || $current_limit_int < $wp_limit_int ) )
			@ini_set( 'memory_limit', WP_MEMORY_LIMIT );
	}

	if ( !defined('WP_CONTENT_DIR') )
		define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' ); // no trailing slash, full paths only - WP_CONTENT_URL is defined further down

	// Add define('WP_DEBUG', true); to wp-config.php to enable display of notices during development.
	if ( !defined('WP_DEBUG') )
		define( 'WP_DEBUG', false );

	// Add define('WP_DEBUG_DISPLAY', null); to wp-config.php use the globally configured setting for
	// display_errors and not force errors to be displayed. Use false to force display_errors off.
	if ( !defined('WP_DEBUG_DISPLAY') )
		define( 'WP_DEBUG_DISPLAY', true );

	// Add define('WP_DEBUG_LOG', true); to enable error logging to wp-content/debug.log.
	if ( !defined('WP_DEBUG_LOG') )
		define('WP_DEBUG_LOG', false);

	if ( !defined('WP_CACHE') )
		define('WP_CACHE', false);

	/**
	 * Private
	 */
	if ( !defined('MEDIA_TRASH') )
		define('MEDIA_TRASH', false);

	if ( !defined('SHORTINIT') )
		define('SHORTINIT', false);

	// Constants for expressing human-readable intervals
	// in their respective number of seconds.
	define( 'MINUTE_IN_SECONDS', 60 );
	define( 'HOUR_IN_SECONDS',   60 * MINUTE_IN_SECONDS );
	define( 'DAY_IN_SECONDS',    24 * HOUR_IN_SECONDS   );
	define( 'WEEK_IN_SECONDS',    7 * DAY_IN_SECONDS    );
	define( 'YEAR_IN_SECONDS',  365 * DAY_IN_SECONDS    );
	define('J_CATE_NEWS', 4);
	define('J_CATE_WHAT_JLIT', 5);
	define('J_CATE_POLICY_EXAM', 6);
	define('J_CATE_SCOPE_EXAM', 7);
	define('J_CATE_AWARD', 8);
	define('J_CATE_QUESTION', 9);
	define('J_CATE_MAIN_NEWS', 10);
	define('J_CATE_SUB_NEWS', 11);
	define('J_CATE_EXAM', 12);	
	define('J_CATE_VOICE', 13);	
	define('J_PAGE_REGISTER', 83);	
	define('LOWER1YEAR', 0);
	define('FROM1TO3YEARS', 1);
	define('FROM3TO5YEARS', 3);
	define('LARGER5YEARS', 5);
	define('N1', 1);
	define('N2', 2);
	define('N3', 3);
	define('EVOLABLEREF', 1);
	define('FACEBOOKREF', 2);
	define('CARRERBUILDERREF', 3);
	define('VIETNAMWORKREF', 4);
	define('ITVIETREF', 5);
	define('FRIENDREF', 6);
	define('HCMLOCATION', 1);
	define('HANOILOCATION', 2);
	define('LOCATION_TPHCM', 'tphcm');
	define('LOCATION_HANOI', 'hanoi');
	define('LAN_DEFAULT', 'vietnamese');
	define('JP', 'japanese');
	define('VN', 'vietnamese');
	define('EVA_SITE', 'http://www.evolable.asia');
	define('VNW_SITE', 'http://www.vietnamworks.com');	
	define('ARTICLE_REGISTRATION', 3);
	define('SITE_MAP', 13);
	define('PRIVACY_POLICY', 12);
	define('TEST_LEVEL_I1', 1);
	define('TEST_LEVEL_I2', 2);
	define('TEST_LEVEL_I3', 3);	
	define('PREFERRED_FIRST_TIME', '08:30:00');	
	define('PREFERRED_SECOND_TIME', '10:30:00');
	define('PREFERRED_THIRD_TIME', '14:30:00');
	define('PREFERRED_FIRST_DATE', '2015-06-20');
	define('PREFERRED_SECOND_DATE', '2015-06-20');

	define('PREFERRED_FIRST_TIME_HN', '08:30:00');	
	define('PREFERRED_SECOND_TIME_HN', '10:30:00');
	define('PREFERRED_THIRD_TIME_HN', '14:30:00');
	define('PREFERRED_FIRST_DATE_HN', '2015-04-20');
	define('PREFERRED_SECOND_DATE_HN', '2014-04-21');
	define('IS_LOCKED_REGISTER', 1);
}

/**
 * Defines plugin directory WordPress constants
 *
 * Defines must-use plugin directory constants, which may be overridden in the sunrise.php drop-in
 *
 * @since 3.0.0
 */
function wp_plugin_directory_constants() {
	if ( !defined('WP_CONTENT_URL') )
		define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content'); // full url - WP_CONTENT_DIR is defined further up

	/**
	 * Allows for the plugins directory to be moved from the default location.
	 *
	 * @since 2.6.0
	 */
	if ( !defined('WP_PLUGIN_DIR') )
		define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' ); // full path, no trailing slash

	/**
	 * Allows for the plugins directory to be moved from the default location.
	 *
	 * @since 2.6.0
	 */
	if ( !defined('WP_PLUGIN_URL') )
		define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' ); // full url, no trailing slash

	/**
	 * Allows for the plugins directory to be moved from the default location.
	 *
	 * @since 2.1.0
	 * @deprecated
	 */
	if ( !defined('PLUGINDIR') )
		define( 'PLUGINDIR', 'wp-content/plugins' ); // Relative to ABSPATH. For back compat.

	/**
	 * Allows for the mu-plugins directory to be moved from the default location.
	 *
	 * @since 2.8.0
	 */
	if ( !defined('WPMU_PLUGIN_DIR') )
		define( 'WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins' ); // full path, no trailing slash

	/**
	 * Allows for the mu-plugins directory to be moved from the default location.
	 *
	 * @since 2.8.0
	 */
	if ( !defined('WPMU_PLUGIN_URL') )
		define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL . '/mu-plugins' ); // full url, no trailing slash

	/**
	 * Allows for the mu-plugins directory to be moved from the default location.
	 *
	 * @since 2.8.0
	 * @deprecated
	 */
	if ( !defined( 'MUPLUGINDIR' ) )
		define( 'MUPLUGINDIR', 'wp-content/mu-plugins' ); // Relative to ABSPATH. For back compat.
}

/**
 * Defines cookie related WordPress constants
 *
 * Defines constants after multisite is loaded. Cookie-related constants may be overridden in ms_network_cookies().
 * @since 3.0.0
 */
function wp_cookie_constants() {
	/**
	 * Used to guarantee unique hash cookies
	 *
	 * @since 1.5.0
	 */
	if ( !defined( 'COOKIEHASH' ) ) {
		$siteurl = get_site_option( 'siteurl' );
		if ( $siteurl )
			define( 'COOKIEHASH', md5( $siteurl ) );
		else
			define( 'COOKIEHASH', '' );
	}

	/**
	 * @since 2.0.0
	 */
	if ( !defined('USER_COOKIE') )
		define('USER_COOKIE', 'wordpressuser_' . COOKIEHASH);

	/**
	 * @since 2.0.0
	 */
	if ( !defined('PASS_COOKIE') )
		define('PASS_COOKIE', 'wordpresspass_' . COOKIEHASH);

	/**
	 * @since 2.5.0
	 */
	if ( !defined('AUTH_COOKIE') )
		define('AUTH_COOKIE', 'wordpress_' . COOKIEHASH);

	/**
	 * @since 2.6.0
	 */
	if ( !defined('SECURE_AUTH_COOKIE') )
		define('SECURE_AUTH_COOKIE', 'wordpress_sec_' . COOKIEHASH);

	/**
	 * @since 2.6.0
	 */
	if ( !defined('LOGGED_IN_COOKIE') )
		define('LOGGED_IN_COOKIE', 'wordpress_logged_in_' . COOKIEHASH);

	/**
	 * @since 2.3.0
	 */
	if ( !defined('TEST_COOKIE') )
		define('TEST_COOKIE', 'wordpress_test_cookie');

	/**
	 * @since 1.2.0
	 */
	if ( !defined('COOKIEPATH') )
		define('COOKIEPATH', preg_replace('|https?://[^/]+|i', '', get_option('home') . '/' ) );

	/**
	 * @since 1.5.0
	 */
	if ( !defined('SITECOOKIEPATH') )
		define('SITECOOKIEPATH', preg_replace('|https?://[^/]+|i', '', get_option('siteurl') . '/' ) );

	/**
	 * @since 2.6.0
	 */
	if ( !defined('ADMIN_COOKIE_PATH') )
		define( 'ADMIN_COOKIE_PATH', SITECOOKIEPATH . 'wp-admin' );

	/**
	 * @since 2.6.0
	 */
	if ( !defined('PLUGINS_COOKIE_PATH') )
		define( 'PLUGINS_COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', WP_PLUGIN_URL)  );

	/**
	 * @since 2.0.0
	 */
	if ( !defined('COOKIE_DOMAIN') )
		define('COOKIE_DOMAIN', false);
}

/**
 * Defines cookie related WordPress constants
 *
 * @since 3.0.0
 */
function wp_ssl_constants() {
	/**
	 * @since 2.6.0
	 */
	if ( !defined( 'FORCE_SSL_ADMIN' ) ) {
		if ( 'https' === parse_url( get_option( 'siteurl' ), PHP_URL_SCHEME ) ) {
			define( 'FORCE_SSL_ADMIN', true );
		} else {
			define( 'FORCE_SSL_ADMIN', false );
		}
	}
	force_ssl_admin( FORCE_SSL_ADMIN );

	/**
	 * @since 2.6.0
	 * @deprecated 4.0.0
	 */
	if ( defined( 'FORCE_SSL_LOGIN' ) && FORCE_SSL_LOGIN ) {
		force_ssl_admin( true );
	}
}

/**
 * Defines functionality related WordPress constants
 *
 * @since 3.0.0
 */
function wp_functionality_constants() {
	/**
	 * @since 2.5.0
	 */
	if ( !defined( 'AUTOSAVE_INTERVAL' ) )
		define( 'AUTOSAVE_INTERVAL', 60 );

	/**
	 * @since 2.9.0
	 */
	if ( !defined( 'EMPTY_TRASH_DAYS' ) )
		define( 'EMPTY_TRASH_DAYS', 30 );

	if ( !defined('WP_POST_REVISIONS') )
		define('WP_POST_REVISIONS', true);

	/**
	 * @since 3.3.0
	 */
	if ( !defined( 'WP_CRON_LOCK_TIMEOUT' ) )
		define('WP_CRON_LOCK_TIMEOUT', 60);  // In seconds
}

/**
 * Defines templating related WordPress constants
 *
 * @since 3.0.0
 */
function wp_templating_constants() {
	/**
	 * Filesystem path to the current active template directory
	 * @since 1.5.0
	 */
	define('TEMPLATEPATH', get_template_directory());

	/**
	 * Filesystem path to the current active template stylesheet directory
	 * @since 2.1.0
	 */
	define('STYLESHEETPATH', get_stylesheet_directory());

	/**
	 * Slug of the default theme for this install.
	 * Used as the default theme when installing new sites.
	 * Will be used as the fallback if the current theme doesn't exist.
	 * @since 3.0.0
	 */
	if ( !defined('WP_DEFAULT_THEME') )
		define( 'WP_DEFAULT_THEME', 'twentyfifteen' );

}
