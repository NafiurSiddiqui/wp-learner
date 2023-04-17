<?php
//THESE ARE JUST WP API
get_header();


while(have_posts()) {
    the_post();
    ?>
<h2>
    <?php
    the_title();
    ?>
</h2>

<?php
    the_content();
    ?>

<?php
}
get_footer();
?>


<!-- This file helps you to design what you want to see on one single page -->
