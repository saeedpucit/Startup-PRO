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


	if( !class_exists('redux') ){
		$startup_pro_page_right_sidebar = 'sidebar-1';
		$startup_pro_page_left_sidebar 	= 'sidebar-1';
		$startup_pro_page_layout 				= 'full';
	}else{
		$startup_pro_page_right_sidebar = smart_redux_post_meta( "smart_options", get_the_ID(), "sidebar-right" );
		$startup_pro_page_left_sidebar = smart_redux_post_meta( "smart_options", get_the_ID(), "sidebar-right" );
		$startup_pro_page_layout = smart_redux_post_meta( "smart_options", get_the_ID(), "layout" );
	}

$startup_pro_options['single-sidebar-right'] = isset($startup_pro_options['single-sidebar-right']);
$startup_pro_global_right_sidebar = isset($startup_pro_options['single-sidebar-right']) ? $startup_pro_options['single-sidebar-right'] : NULL;
$startup_pro_global_left_sidebar = isset($startup_pro_options['single-sidebar-left']) ? $startup_pro_options['single-sidebar-left'] : NULL;
$startup_pro_right_sidebar = $startup_pro_page_right_sidebar ? $startup_pro_page_right_sidebar : $startup_pro_global_right_sidebar;
$startup_pro_left_sidebar = $startup_pro_page_left_sidebar ? $startup_pro_page_left_sidebar : $startup_pro_global_left_sidebar;
$startup_pro_layout = $startup_pro_page_layout ? $startup_pro_page_layout : $startup_pro_options['single-layout'];
if ( $startup_pro_layout == 'full' || $startup_pro_layout == 'full-100' ) {
	$startup_pro_page_column = '12';
} else if ( $startup_pro_layout == 'left' || $startup_pro_layout == 'right' ) {
	$startup_pro_page_column = '9';
} else if ( $startup_pro_layout == 'both' ) {
	$startup_pro_page_column = '6';
}
$startup_pro_container = $startup_pro_layout == 'full-100' ? "container-fluid" : "container";
?>
	<div class="<?php echo esc_attr( $startup_pro_container ) ?> cont-padding blog-default single-post">
		<div class="row">
			<?php startup_pro_page_sidebar( 'left', $startup_pro_layout, $startup_pro_left_sidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $startup_pro_page_column ); ?>">
				<div class="page-content">
					<?php
					if( !class_exists('redux') ){

						while( have_posts() ) : the_post();
							get_template_part( 'startup-pro/post-formats/content' );
							if ( 1 ) {
								startup_pro_post_nav();
							}
							if ( 1 ):
								comments_template( '', true );
							endif;
						endwhile;
					}else{
						while( have_posts() ) : the_post();
							get_template_part( 'startup-pro/post-formats/content', get_post_format() );
							if ( $startup_pro_options['blog_single_nav'] ) {
								startup_pro_post_nav();
							}
							if ( comments_open() && $startup_pro_options['blog_comments'] ):
								comments_template( '', true );
							endif;
						endwhile;
					}
					?>
				</div>
			</div>
			<?php startup_pro_page_sidebar( 'right', $startup_pro_layout, $startup_pro_right_sidebar ); ?>
		</div>
	</div>
<?php
get_footer();
