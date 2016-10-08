<div class="logo">
	<?php
	if( !class_exists('redux') ){
?>
		<a href="<?php echo esc_url( home_url( '/' ) ) ?> ">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'?>" class="normal"/>
		</a>

	<?php
	}else{
			$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
			$startup_pro_page_logo = $startup_pro_page_retina_logo = false;
			$startup_pro_page_logo = $startup_pro_options["logo-upload"];
			$startup_pro_page_retina_logo = $startup_pro_options["logo-upload-retina"];

			if ( empty($startup_pro_page_logo['url']) ) {
				if(has_custom_logo())
				{
					startup_pro_the_custom_logo();
				}
				else
				{
				}
			} else {
				startup_pro_output_logo( $startup_pro_page_logo, $startup_pro_page_retina_logo );
			}
	}
	?>
</div>
