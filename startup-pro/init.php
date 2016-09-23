<?php
#-----------------------------------------------------------------#
# Default theme constants
#-----------------------------------------------------------------#
defined( 'STARTUP_PRO_THEME_DIR' ) or define( 'STARTUP_PRO_THEME_DIR', get_template_directory() );
defined( 'STARTUP_PRO_THEME_URI' ) or define( 'STARTUP_PRO_THEME_URI', get_template_directory_uri() );
defined( 'STARTUP_PRO_DIR' ) or define( 'STARTUP_PRO_DIR', STARTUP_PRO_THEME_DIR . '/startup-pro' );
defined( 'STARTUP_PRO_URI' ) or define( 'STARTUP_PRO_URI', STARTUP_PRO_THEME_URI . '/startup-pro' );
defined( 'STARTUP_PRO_ASSETS' ) or define( 'STARTUP_PRO_ASSETS', STARTUP_PRO_THEME_URI . '/startup-pro/assets' );
defined( 'STARTUP_PRO_INCLUDE_DIR' ) or define( 'STARTUP_PRO_INCLUDE_DIR', STARTUP_PRO_THEME_DIR . '/startup-pro/includes' );
defined( 'STARTUP_PRO_INCLUDE_URI' ) or define( 'STARTUP_PRO_INCLUDE_URI', STARTUP_PRO_THEME_URI . '/startup-pro/includes' );
defined( 'STARTUP_PRO_PLUGIN_DIR' ) or define( 'STARTUP_PRO_PLUGIN_DIR', STARTUP_PRO_THEME_DIR . '/startup-pro/plugins' );
defined( 'STARTUP_PRO_PLUGIN_URI' ) or define( 'STARTUP_PRO_PLUGIN_URI', STARTUP_PRO_THEME_URI . '/startup-pro/plugins' );
defined( 'STARTUP_PRO_HEADERS_DIR' ) or define( 'STARTUP_PRO_HEADERS_DIR', STARTUP_PRO_THEME_DIR . '/startup-pro/headers' );
defined( 'STARTUP_PRO_HEADERS_URI' ) or define( 'STARTUP_PRO_HEADERS_URI', STARTUP_PRO_THEME_URI . '/startup-pro/headers' );
defined( 'STARTUP_PRO_OPTION_NAME' ) or define( 'STARTUP_PRO_OPTION_NAME', 'netbee_options' );

//include( STARTUP_PRO_DIR. '/smart-core/init.php' );

if (  function_exists( 'netbee_core_plugin_url' ) ) {
		Redux::init( STARTUP_PRO_OPTION_NAME );
}

include( STARTUP_PRO_DIR. '/config/startup-pro-helper-functions.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-redux-helpers.php' );
include( STARTUP_PRO_DIR. '/classes/startup-pro-abstract.class.php' );
include( STARTUP_PRO_DIR. '/classes/startup-pro-mega-menu-api.php' );
include( STARTUP_PRO_DIR. '/classes/startup-pro-post-types-api.php' );
include( STARTUP_PRO_DIR. '/classes/startup-pro-sidebars-api.php' );
if ( file_exists( STARTUP_PRO_PLUGIN_DIR . '/zip/tgm-init.php' ) ) {
	include( STARTUP_PRO_PLUGIN_DIR. '/zip/tgm-init.php' );
}
// is admin init
function startup_pro_is_admin_init() {
	include( STARTUP_PRO_DIR. '/classes/startup-pro-shortcodes-api.php' );
	include( STARTUP_PRO_DIR. '/classes/startup-pro-actions-api.php' );
	include( STARTUP_PRO_DIR. '/config/startup-pro-shortcode-config.php' );
}
add_action( 'admin_init', 'startup_pro_is_admin_init' );
// functions
include( STARTUP_PRO_DIR. '/config/startup-pro-includes-config.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-enqueue.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-filters-config.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-actions-config.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-template-functions.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-front-end-functions.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-post-formats-helper.php' );
include( STARTUP_PRO_DIR. '/config/startup-pro-customize.php' );
?>
