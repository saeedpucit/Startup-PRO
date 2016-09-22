<?php
if ( ! function_exists( 'startup_pro_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function startup_pro_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		if( has_custom_logo() ){
			the_custom_logo();
		}else{
			?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo 	get_bloginfo( 'name' ); ?>" />
			</a>
			<?php
		};
	}
}
endif;
