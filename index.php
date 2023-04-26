<!-- Default page for blogs -->
<?php

get_header();

pageBanner([
    'title'=> 'Welcome to our blog',
    'subtitle'=> 'Keep up with our latest news on AI'
])

?>



<div class="container container--narrow page-section">
    <?php
     while(have_posts()) {
         the_post();
         ?>

    <div class="post-item">
        <h2 class="headline headline--medium headline--post-title">
            <a href="
            <?php
             the_permalink();
         ?>
            ">
                <?php
             the_title();
         ?>
            </a>
        </h2>

        <div class="metabox">
            <p>Posted by <?= the_author_posts_link(); ?> on
                <?= the_time('n.j.y')  ?>
                in
                <?= get_the_category_list(', ')  ?>
            </p>
        </div>


        <div class="generic-content">
            <?php
                the_excerpt();
         ?>
            <p><a class="btn btn--blue" href="
         <?php
         the_permalink();
         ?>
         ">Continue Reading</a></p>
        </div>
    </div>

    <?php
     }

    //  pagination
    echo paginate_links();

?>


</div>

<?php

get_footer();
?>
