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
	<div class="single-portofolio">
		<div class="<?php echo esc_attr( $startup_pro_container ) ?> cont-padding">
			<div class="row">
				<?php startup_pro_page_sidebar( 'left', $startup_pro_layout, $startup_pro_left_sidebar ); ?>
				<div class="col-md-<?php echo esc_attr( $startup_pro_page_column ); ?>">
					<div class="page-content">
						<?php
						while( have_posts() ) : the_post();
							the_content();
							do_action( 'startup_pro_story_format_content_after', $post );
							startup_pro_link_pages();
							if ( ( $startup_pro_options['show-comments-story'] ) && ( comments_open() || '0' != get_comments_number() ) ) {
								comments_template( '', true );
							}
							do_action( 'startup_pro_story_item_end' );
						endwhile;
						?>
					</div>
				</div>
				<?php
				if ( $startup_pro_options['story-show-previous-next-pagination'] ) {
					// prev and next posts
					$startup_pro_prev = get_previous_post( true, null, 'story-category' );
					$startup_pro_next = get_next_post( true, null, 'story-category' );
					?>
					<nav class="nav-portfolio">
						<?php if ( ! empty( $startup_pro_prev ) ): ?>
							<a class="pro-prev" href="<?php echo esc_url(get_permalink( $startup_pro_prev->ID )); ?>">
								<i class="fa fa-chevron-left"></i>
							<span class="pro-wrap">
								<span class="pro-title"><?php echo wp_kses_post( $startup_pro_prev->post_title ); ?></span>
								<?php echo get_the_post_thumbnail( $startup_pro_prev->ID, array( 80, 80 ) ); ?>
							</span>
							</a>
						<?php endif; ?>
						<?php if ( ! empty( $startup_pro_next ) ): ?>
							<a class="pro-next" href="<?php echo esc_url(get_permalink( $startup_pro_next->ID )); ?>">
								<i class="fa fa-chevron-right"></i>
			  <span class="pro-wrap">
				<span class="pro-title"><?php echo wp_kses_post( $startup_pro_next->post_title ); ?></span>
				  <?php echo get_the_post_thumbnail( $startup_pro_next->ID, array( 80, 80 ) ); ?>
			  </span>
							</a>
						<?php endif; ?>
					</nav>
				<?php }; ?>
				<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
