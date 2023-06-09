<?php
//THESE ARE JUST WP API
get_header();


while(have_posts()) {
    the_post();
    pageBanner();
    ?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="
            <?php
                echo site_url('/blog');
    ?>"><i class="fa fa-home" aria-hidden="true"></i>
                Blog Home

            </a> <span class="metabox__main">
                Posted by <?= the_author_posts_link(); ?> on
                <?= the_time('n.j.y')  ?>
                in
                <?= get_the_category_list(', ')  ?>
            </span>
        </p>
    </div>


    <div class="generic-content">
        <?php
    the_content();
    ?>
    </div>



    <?php
}
get_footer();
?>


    <!-- This file helps you to design what you want to see on one single page -->
