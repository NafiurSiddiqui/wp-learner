# Custom Theme

Don't let the name drive you away if you know basics of frontend like, html, css, js.
Hoping you have done with the local setup and know your WP dashboard. Jump right in. Otherwise, Look up for a basic things like setup and WP dashboard nav online.

# Folder structure and fileNaming convention

In the root folder you wanna have an `index.php` and `style.css`. The name here is important and strictly these.

- ## Index.php

  Write something there. To start out.

- ## style.css

  check out [style.css]('./style.css') for further details.

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
