<?php
/**
 *
 * The Template for displaying all single posts.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
get_header();
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_right_sidebar = $startup_pro_options["sidebar-right"];
$startup_pro_left_sidebar = $startup_pro_options["sidebar-left"];
$startup_pro_layout = $startup_pro_options["layout"];
if ( $startup_pro_layout == 'full' || $startup_pro_layout == 'full-100' ) {
	$startup_pro_page_column = '12';
} else if ( $startup_pro_layout == 'left' || $startup_pro_layout == 'right' ) {
	$startup_pro_page_column = '9';
} else if ( $startup_pro_layout == 'both' ) {
	
	$startup_pro_page_column = '6';
}
$startup_pro_container = $startup_pro_layout == 'full-100' ? "container-fluid" : "container";
?>
	<div class="<?php echo esc_attr( $startup_pro_container ) ?> cont-padding">
		<div class="row">

			<?php startup_pro_page_sidebar( 'left', $startup_pro_layout, $startup_pro_left_sidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $startup_pro_page_column ) ?>">
				<div class="page-content">
					<?php
					// Start the Loop.
					while( have_posts() ) : the_post();
						startup_pro_page_featured_image();
						the_content();
						do_action( 'startup_pro_page_end' );
					endwhile;
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
				</div>
			</div>

			<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
		</div>
	</div>
<?php
get_footer();
