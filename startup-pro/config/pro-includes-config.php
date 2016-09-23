<?php

/**

 *

 * Load all of shortcode from folder

 * @since 1.0.0

 * @version 1.1.0

 *

 */

//

// Require plugin.php to use is_plugin_active() below

// ----------------------------------------------------------------------------------------------------


//

// Custom Style Adapted

// ----------------------------------------------------------------------------------------------------

get_template_part( 'startup-pro/includes/custom-style');

//

// woocommerce integration

// ----------------------------------------------------------------------------------------------------
if (  class_exists( 'WooCommerce' ) ) {
	get_template_part( 'startup-pro/plugins/woocommerce/woocommerce-config');
}
//

// Theme Check Themeforest API KEY

// ----------------------------------------------------------------------------------------------------

$startup_pro_username = startup_pro_get_option( 'themeforest-username' );

$startup_pro_apikey = startup_pro_get_option( 'themeforest-api-key' );

if ( ! empty( $startup_pro_username ) && ! empty( $startup_pro_apikey ) ) {

	get_template_part( 'startup-pro/plugins/pro-theme-updater/pro-theme-updater');

}