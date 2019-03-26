<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
 */ ?>
<!DOCTYPE html>
<!-- WordPress Theme by WPExplorer (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( wpex_get_data('custom_favicon') ) : ?>
        <link rel="shortcut icon" href="<?php echo wpex_get_data('custom_favicon'); ?>" />
    <?php endif; ?>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/wp-content/themes/ecocyclists-blog/custom.css">
</head>
<!-- Begin Body -->
<body <?php body_class(); ?>>
<header id="masterhead" class="clearfix site-header">
    <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <div id="clouds">
        </div>
    </a>
    <div class="header_placeholder">
        <div class="cloud3 x3"></div>
    </div>
    <div class="city"></div>
    <div class="navbar">
        <div class="top_nav"></div>
        <div id="wrap3" class="clearfix">
            <nav id="masternav" class="clearfix">
                <?php wp_nav_menu( array(
                    'theme_location'	=> 'menu',
                    'sort_column' 		=> 'menu_order',
                    'menu_class' 		=> 'sf-menu',
                    'fallback_cb' 		=> 'default_menu'
                )); ?>
            </nav>
            <div class="left_corner"></div>
            <div class="right_corner"></div>
            <!-- /masternav -->
        </div>
        <!--end menu wrap-->
    </div>
</header>
<!-- /masterhead -->
<div id="wrap" class="clearfix">
    <div id="main" class="clearfix">