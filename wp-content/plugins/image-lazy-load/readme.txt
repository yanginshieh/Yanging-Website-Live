=== Image Lazy Load ===
Contributors: n7studios,wpzinc
Donate link: https://www.wpzinc.com/plugins/image-lazy-load-pro
Tags: lazy load, lazy loading, lazy-load, lazy,load, lazy-loading, lazyload, image, images, optimization, performance, caching, cache, unveil, unveil.js
Requires at least: 3.6
Tested up to: 4.7.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lazy load images to improve site performance, load times and reduce server bandwidth by only loading images when they're visible.

== Description ==

Loads images within the main WordPress Page, Post or Custom Post Type content when each image is visible to the site visitor.  This helps reduce load times, increase site performance and reduce server bandwidth by only loading images when they're truly needed.

> #### Image Lazy Load Pro
> <a href="https://www.wpzinc.com/plugins/image-lazy-load-pro/" rel="friend" title="Image Lazy Load Pro - WordPress Image, Video and iframe Lazy Loading">Image Lazy Load Pro</a> provides additional functionality:<br />
>
> - Horizontal Scrolling: Supports themes which use horizontal scrolling by unveiling images as they appear into view<br />
> - Responsive Support: Full support for lazy loading responsive images which use srcset and size attributes (WordPress 4.4+)<br />
> - Featured Image Support: Lazy loads Featured Images automatically<br />
> - Lazy Load Iframes: Optionally choose to lazy load iframes, including YouTube videos<br />
> - Lazy Load Videos: Optionally choose to lazy load <video> elements<br />
> - Animations: Choose from 17 animations to use when images are displayed (including fade in, bounce, slide in etc)<br />
> - Loading Animation: Upload any loading animation image, such as a spinner, which displays until the image is loaded<br />
> - Loading Animation Background: Optionally define a background color for your loading animation whilst images are loaded into view<br />
> - Disable: Disable lazy loading by individual Post, or on specific Post Types and/or Taxonomies<br />
> - Support: Access to one on one email support<br />
> - Documentation: Detailed documentation on how to install and configure the plugin<br />
> - Updates: Receive one click update notifications, right within your WordPress Adminstration panel<br />
> - Seamless Upgrade: Retain all current settings when upgrading to Pro<br />
>
> [Upgrade to Image Lazy Load Pro](https://www.wpzinc.com/plugins/image-lazy-load-pro/)

= Support =

We will do our best to provide support through the WordPress forums. However, please understand that this is a free plugin, 
so support will be limited. Please read this article on <a href="http://www.wpbeginner.com/beginners-guide/how-to-properly-ask-for-wordpress-support-and-get-it/">how to properly ask for WordPress support and get it</a>.

If you require one to one email support, please consider <a href="https://www.wpzinc.com/plugins/image-lazy-load-pro" rel="friend">upgrading to the Pro version</a>.

= WP Zinc =
We produce free and premium WordPress Plugins that supercharge your site, by increasing user engagement, boost site visitor numbers
and keep your WordPress web sites secure.

Find out more about us at <a href="https://www.wpzinc.com" rel="friend" title="Premium WordPress Plugins">wpzinc.com</a>

== Installation ==

1. Upload the `image-lazy-load` folder to the `/wp-content/plugins/` directory
2. Active the Image Lazy Load plugin through the 'Plugins' menu in WordPress
3. Configure the plugin by going to the `Image Lazy Load` menu that appears in your admin menu

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.1.3 =
* Added: Review Helper to check if the user needs help
* Updated: Dashboard Submodule

= 1.1.2 =
* Fix: Compatibility for PHP 5.2, 5.3

= 1.1.1 =
* Fix: Correctly output elements in <noscript> tags, so users without JS will just see non-lazy loaded content as normal.
* Fix: Safari OSX and iOS compatibility
* Fix: Prevent image displaying, and then fading in to display again

= 1.1.0 =
* Fix: Bumped version to match Free version, to avoid confusion that our Free version is newer (it's not)
* Fix: Abstracted settings name to variable
* Updated: Lazy Load XT to 1.1.0
* Updated: Animate.css to 3.5.1

= 1.0.9 =
* Fix: Changed branding from WP Cube to WP Zinc

= 1.0.8 =
* Tested with WordPress 4.4
* Added: Translations now use wordpress.org's translations, not PO/MO files within the plugin
* Added: Load image pixel offset is now a free number input (0 to 9999px)
* Added: Nonces when saving settings
* Added: Sanitize settings to ensure they're numbers when saving

= 1.0.7 =
* Tested with WordPress 4.3
* Fix: plugin_dir_path() and plugin_dir_url() used for Multisite / symlink support

= 1.0.6 =
* Fix: Dashboard errors
* Fix: Changed Menu Icon
* Fix: WordPress 4.0 compatibility
* Fix: Removed unused admin CSS

= 1.0.5 =
* Added unveil-ui.min.js, which was wrongly removed in a previous update and causing console.log errors

= 1.0.4 =
* Added translation support and .pot file

= 1.0.3 =
* JS optimisation enhancements

= 1.0.2 =
* Dashboard CSS + JS enhancements

= 1.0.1 =
* Added option to enable or disable Lazy Loading on mobile devices

= 1.0 =
* First release.

== Upgrade Notice ==
