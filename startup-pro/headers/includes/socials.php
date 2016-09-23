<?php $startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence ?>
<ul class="nav navbar-nav social-btns">
	<?php
	$startup_pro_socials = array(
		'facebook',
		'flickr',
		'rss',
		'twitter',
		'vimeo',
		'youtube',
		'instagram',
		'pinterest',
		'tumblr',
		'google-plus',
		'dribbble',
		'digg',
		'linkedin',
		'skype',
		'deviantart',
		'yahoo',
		'reddit',
		'paypal',
		'dropbox',
		'envelope-o'
	);
	foreach ( $startup_pro_socials as $startup_pro_social ) {
		if ( isset( $startup_pro_options[ 'fa-' . $startup_pro_social ] ) && $startup_pro_options[ 'fa-' . $startup_pro_social ] ) {
			?>
			<li>
				<a href="<?php echo esc_url( $startup_pro_options[ 'fa-' . $startup_pro_social ] ) ?>"
				   <?php if ( $startup_pro_options['open-social-icons-window'] ){ ?>target="_blank" <?php }; ?>>
					<i class="fa fa-<?php echo esc_attr( $startup_pro_social ) ?>"></i>
				</a>
			</li>
			<?php
		}
	};
	?>
</ul>