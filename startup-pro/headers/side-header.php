<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_include_path = 'startup-pro/headers/';
?>
<nav id="mp-menu" class="mp-menu primary-menu">
	<div class="mp-level">
		<h2><i class="pro-in fa fa-globe"></i><?php esc_html_e( 'Menu', 'startup-pro' ) ?></h2>
		<?php startup_pro_main_menu() ?>
	</div>
</nav>