<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php $startup_pro_options = startup_pro_get_theme_options(); // Check theme options for existence ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( !class_exists('redux') ){ ?>
				<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<?php } ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
<?php
	if ( $startup_pro_options['loader'] ) {
		echo startup_pro_loader();
	}
?>
<div id="page" class="hfeed site">
<?php startup_pro_search_box(); ?>
<?php startup_pro_rev_slider( 'above', $startup_pro_options['slider-position'], $startup_pro_options['slide-template'] ); ?>
<?php startup_pro_header(); ?>
<?php startup_pro_rev_slider( 'below', $startup_pro_options['slider-position'], $startup_pro_options['slide-template'] ); ?>
	<div id="content-wrapper" class="site-content">
<?php startup_pro_title_bar(); ?>
