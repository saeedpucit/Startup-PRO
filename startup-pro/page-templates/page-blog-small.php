<?php
/**
 *
 * Blog Layout "Alternative"
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-4">
			<div class="entry-meta">
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
						echo wp_kses_post( $startup_pro_title );
						break;
					case 'gallery':
						echo startup_pro_post_gallery( get_the_content() );
						break;
					default:
						startup_pro_post_thumbnail();
						break;
				} ?>
			</div>
			</header>
		</div>
		<div class="col-md-8">
			<header class="entry-header">
				<?php
				if ( $post_format != 'link' ) {
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>' );
				}
				?>
				<div class="entry-category"><?php startup_pro_post_categories($post->ID); ?></div>
			</header>
			<div class="post-excerpt entry-summary">
				<?php $startup_pro_options = startup_pro_get_theme_options(); echo startup_pro_sin_excerpt($startup_pro_options['excerpt-length']); ?>
			</div>
			<div class="entry-meta-footer bottom">
				<?php startup_pro_medium_type_meta(); ?>
			</div>
		</div>
	</div>
</article>
<!-- /post-standard -->