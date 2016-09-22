w<?php
/**
 * Template Name: Right and Left Sidebar
 */
get_header(); ?>
<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_right_sidebar = $startup_pro_options["sidebar-right"];
$startup_pro_left_sidebar = $startup_pro_options["sidebar-left"];
$startup_pro_layout = 'both';
?>
	<div class="container cont-padding">
		<div class="row">
			<?php startup_pro_page_sidebar( 'left', $startup_pro_layout, $startup_pro_left_sidebar ); ?>
			<div class="col-md-6">
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
			<!-- col-md-6 -->
			<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
		</div>
		<!-- row -->
	</div><!-- container-fluid-->
<?php
get_footer();