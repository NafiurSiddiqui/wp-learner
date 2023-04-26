<!-- Default page for list of /past-events -->
<?php

get_header();
pageBanner([
    'title'=> 'Past Events',
    'subtitle'=> 'Recap of our prompt hangout!'
])
?>


<div class="container container--narrow page-section">
    <?php

    //Get post only less than today

    $today = date('Ymd');
// CUSTOM QUERY : NOTE that this only applies to this page.
$pastEvents = new WP_Query([
    'paged'=> get_query_var('paged', 1), //This makes sure you get the proper result and number 1 is fallback in case there is no other pages.
    'post_type' => 'event',
    'meta_key'=>'event_date',
    'orderby'=> 'meta_value_num',
    'order'=> 'ASC',
    //conditional rendering
    'meta_query'=>[
        [
        'key' => 'event_date',
        'compare'=> '<',
        'value'=> $today,
        'type'=>'numeric'
                    
        ]
    ]
]);



while($pastEvents->have_posts()) {
    $pastEvents->the_post();
    get_template_part('/template-parts/content-event');
}

//  pagination
echo paginate_links([
    'total'=> $pastEvents->max_num_pages
]);

?>


</div>

<?php

get_footer();
?>
