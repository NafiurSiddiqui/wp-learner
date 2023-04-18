<?php

function university_files()
{
    // wp_enqueue_style('university main styles', get_stylesheet_uri());

    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    // wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', null, '1.0', true);

    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('our-main-styles-vendor', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('our-main-styles', get_theme_file_uri('/build/style-index.css'));

    // wp_localize_script('main-university-js', 'universityData', array(
    //   'root_url' => get_site_url(),
    //   'nonce' => wp_create_nonce('wp_rest')
    // ));

}

add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
    //Dynamic navigation setup

    register_nav_menu('headerMenuLocation', 'Header Menu location');
    register_nav_menu('footerLocationOne', 'Footer location one');
    register_nav_menu('footerLocationTwo', 'Footer location two');
    //Pulls out the title automatically

    add_theme_support('title');

}

add_action('after_setup_theme', 'university_features'); //This is called after the theme is setup or hooked.
