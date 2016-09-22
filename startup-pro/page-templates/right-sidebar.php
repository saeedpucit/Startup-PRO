<?php
/**
 * Template Name: Right Sidebar Page
 */
get_header(); ?>
<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_right_sidebar = $startup_pro_options["sidebar-right"];
$startup_pro_layout = 'right';
?>
	<div class="container cont-padding">
		<div class="row">
			<div class="col-md-9">
				<?php
				// Start the Loop.
				if ( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php
						the_content();
						?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<!-- col-md-9 -->
			<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
		</div>
		<!-- row -->
	</div><!-- container-fluid-->
<?php
get_footer();
