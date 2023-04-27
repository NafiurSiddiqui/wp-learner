<?php

//Custom Reusable Component
//args optional
function pageBanner($args = null)
{

    //DEFAULT GUARDS ->

    //title guard
    if(empty($args['title'])) {
        $args['title'] = get_the_title();
    }
    //subtitle guard
    if(empty($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    //Photo guard
    if(empty($args['photo'])) {
        if(get_field('page_banner_background_image') && !is_archive() && !is_home()) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            //fallback
            $args['photo']= get_theme_file_uri('/images/ocean.jpg');
        }


    }


    ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(
        <?php
        // echo get_theme_file_uri('/images/ocean.jpg');
        // $pageBannerImage = get_field('page_banner_background_image');
    // echo $pageBannerImage['url'];
    // echo $pageBannerImage['sizes']['pageBanner']
    echo $args['photo'];
    ?>
    )"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php
            // the_title();
            echo $args['title'];
    ?>
        </h1>
        <div class="page-banner__intro">
            <p>
                <?php
            //ACF FIELDS
            // the_field('page_banner_subtitle');
            echo $args['subtitle'];
    ?>
            </p>
        </div>
    </div>
</div>

<?php
}



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
    //enables the post image on WP dashboard programmatically. so that we do not have to manually upload image associated with that post.
    //NOTE: this alone won't enable the thumbnail option. Look at mu-plugin for more.
    add_theme_support('post-thumbnails');
    //IMAGE SIZE
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    //BACKGROUND IMAGE BANNER
    add_image_size('pageBanner', 1500, 350, true);

}

add_action('after_setup_theme', 'university_features');

//URL manipulation for default WP query

function university_adjust_queries($query)
{
    //We manipulate the query based on the these conditions
    /**
     *
     * @query - default obj we get on function
     * @is_admin - we don't want to mess with admin dashboard
     * is_post_type_arcive - we don't want manipulate anything other than our custom event page
     * is_main_query - we only do this for default WP query but not on anything else.
     */

    if(!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {

        $today = date('Ymd');

        //Custom event rendering
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        //We exclude past posts
        $query->set('meta_query', [
          [
          'key' => 'event_date',
          'compare'=> '>=',
          'value'=> $today,
          'type'=>'numeric'
                    
          ]
    ]);

        if(!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', -1); //To list all (-1)
        }

    }
}

add_action('pre_get_posts', 'university_adjust_queries');





// 👇 This function has been moved to 'mu-plugin' folder inside wp-content folder.
// function university_post_types()
// {
// //NOTE that this custom post types is moved into mu-plugin folder for enforcement.

//     register_post_type('event', [
//         'public'=> true,
//         'labels'=> [
//             'name'=> 'Events',

//         ],
//         'menu_icon'=> 'dashicons-calendar'
//     ]);
// }

// //Crates custom post types
// add_action('init', 'university_post_types');
?>
