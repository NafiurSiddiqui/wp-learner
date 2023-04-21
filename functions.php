<?php

// function university_files()
// {
//     // wp_enqueue_style('university main styles', get_stylesheet_uri());

//     wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
//     wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

//     wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
//     wp_enqueue_style('our-main-styles-vendor', get_theme_file_uri('/build/index.css'));
//     wp_enqueue_style('our-main-styles', get_theme_file_uri('/build/style-index.css'));

//     // wp_localize_script('main-university-js', 'universityData', array(
//     //   'root_url' => get_site_url(),
//     //   'nonce' => wp_create_nonce('wp_rest')
//     // ));

// }

function university_files()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', null, '1.0', true);
    wp_enqueue_script('axios', '//cdn.jsdelivr.net/npm/axios/dist/axios.min.js', null, '1.0', true);
    wp_enqueue_script('glidejs', '//cdn.jsdelivr.net/npm/@glidejs/glide', null, '1.0', true);

    wp_enqueue_script('main-university-js', get_theme_file_uri('/scripts.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());

    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url(),
      'nonce' => wp_create_nonce('wp_rest')
    ));
}


add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
    add_theme_support('title'); //Pulls out the title automatically
}

add_action('after_setup_theme', 'university_features');
//Crates custom post types
add_action('init', 'university_post_types');
