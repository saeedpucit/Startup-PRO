<?php
/**
 *
 * The default template for displaying content
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-event">
		<?php startup_pro_post_thumbnail(); ?>
		<div class="event-information">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<ul>
				<?php
          $startup_pro_date_event         = rwmb_meta( 'startup_pro_date_event' );
          $startup_pro_start_time_event   = rwmb_meta( 'startup_pro_start_time_event' );
          $startup_pro_price_event        = rwmb_meta( 'startup_pro_price_event' );
        ?>
				<li>
					<?php if ( !empty( $startup_pro_date_event ) ) : ?>
		    			<div>
		       				<p><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php echo esc_html( $startup_pro_date_event ); ?></p>
		    			</div>
					<?php endif; ?>
				</li>
				<li>
					<?php if ( !empty( $startup_pro_start_time_event ) ) :
									$startup_pro_select_start_hour_event    = rwmb_meta( 'startup_pro_select_start_hour_event' );
                  $startup_pro_finish_time_number_event   = rwmb_meta( 'startup_pro_finish_time_number_event' );
                  $startup_pro_finish_start_hour_event    = rwmb_meta( 'startup_pro_finish_start_hour_event' );
                ?>
		    			<div class="time-event">
		       				<p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html( $startup_pro_start_time_event ); ?> <span><?php echo esc_html( $startup_pro_select_start_hour_event ); ?> - </span><?php echo esc_html( $startup_pro_finish_time_number_event ); ?> <span><?php echo esc_html( $startup_pro_finish_start_hour_event ); ?></span></p>
		    			</div>
					<?php endif; ?>

				</li>
				<li>
					<?php if ( !empty( $startup_pro_price_event ) ) :
										$startup_pro_currency_price_event   = rwmb_meta( 'startup_pro_currency_price_event' );
                		?>
		    			<div>
		       				<p><span class="price-event"><?php echo esc_html( $startup_pro_currency_price_event ); ?> <?php echo esc_html( $startup_pro_price_event ); ?></span></p>
		    			</div>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</div>
	<?php do_action( 'startup_pro_post_format_content_after', $post ); ?>
</article>
<!-- /post-standard -->
