# Custom Theme

Don't let the name drive you away if you know basics of frontend like, html, css, js.
Hoping you have done with the local setup and know your WP dashboard. Jump right in. Otherwise, Look up for a basic things like setup and WP dashboard nav online.

# Folder structure and fileNaming convention

In the root folder you wanna have an `index.php` and `style.css`. The name here is important and strictly these.

- ## Index.php

  Write something there. To start out.

- ## style.css

  check out [style.css]('./style.css') for further details. If you have a builder like parcel, webpack, etc, you wanna register them through functions inside your [functions]('/functions.php'). Check out how we register the style with built-in wp functions.

- At the top you wanna write the theme meta data inside the css comment.

- ## Theme image

  Place your image in the root dir and name it `screenshot.png` strictly. Now you will see the theme picture inside the WP dashboard.

- ## Single.php

  A must have file with this name in order to show a single post with new layouts. Shows posts.

- ## Single-[custom type].php
  This is required when you have a custom post type other than the two basics post type WP gives you.
- ## page.php

  Must have with same WP loops. This tracks pages for your website. Shows pages.

- ## header and footer.php

  Gives you the ability to use reusable header and footer.

- ## functions.php

  To communicate with WP api.

# Visit your theme

Go to wp > dashboard > appearance > activate your custom theme.

# APIs

- Rule Of Thumb: Anything starts with `get_` means, it returns the result. Anything starts with `the` echos out the result for you.So, do use the `echo` or not accordingly.
-
- `is_page`: checks for current page slug (e.g - about us, privacy policy, etc).
- `is_category`: Returns true if the query is for an exisiting category archive page.
- `is_author`: Returns the name of the author.
- `get_title` : gets the title of the page.
- `get_the_category_list`: fetches the category for the post.
- `get_theme_file_uri`: Retrieves the URL of a file in the theme.
- `get_header`: gets the custom header.
- `get_footer`: gets the custom footer.
- `have_posts`: Determines whether current WP query have posts to loop over. `bool`
- `site_url`: Helps you with navigation around the site.
- `single_cat_title`: Gives you the title of a single category.
- `the_permalink`: Fetches the URL for your post.
- `the_content`: fetches the full body of the post.
- `the_excerpt`: fetches excerpt of the text.
- `the_author_posts_link`: fetches the name of the author for the post.
- `the_time`: fetches the date posted.
- `paginate_links`: will paginate your posts. _NOTE_ that the pagination will not appear unless you have X amount of posts based on the WP dashboard > settings.
- `wp_list_pages`: spits out every pages on your site.
- `wp_get_post_parent_id`: gets the id of the parent. Can be used to check for parent or child.
- `wp_nav_menu`: registers dynamic menu in the site inside the theme placeholder.
- `wp_reset_postdata`: Always run this after a custom query while loops.

# Dynamicity of the theme

If you want a dynamic navigation for your user, which you should if you are wililng to promote your WP theme on WP themes,you need to register the menu. The way you would do it is put inside the `header.php` file inside [dynamicHeader-branch]('https://github.com/NafiurSiddiqui/wp-learner/tree/dynamicHeader'). We can do that with any navigation. whether it is at the top, bottom, side, anywhere.

# BLOGGING

By default, WP shows you the most recent 10 blog posts. You can change that from your WP admin dashboard.

# EXCERPT

Typically on blog posts an excerpt of your actual blog context is shown. You can change that by going to wp `dashboard > posts > the post` and look for excerpt under the document from the right side menu.Type whatever you want write and save it.
after that you need to conditionally render the posts card.

For instance, if one of the post has handcrafted post and others do not have, some 55 or 58 words will be shown. In that case, you will have to conditionally render the cards. check out [front-page.php]('/front-page.php') inside _event-summary_ css class.

# CUSTOM QUERY

You make custom query by instantiating `new WP_query([...])`. Look at [front-page]('/front-page.php') for more details.

# POST TYPE

Every WP post is basically two type. Either a `page` or `post` type. You can also build your own `custom post` type. But _REMEMBER_ to go to wp-admin dashboard > settings > permalinks and `save changes`. This will let WP know about our custom dashboard and the right link will rendered.

# WARNINGS ⚠️

_NEVER_ update a theme of a live-website. That can delete the whole existing website.

## mu-plugins

For a custom type posts, must follow the `MUST USE PLUGINS` concept.They live in their own dedicated folder which can not be **deactivated** as long as php files exist inside must use folder. In order to do so, you must create a folder called **mu-plugins** inside your **wp-content** folder. If someone activates a new-theme, mu-plugins will auto activate the necessary updates.
