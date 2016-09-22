<?php
/**
 *
 * Admin Enqueue
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function startup_pro_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'pro-chosen', STARTUP_PRO_FRAMEWORK_ASSETS . '/css/chosen.css', array(), '3.0.3', 'all' );
	wp_enqueue_style( 'pro-framework', STARTUP_PRO_FRAMEWORK_ASSETS . '/css/pro-framework.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'pro-alert', STARTUP_PRO_FRAMEWORK_ASSETS . '/css/pro-alert.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-awesome', STARTUP_PRO_THEME_URI . '/assets/css/vendor/font-awesome.css' );
	wp_enqueue_style( 'icomoon', STARTUP_PRO_THEME_URI . '/assets/css/vendor/icomoon.css' );
	wp_enqueue_script( 'pro-chosen', STARTUP_PRO_FRAMEWORK_ASSETS . '/js/chosen.jquery.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'pro-framework', STARTUP_PRO_FRAMEWORK_ASSETS . '/js/pro-framework.js' , array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'startup_pro_admin_scripts' );
/**
 * Enqueue styles
 * @since 1.0.0
 * @version 1.0.0
 */
function startup_pro_styles() {
	$startup_pro_options = startup_pro_get_theme_options();
	wp_enqueue_style( 'bootstrap', STARTUP_PRO_THEME_URI . '/assets/css/vendor/bootstrap.css' );
	wp_enqueue_style( 'pro-main-style', STARTUP_PRO_THEME_URI . '/style.css' );
	wp_enqueue_style( 'pro-framework', STARTUP_PRO_FRAMEWORK_ASSETS . '/css/pro-framework.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-awesome', STARTUP_PRO_THEME_URI . '/assets/css/vendor/font-awesome.css' );
	wp_enqueue_style( 'icomoon', STARTUP_PRO_THEME_URI . '/assets/css/vendor/icomoon.css' );
	wp_enqueue_style( 'pro-responsive', STARTUP_PRO_THEME_URI . '/assets/css/responsive.css' );
	wp_enqueue_style( 'pro-menu' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'pro-dynamic', get_template_directory_uri() . '/assets/css/dynamic.css' );
	wp_add_inline_style( 'pro-dynamic', page_modified_css() );
	wp_add_inline_style( 'pro-dynamic', startup_pro_custom_css() );
	if ( is_child_theme() ) {
		wp_enqueue_style( 'pro-pro', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'startup_pro_styles');
/**
 * Enqueue scripts
 */
function startup_pro_scripts() {
	if( !class_exists('redux') ){

		if ( ! is_admin() ) {
        $dev = false;
        wp_enqueue_script( 'modernizr', STARTUP_PRO_THEME_URI . '/assets/js/vendor/modernizr.custom.js', array(), '1.0.0' );
        wp_enqueue_script( 'pro-menu', STARTUP_PRO_THEME_URI . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true );
        if ( $dev ) {
        } else {
        wp_enqueue_script( 'pro-plugins-min', STARTUP_PRO_THEME_URI . '/assets/js/jquery.plugins.min.js', array( 'jquery' ), '1.0.0', true );
        }
        // Enqueue
        wp_enqueue_script( 'bootstrap', STARTUP_PRO_THEME_URI . '/assets/js/vendor/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'modernizr' );
        // Enqueue
        wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=' . '#asyncload', array( 'jquery' ), '1.0.0', false );

        wp_enqueue_script( 'pro-script', STARTUP_PRO_THEME_URI . '/assets/js/jquery.script.js', array( 'jquery' ), '1.0.0', true );
        wp_localize_script( 'pro-script', 'startup_pro_ajax', array(
        'ajaxurl'      => admin_url( 'admin-ajax.php' ),
        'sticky'       => 1,
        'compactMenu'  => is_compact_menu(),
        'footerEffect' => '',
        'showFooter'   => 1
        ) );
      };

	}else{
			$startup_pro_options = startup_pro_get_theme_options();
			if ( ! is_admin() ) {
				$dev = false;
				wp_enqueue_script( 'modernizr', STARTUP_PRO_THEME_URI . '/assets/js/vendor/modernizr.custom.js', array(), '1.0.0' );
				wp_enqueue_script( 'pro-menu', STARTUP_PRO_THEME_URI . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true );
				if ( $dev ) {
				} else {
					wp_enqueue_script( 'pro-plugins-min', STARTUP_PRO_THEME_URI . '/assets/js/jquery.plugins.min.js', array( 'jquery' ), '1.0.0', true );
				}
				// Enqueue
				wp_enqueue_script( 'bootstrap', STARTUP_PRO_THEME_URI . '/assets/js/vendor/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
				wp_enqueue_script( 'modernizr' );
				// Enqueue
				if ( $startup_pro_options['enable-share'] && $startup_pro_options['addthis-id'] ) {
					wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=' . esc_attr( $startup_pro_options['addthis-id'] ) . '#asyncload', array( 'jquery' ), '1.0.0', false );
				};
				wp_enqueue_script( 'pro-script', STARTUP_PRO_THEME_URI . '/assets/js/jquery.script.js', array( 'jquery' ), '1.0.0', true );
				wp_localize_script( 'pro-script', 'startup_pro_ajax', array(
					'ajaxurl'      => admin_url( 'admin-ajax.php' ),
					'sticky'       => $startup_pro_options['sticky-header'],
					'compactMenu'  => is_compact_menu(),
					'footerEffect' => (bool) $startup_pro_options['footer-fixed-effect'],
					'showFooter'   => (bool) $startup_pro_options['show-footer']
				) );
			};

		} //end else of not redux exist
}
add_action( 'wp_enqueue_scripts', 'startup_pro_scripts' );
/**
 *
 * Enqueue Inline Styles
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'startup_pro_enqueue_inline_styles' ) ) {
	function startup_pro_enqueue_inline_styles() {
		global $startup_pro_inline_styles;
		if ( ! empty( $startup_pro_inline_styles ) ) {
			echo '<style id="custom-shortcode-css" type="text/css">' . startup_pro_css_compress( join( '', $startup_pro_inline_styles ) ) . '</style>';
		}
	}
	add_action( 'wp_footer', 'startup_pro_enqueue_inline_styles',21 );
}
/**
 *
 * Deque styles
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function startup_pro_deque_styles() {
	if ( wp_style_is( 'select2-css', $list = 'enqueued' ) ) {
		wp_dequeue_style( 'woocomposer-select2' ); // remove select2 from Ultimate_VC_Addons
	}
}
add_action( 'admin_enqueue_scripts', 'startup_pro_deque_styles' );
/**
 *
 * Deque scripts
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function startup_pro_dequeue_script() {
	if ( wp_script_is( 'select2-js', $list = 'enqueued' ) ) {
		wp_dequeue_script( 'woocomposer-select2-js' ); // remove select2 from Ultimate_VC_Addons
	}
}
add_action( 'wp_enqueue_scripts', 'startup_pro_dequeue_script', 100 );
/**
 *
 * Custom css
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'startup_pro_custom_css' ) ) {
	function startup_pro_custom_css() {
		$startup_pro_options = startup_pro_get_theme_options();
		$output = '';
		$output .= startup_pro_css_compress( $startup_pro_options['pure-css-code'] );
		return $output;
	}
}
