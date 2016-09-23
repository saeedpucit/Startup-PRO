<?php
$startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence
$startup_pro_include_path = 'startup-pro/headers/';
?>
<header id="masthead" class="site-header style-4 header-v1">
	<div class="container">
		<div class="header-top">
			<?php if ( $startup_pro_options['header-layout'] == 'side-header-right' ) { ?>
				<div class="pull-left">
					<?php get_template_part( $startup_pro_include_path . '/includes/logo' ) ?>
				</div>
				<div class="pull-right">
					<div id="trigger" class="menu-trigger">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="cross">
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="pull-left">
					<div id="trigger" class="menu-trigger">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="cross">
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
				<div class="pull-right">
					<?php get_template_part( $startup_pro_include_path . '/includes/logo' ) ?>
				</div>
			<?php } ?>
		</div>
	</div>
	</nav>
</header>
<!-- #masthead -->