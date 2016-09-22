<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_include_path = 'pro-framework/headers/';
$startup_pro_transparent_header = $startup_pro_options["transparent-header"];
?>
<header id="masthead" class="<?php if ( $startup_pro_transparent_header ) {
	echo 'transparent-header';
} ?> site-header style-1 header-v3 ">
	<?php
	if ( $startup_pro_options['show-top-header'] ) {
		get_template_part( $startup_pro_include_path . '/top' );
	}; ?>
	<nav id="top-menu" class="navbar hidden-mobile">
		<div class="container">
			<div class="header-top">
				<div class="center">
					<?php get_template_part( $startup_pro_include_path . '/includes/logo' ) ?>
				</div>
			</div>
		</div>
		<div class="container header-bottom">
			<?php if ( $startup_pro_options['show-search-icon'] ) { ?>
				<div class="pull-right">
					<?php get_template_part( $startup_pro_include_path . '/includes/search' ) ?>
				</div>
			<?php }; ?>
			<div class="pull-right">
				<?php
				if ( class_exists( 'Woocommerce' ) && $startup_pro_options['show-woocommerce-cart'] ) {
					get_template_part( $startup_pro_include_path . '/includes/cart' );
				};
				?>
			</div>
			<div class="primary-menu">
				<div class="menu-class navbar-centered">
					<?php startup_pro_main_menu() ?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
<!-- #masthead -->