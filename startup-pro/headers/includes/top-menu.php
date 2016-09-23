<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_class = $startup_pro_options['top-header-right-cont'] == "navigation" ? 'right' : 'left';
?>
<div class="top-actual-menu <?php echo esc_attr( $startup_pro_class ) ?>">
	<?php startup_pro_top_menu() ?>
</div>