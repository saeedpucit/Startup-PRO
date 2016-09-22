<?php
/**
 *
 * Set body class
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_setup() {
   			add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'theme_slug_setup' );
}
if ( ! function_exists( 'startup_pro_body_class_names' ) ) {
	function startup_pro_body_class_names( $classes ) {
		$startup_pro_options = startup_pro_get_theme_options();
		$startup_pro_boxed_layout = $startup_pro_options['layout-type'] == 'boxed' ? 'boxed' : '';
		$startup_pro_sticky_header = $startup_pro_options['sticky-header'] ? 'sticky-header' : '';
		$startup_pro_slider_effect = '';
		$startup_pro_top_bar_tablets = $startup_pro_options['hide-top-bar-tablets'] ? 'no-tablet-top-bar' : '';
		$startup_pro_top_bar_mobiles = $startup_pro_options['hide-top-bar-mobiles'] ? 'no-mobile-top-bar' : '';
		$classes[] = "$startup_pro_boxed_layout $startup_pro_sticky_header $startup_pro_top_bar_tablets $startup_pro_top_bar_mobiles";
		return $classes;
	}
	add_filter( 'body_class', 'startup_pro_body_class_names' );
}
/**
 *
 * Get main menu
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'startup_pro_main_menu' ) ) {
	function startup_pro_main_menu( $onepage = false ) {
		$startup_pro_options = startup_pro_get_theme_options();
		if ( $startup_pro_options['page_menu'] ) {
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'mega' => true ) );
					} else {
							if ( has_nav_menu( 'one_page' ) ) {
									wp_nav_menu( array( 'theme_location' => 'one_page', 'mega' => true ) );
							}  else {
									wp_nav_menu( array( 'menu' => $startup_pro_options['page_menu'], 'mega' => true ) );
							}
					}
					//wp_nav_menu( array( 'menu' => $startup_pro_options['page_menu'], 'mega' => true ) );
		} else {
					if ( $onepage ) {
						if ( has_nav_menu( 'one_page' ) ) {
							wp_nav_menu( array( 'theme_location' => 'one_page', 'mega' => true ) );
						}
					} else {
						if ( has_nav_menu( 'primary' ) ) {

							wp_nav_menu( array( 'theme_location' => 'primary', 'mega' => true ) );
						}
					}
		}
	}
}
/**
 *
 * Get side menu start markup
 * @since 1.0.0
 * @version 1.0.0
 */
function startup_pro_side_menu_start( $type ) {
	$from = ( $type == 'side-header-right' ) ? 'right' : 'left';
	echo '<div class="mp-pusher ' . $from . '" id="mp-pusher">';
	get_template_part( 'pro-framework/headers/side-header' );
	echo '<div class="scroller"><div class="inner-scroller">';
	get_template_part( 'pro-framework/headers/includes/side-menu-logo' );
}
/**
 *
 * Get side menu closing markup
 * @since 1.0.0
 * @version 1.0.0
 */
function startup_pro_side_menu_end() {
	echo '</div></div></div>';
}
/**
 *
 * Get top menu
 * @since 1.0.0
 * @version 1.0.0
 */
function startup_pro_top_menu() {
	$startup_pro_menu_name = 'top_menu';
	if ( ( $startup_pro_locations = get_nav_menu_locations() ) && isset( $startup_pro_locations[ $startup_pro_menu_name ] ) ) {
		$startup_pro_menu = wp_get_nav_menu_object( $startup_pro_locations[ $startup_pro_menu_name ] );
		echo '<div class="right-navbar-nav">';
			wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => false, 'menu_class' => 'nav navbar-nav' ) );
		echo '</div>';
	};
}
/**
 *
 * Get search box
 * @since 1.0.0
 * @version 1.0.0
 */
function startup_pro_search_box() {
	?>
	<div class="search-box">
		<a href="#" class="close-box fa fa-plus"></a>
		<div class="form-holder">
		<?php get_search_form(); ?>
		</div>
	</div>
	<?php
}
