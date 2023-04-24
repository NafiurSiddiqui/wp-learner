<!DOCTYPE html>
<html <?php
    language_attributes();
?>>

    <head>
        <meta
            charset="<?php bloginfo('charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        wp_head(); //Helps you deal with the head section automatically.
?>
    </head>

    <body <?php
        body_class();
?> >
        <header class="site-header">
            <div class="container">
                <h1 class="school-logo-text float-left">
                    <a href="
                     <?php
                echo site_url();
// automatically takes you to home page.
?>
                    
                    "><strong>Fictional</strong> University</a>
                </h1>
                <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search"
                        aria-hidden="true"></i></span>
                <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
                <div class="site-header__menu group">
                    <nav class="main-navigation">
                        <ul>
                            <li <?php
                            //check for page slugs OR if the current page is equal to slug-id(e.g: about-us-id)
                                if (is_page('about-us') || wp_get_post_parent_id(0)== 7) {
                                    echo 'class="current-menu-item"';
                                }
?>
                                >

                                <a href="
                            <?php
echo site_url('/about-us');
// automatically takes care of the nav for you.
?>
                            ">About Us</a>
                            </li>
                            <li><a href="#">Programs</a></li>
                            <li <?php
                            if (get_post_type()== 'event' || is_page('past-events')) {
                                echo 'class="current-menu-item"';
                            }
                            

?>

                                ><a href="
                            <?php
echo get_post_type_archive_link('event');
?>
                            ">Events</a></li>
                            <li><a href="#">Campuses</a></li>
                            <li <?php
    if (get_post_type()== 'post') {
        echo 'class="current-menu-item"';
    }

?>
                                ><a href="
                            <?php
echo site_url('/blog');
?>
                            ">Blog</a></li>
                        </ul>
                    </nav>
                    <div class="site-header__util">
                        <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                        <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                        <span class="search-trigger js-search-trigger"><i class="fa fa-search"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </header>
