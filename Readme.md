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

  A must have file with this name in order to show a single post with new layouts.

- ## page.php

  Must have with same WP loops. This tracks pages for your website.

- ## header and footer.php

  Gives you the ability to use reusable header and footer.

- ## functions.php

  To communicate with WP api.

# Visit your theme

Go to wp > dashboard > appearance > activate your custom theme.

# APIs

- Rule Of Thumb: Anything starts with `get_` means, it returns the result. Anything starts with `the` echos out the result for you.
- `get_title` : gets the title of the page.
- `wp_list_pages`: spits out every pages on your site.
- `wp_nav_menu`: registers dynamic menu in the site inside the theme placeholder.

# Dynamicity of the theme

If you want a dynamic navigation for your user, which you should if you are wililng to promote your WP theme on WP themes,you need to register the menu. The way you would do it is put inside the [header]('./header.php') file. We can do that with any navigation. whether it is at the top, bottom, side, anywhere.
