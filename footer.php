<?php
/** * The template for displaying the footer.
 * * Contains the closing of the #content div and all content after
 * * @package pro
 */
?>
<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
?>
</div>
<!-- #content -->
<footer>
	<?php if ( $startup_pro_options['show-footer-form'] ) { ?>
		<div class="top-footer footer-form">
			<?php echo startup_pro_background( $startup_pro_options['background-image-form-area'], $startup_pro_options['footer-form-background-parallax'] ); ?>
			<div class="container">
				<?php if ( $startup_pro_options['show-footer-form'] ) { ?>
					<div class="row">
						<?php echo wp_kses_post( $startup_pro_options['before-footer-form'] ); ?>
						<?php if ( $startup_pro_options['footer-form-shortcode'] ) {
							echo do_shortcode( $startup_pro_options['footer-form-shortcode'] );
						}; ?>
					</div>
				<?php }; ?>
				<?php if ( $startup_pro_options['show-footer-contact-details'] ) {
					echo netbee_footer_contact_details();
				} ?>
			</div>
		</div>
	<?php }; ?>
	<div class="copyright-widgets-cont">
		<?php if ( $startup_pro_options['show-footer'] ) {
			echo startup_pro_footer_widgets();
		}; ?>

		<?php if ( !class_exists('redux') ) {
			echo startup_pro_footer_widgets();
		}; ?>

		<?php if ( $startup_pro_options['copyright-bar'] ) { ?>
			<div class="bott-footer copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-5">
							<p class="copyright-text"><?php echo wp_kses_post( $startup_pro_options['copyright-text'] ) ?></p>
						</div>
						<div class="col-xs-12 col-md-7">
							<?php if ( $startup_pro_options['enable-to-top-script'] ) { ?>
								<div class="arrow-to-top"><b class="fa-angle-up"></b></div>
							<?php }; ?>
							<?php
							$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
							$startup_pro_include_path = 'startup-pro/headers';
							$cont_right   = $startup_pro_options['footer-right-content'];
							switch ( $cont_right ) {
								case "contact-info":
									get_template_part( $startup_pro_include_path . '/includes/contact-info' );
									break;
								case "social-icons":
									get_template_part( $startup_pro_include_path . '/includes/socials-footer' );
									break;
								case "navigation":
									get_template_part( 'startup-pro/template-parts/footer-menu' );
									break;
								case "custom-content":
									echo wp_kses_post( $startup_pro_options['copyright-custom-content'] );
									break;
								default:
									//leave-empty
							} ?>
						</div>
					</div>
				</div>
			</div>
		<?php }; ?>
		<?php if ( !class_exists('redux') ) { ?>
							<div class="bott-footer copyright">
									<div class="container">
											<div class="row">
													<div class="col-xs-12 col-md-5">
															<p class="copyright-text"><?php echo esc_html__('Copyright 2016 Startup PRO. Theme designed by Netbee', 'startup-pro'); ?></p>
													</div>
													<div class="col-xs-12 col-md-7">
															<div class="arrow-to-top"><b class="fa-angle-up"></b></div>
															<?php get_template_part( 'startup-pro/headers/includes/socials-footer' ); ?>
													</div>
											</div>
									</div>
							</div>
			<?php }; ?>


	</div>
</footer>
<!-- #page -->
</div>
<?php
	startup_pro_custom_style_sticky_header();
	wp_footer();
?>
</body>
</html>
