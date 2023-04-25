<?php
//THESE ARE JUST WP API
get_header();


while(have_posts()) {
    the_post();
    ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(
        <?php
        echo get_theme_file_uri('/images/ocean.jpg');
    ?>
    )"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php
            the_title();
    ?>
        </h1>
        <div class="page-banner__intro">
            <p>Placholder.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="
            <?php
            //Should be dynamic be cause we never know if we change it
                echo get_post_type_archive_link('program');
    ?>"><i class="fa fa-home" aria-hidden="true"></i>
                All Programs

            </a> <span class="metabox__main">
                <?php
               the_title();
    ?>
            </span>
        </p>
    </div>



    <div class="generic-content">
        <?php
    the_content();
    ?>
    </div>

    <!-- Custom Query: To establish relationship -->
    <?php
$relatedProfessor = new WP_Query([
       'posts_per_page'=> -1,
       'post_type' => 'professor',
       'orderby'=> 'title',
       'order'=> 'ASC',
       //conditional rendering
       'meta_query'=>[
        
           //This only fetches post related to the program
           [
               'key' => 'related_programs',
               'compare'=> 'LIKE',
               'value'=> '"'.get_the_ID().'"'
           ]
       ]
   ]);

    //Outputting related professor
    if ($relatedProfessor->have_posts()) {
        echo '
    <hr class="section-break">
    <h2 class="headline headline--medium" >
    '. get_the_title() .' Professor
    </h2>

    <ul class="professor-cards">
    ';
        while($relatedProfessor->have_posts()) {
            $relatedProfessor->the_post();
            ?>
    <li class="professor-card__list-item">
        <a class="professor-card" href="
        <?php
            the_permalink()
            ?>
        ">
            <img src="
        <?php
        the_post_thumbnail_url('professorLandscape');
            ?>
        " alt="" class="professor-card__image">
            <span class="professor-card__name">
                <?php
                the_title();
            ?>
            </span>
        </a>
    </li>

    <?php
        }
        echo '</ul>';

    }

    //Without resetting data we won't get the actual data from query methods like get_ID, title, etc. Hence we won't see the EVENT POST below Learn more about this online.
    wp_reset_postdata();

    $today = date('Ymd');
    // CUSTOM QUERY : NOTE that this only applies to this page.
    $homepageEvents = new WP_Query([
        'posts_per_page'=> 2,//to get all the posts
        'post_type' => 'event',
        'meta_key'=>'event_date',
        'orderby'=> 'meta_value_num',
        'order'=> 'ASC',
        //conditional rendering
        'meta_query'=>[
            [
            'key' => 'event_date',
            'compare'=> '>=',
            'value'=> $today,
            'type'=>'numeric'
                    
            ],
            //This only fetches post related to the program
            [
                'key' => 'related_programs',
                'compare'=> 'LIKE',
                'value'=> '"'.get_the_ID().'"'
            ]
        ]
    ]);

  

    //Outputting related events

    //We dont wanna show upcoming events if there is no related events for this program
    if ($homepageEvents->have_posts()) {
        echo '
    <hr class="section-break">
    <h2 class="headline headline--medium" >
    Upcoming '. get_the_title() .' Events
    </h2>
    ';
        while($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            ?>
    <div class="event-summary">
        <a class="event-summary__date t-center" href="
               #
                ">
            <span class="event-summary__month">
                <?php
                                /**
                                 * @get_field - ACF - plugin function
                                 */
                                $eventDate = new DateTime(get_field('event_date'));
            echo $eventDate->format('M');
            ?>
            </span>
            <span class="event-summary__day">
                <?php
                       
echo $eventDate->format('d');
            ?>
            </span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
                <a href="
                        <?php
                the_permalink();
            ?>
                        ">
                    <?php
                        the_title();
            ?>
                </a>
            </h5>
            <p>
                <?php
                               if (has_excerpt()) {
                                   echo get_the_excerpt();
                               } else {
                                   echo wp_trim_words(get_the_content(), 10);
                               };
            ;
            ?>
                <a href="
                          <?php
                                the_permalink();
            ?>
                        " class="nu gray">Learn more</a>
            </p>
        </div>
    </div>
    <?php
        }

    }

    ?>
</div>

<?php
}
get_footer();
?>


<!-- This file helps you to design what you want to see on one single page -->
