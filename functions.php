<?php

$theme = wp_get_theme();
wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), $theme->get('Version'));
wp_enqueue_style('icons', get_stylesheet_directory_uri().'/fonts/typicons.min.css', array(), $theme->get('Version'));
register_nav_menu('primary', __('Main menu', 'galopin'));