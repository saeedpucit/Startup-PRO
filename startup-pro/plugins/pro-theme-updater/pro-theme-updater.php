<?php if ( ! defined( 'ABSPATH' ) ) {

	die;

} // Cannot access pages directly.

/**

 *

 * Startup PRO Theme Updater

 *

 * @since 1.0.0

 * @version 1.0.0

 *

 */

if ( ! function_exists( 'startup_pro_pre_set_site_transient_update_themes' ) ) {

	function startup_pro_pre_set_site_transient_update_themes( $updates ) {

		if ( isset( $updates->checked ) ) {

			if ( ! class_exists( 'Envato_Protected_API' ) ) {

				get_template_part( 'startup-pro/plugins/pro-theme-updater/class-envato-protected-api' );

			}

			$startup_pro_username  = startup_pro_get_option( 'themeforest-username' );

			$startup_pro_apikey    = startup_pro_get_option( 'themeforest-api-key' );

			$api       = new Envato_Protected_API( $startup_pro_username, $startup_pro_apikey );

			$purchased = $api->wp_list_themes( true );

			if ( ! isset( $purchased['api_error'] ) ) {

				$get_theme     = wp_get_theme();

				$current_theme = ( $get_theme->parent() ) ? $get_theme->parent() : $get_theme;

				foreach ( $purchased as $theme ) {

					if ( $theme->'startup-pro' == $current_theme->Name ) {

						if ( version_compare( $current_theme->Version, $theme->version, '<' ) ) {

							$api_zip_url = $api->wp_download( $theme->item_id );

							if ( ! empty( $api_zip_url ) ) {

								preg_match( '/Expires=([0-9]+)/i', $api_zip_url, $expires );

								$updates->response[ $current_theme->Stylesheet ] = array(

									'url'         => 'http://themeforest.net/item/theme/' . $theme->item_id,

									'new_version' => $theme->version,

									'package'     => $api_zip_url,

									'expires'     => $expires[1],

								);

							}

						}

					}

				}

			}

		}

		return $updates;

	}

	add_filter( 'pre_set_site_transient_update_themes', 'startup_pro_pre_set_site_transient_update_themes' );

}

if ( ! function_exists( 'startup_pro_admin_head' ) ) {

	function startup_pro_admin_head() {

		global $pagenow;

		if ( in_array( $pagenow, array( 'update-core.php', 'update.php' ) ) ) {

			$action = ( ! empty( $_GET['action'] ) ) ? $_GET['action'] : '';

			$slug   = ( ! empty( $_GET['theme'] ) ) ? $_GET['theme'] : '';

			$nonce  = ( ! empty( $_GET['_wpnonce'] ) ) ? $_GET['_wpnonce'] : '';

			if ( $action == 'upgrade-theme' && wp_verify_nonce( $nonce, 'upgrade-theme_' . $slug ) ) {

				$update_themes = get_site_transient( 'update_themes' );

				if ( isset( $update_themes->response[ $slug ] ) && (int) $update_themes->response[ $slug ]['expires'] < time() ) {

					wp_clean_themes_cache();

				}

			}

		}

	}

	add_action( 'admin_head', 'startup_pro_admin_head' );

}