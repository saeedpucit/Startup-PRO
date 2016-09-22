<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_include_path = 'pro-framework/headers/';
$startup_pro_transparent_header = $startup_pro_options["transparent-header"];
?>
<header id="masthead" class="<?php if ( $startup_pro_transparent_header ) {
	echo 'transparent-header';
} ?> site-header style-2 one-page-menu  fixed">
	<?php
	if ( $startup_pro_options['show-top-header'] ) {
		get_template_part( $startup_pro_include_path . '/top' );
	}; ?>
	<nav id="top-menu" class="navbar navbar-fixed-top  hidden-mobile">
		<div class="container">
			<div class="header-top">
				<div class="pull-left">
					<?php get_template_part( $startup_pro_include_path . '/includes/logo' ) ?>
				</div>
				<div class="pull-right v-align">
					<?php
					if ( class_exists( 'Woocommerce' ) && $startup_pro_options['show-woocommerce-cart'] ) {
						get_template_part( $startup_pro_include_path . '/includes/cart' );
					};
					?>
				</div>
				<?php if ( $startup_pro_options['show-search-icon'] ) { ?>
					<div class="pull-right v-align">
						<?php get_template_part( $startup_pro_include_path . '/includes/search' ) ?>
					</div>
				<?php }; ?>
				<div class="pull-right">
					<div class="primary-menu">
						<div class="menu-class navbar-left">
							<?php startup_pro_main_menu( true ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
<!-- #masthead -->