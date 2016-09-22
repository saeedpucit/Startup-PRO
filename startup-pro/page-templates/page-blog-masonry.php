<?php
/**
 *
 * Blog Layout "Masonry"
 *
 */
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'isotope-item ' . startup_pro_get_bootstrap( $startup_pro_options['blog_column'] ) ); ?>>
		<div class="blog-masonry-border">
			<?php
			$post_format = get_post_format();
			switch ( $post_format ) {
				case 'audio':
					
					startup_pro_post_thumbnail();
					echo startup_pro_post_media( get_the_content() );
					break;
				case 'video':
					echo startup_pro_post_media( get_the_content() );
					break;
				case 'link':
					$startup_pro_format = startup_pro_post_format_link_helper( get_the_content(), get_the_title() );
					$startup_pro_title = $startup_pro_format['title'];
					// if has post thumbnail, add link for thumbnail
					if ( has_post_thumbnail() ) {
						$startup_pro_link = startup_pro_get_link_attributes( $startup_pro_title );
						startup_pro_post_thumbnail( $startup_pro_link );
					}
					break;
				case 'gallery':
					echo startup_pro_post_gallery( get_the_content() );
					break;
				default:
					startup_pro_post_thumbnail();
					break;
			}
			global $more;
			$more = 0;
			?>
		<div class="blog-masonry-content">
			<header class="entry-header">
				<?php if ( ! is_single() && $post_format != 'link' ) {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} ?>
				<?php if ( $post_format == 'link' ) {
					echo wp_kses_post( $startup_pro_title );
				} ?>
				<div class="entry-category"><?php startup_pro_post_categories($post->ID); ?></div>
			</header>
			<!-- /entry-header -->
			<?php if ( has_excerpt() ) : ?>
				<div class="post-excerpt entry-summary">
			    	<?php 
			    		$startup_pro_options = startup_pro_get_theme_options(); 
			    		echo startup_pro_sin_excerpt($startup_pro_options['excerpt-length']); 
			    	?>
			    </div>	
		    <?php else : ?>
		    	<div class="entry-content"><?php the_content( esc_html__( 'Read More', 'startup-pro' ) ); ?></div><!-- /entry-content -->
		    <?php endif; ?>
			<div class="entry-meta-footer">
				<?php startup_pro_grid_type_meta(); ?>
			</div>
		</div>	
	</div>
</article>
<!-- /post-standard -->