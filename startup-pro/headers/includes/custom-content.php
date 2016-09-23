<?php $startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence ?>
<span class="text">
	<?php echo wp_kses_post( $startup_pro_options['top-header-custom-content'] ); ?>
</span> 