<!-- What you want to see on each pages -->

<?php
//THESE ARE JUST WP API
get_header();

while(have_posts()) {
    the_post();
    //our custom component
    pageBanner();
    ?>


<!-- BreadCrumbs -->
<?php
        // this is how we see if we are child posts.
        $theParent = wp_get_post_parent_id(get_the_ID());
    if ($theParent) {
        ?>
<div class="metabox metabox--position-up metabox--with-home-link">
    <p>
        <a class="metabox__blog-home-link" href="
            <?php
                echo get_permalink($theParent);
        ?>"><i class="fa fa-home" aria-hidden="true"></i>
            Back to
            <?php
        echo get_the_title($theParent); //Get the ID of the post that you looped through.
        ?>
        </a> <span class="metabox__main">
            <?php
                        the_title();
        ?>

            <?php
    }
    ?>
        </span>
    </p>
</div>

<!-- content -->
<div class="container container--narrow page-section">
    <?php

    $testArray = get_pages([
        'child_of'=> get_the_ID()
    ]);

    if ($theParent || $testArray) {
        ?>
    <div class="page-links">
        <h2 class="page-links__title"><a href="
        <?php
                echo get_permalink($theParent);
        ?>
        
        ">
                <?php
                echo get_the_title($theParent);
        ?>
            </a></h2>
        <ul class="min-list">
            <?php

        if($theParent) {
            $findChildrenOf = $theParent;
        } else {
            $findChildrenOf = get_the_ID();
        }
        wp_list_pages([
            'title_li'=> null,
            'child_of'=> $findChildrenOf,
            'sort_column'=> 'menu_order'
        ]);
        ?>
        </ul>
    </div>



    <?php
    }
    ?>

    <div class="generic-content">
        <?php
      the_content();
    ?>
    </div>

</div>



<?php
}
get_footer();

?>
