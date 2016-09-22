<?php
/**
 *
 * Template Name: One-Page Template
 *
 */
get_header();
?>
	<div class="container cont-padding">
		<div class="row">
			<div class="col-md-12">
				<?php
				if ( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<!-- col-md-12 -->
		</div>
		<!-- row -->
	</div><!-- container-->
<?php
//
// Fixed Navigation
// -------------------------------------------------------------------------------------------
$startup_pro_location = apply_filters( 'startup_pro_one_page_location', 'one_page' );
if ( ( $startup_pro_locations = get_nav_menu_locations() ) && isset( $startup_pro_locations[ $startup_pro_location ] ) ) {
	$startup_pro_menu_object = wp_get_nav_menu_object( $startup_pro_locations[ $startup_pro_location ] );
	if ( is_object( $startup_pro_menu_object ) ) {
		$startup_pro_menu_items = wp_get_nav_menu_items( $startup_pro_menu_object->term_id );
		$startup_pro_nav_list = '<nav id="pro-fixed-nav">';
		$startup_pro_nav_list .= '<ul>';
		if ( ! empty( $startup_pro_menu_items ) ) {
			foreach ( $startup_pro_menu_items as $startup_pro_menu_item ) {
				$startup_pro_nav_list .= '<li><a href="' . $startup_pro_menu_item->url . '" data-toggle="tooltip" data-original-title="' . $startup_pro_menu_item->title . '" data-placement="left"></a></li>';
			}
		}
		$startup_pro_nav_list .= '</ul>';
		$startup_pro_nav_list .= '</nav><!-- /pro-fixed-nav -->';
		echo wp_kses_post( $startup_pro_nav_list );
	}
}
?>
<?php get_footer(); ?>