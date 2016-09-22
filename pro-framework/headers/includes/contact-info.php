<?php $startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence ?>
<div class="contact-info">
	<?php if ( $startup_pro_options['telephone'] ) { ?>
		<ul class="nav navbar-nav">
			<li>
				<a href="<?php echo esc_url( 'tel:' . $startup_pro_options['telephone'] ) ?>"><i
						class="fa fa-phone"></i>&nbsp; <?php echo wp_kses_post( $startup_pro_options['telephone'] ); ?></a>
			</li>
		</ul>
	<?php }; ?>
	<?php if ( $startup_pro_options['email'] ) { ?>
		<ul class="nav navbar-nav">
			<li>
				<a href="<?php echo esc_url( 'mailto:' . $startup_pro_options['email'] ) ?>">
					<i class="fa fa-envelope-o"></i>&nbsp; <?php echo wp_kses_post( $startup_pro_options['email'] ); ?>
				</a>
			</li>
		</ul>
	<?php }; ?>
</div>