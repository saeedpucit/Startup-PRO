<?php
/**
 *
 * The template for displaying posts in the Image post format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-12">
			<?php startup_pro_post_thumbnail(); ?>
			<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
				<?php startup_pro_full_top_meta( $post ); ?>
			</div>
			<div class="border">
				<?php if ( ! is_single() ) : ?>
					<div class="post-excerpt entry-summary"><?php $startup_pro_options = startup_pro_get_theme_options(); echo startup_pro_sin_excerpt($startup_pro_options['excerpt-length']); ?></div><!-- /entry-summary -->
				<?php else : ?>
					<div
						class="post-excerpt entry-content"><?php the_content( esc_html__( 'Read More', 'startup-pro' ) ); ?></div><!-- /entry-content -->
					<?php startup_pro_post_tags(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php do_action( 'startup_pro_post_format_content_after', $post ); ?>
</article>
<!-- /post-image -->