<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_blog_layout = 'default';
$startup_pro_blog_class = 'default blog-layout-' . $startup_pro_blog_layout;
$startup_pro_right_sidebar = $startup_pro_options["event-sidebar-right"];
$startup_pro_left_sidebar = $startup_pro_options["event-sidebar-left"];
if ( is_archive() ) {
	$startup_pro_layout = $startup_pro_options['layout-archive-pages'];
} else {
	$startup_pro_layout = $startup_pro_options["layout"];
}
if ( $startup_pro_layout == 'full' || $startup_pro_layout == 'full-100' ) {
	$startup_pro_page_column = '12';
} else if ( $startup_pro_layout == 'left' || $startup_pro_layout == 'right' ) {
	$startup_pro_page_column = '9';
} else if ( $startup_pro_layout == 'both' ) {
	$startup_pro_page_column = '6';
}
$startup_pro_container = $startup_pro_layout == 'full-100' ? "container-fluid" : "container";
?>
<div
	class="<?php echo esc_attr( $startup_pro_container ); ?> cont-padding page-layout-<?php echo esc_attr( $startup_pro_blog_layout ); ?> blog-<?php echo esc_attr( $startup_pro_blog_class ); ?>">
	<div class="row">
		<?php startup_pro_page_sidebar( 'left', $startup_pro_layout, $startup_pro_left_sidebar ); ?>
		<div class="col-md-<?php echo esc_attr( $startup_pro_page_column ); ?>">
			<div class="page-content">
				<?php
				// default posts loop
				while( have_posts() ) : the_post();
					// check blog type
						get_template_part( 'startup-pro/post-formats/event', get_post_format() );
				endwhile;
				// paginatio
				startup_pro_paging_nav();
				?>
			</div>
			<!-- page-content -->
		</div>
		<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
	</div>
</div>
