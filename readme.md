# The Puppy and Kitty Generator

## Overview

A simple WordPress plugin for adding a random puppy or kitty image to your page.

* **Cat API**: [http://www.randomkittengenerator.com](http://www.randomkittengenerator.com)
* **Puppy API**: [http://www.randomdoggiegenerator.com/](http://www.randomdoggiegenerator.com/)

### Widget

A widget is available for adding a random puppy image to your site's sidebar or footer.

### Shortcode

You can add a puppy or kitty to your page using the following shortcodes:

````
[random_puppy]

[random_kitty]

[random_pet]

````


## Known Issues

* Currently only one puppy or kitty is loaded when the page is loaded, meaning multiple copies of the same puppy will be loaded if the shortcode or widget is used more than once. This needs to be fixed by using a better puppy/kitty API
