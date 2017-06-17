<?php
/**
* Plugin Name: Image Lazy Load
* Plugin URI: https://www.wpzinc.com/plugins/image-lazy-load-pro
* Version: 1.1.3
* Author: WP Zinc
* Author URI: https://www.wpzinc.com
* Description: Lazy load images when visible to the user. Save bandwidth, reduce page load times.
*/

/**
 * Image Lazy Load Class
 * 
 * @package     Image Lazy Load
 * @author      Tim Carr
 * @version     1.0.0
 * @copyright   WP Zinc
 */
class Image_Lazy_Load {

    /**
     * Holds the class object.
     *
     * @since   1.0.2
     *
     * @var     object
     */
    public static $instance;

    /**
     * Plugin
     *
     * @since   1.0.0
     *
     * @var object
     */
    public $plugin = '';

    /**
     * Dashboard
     *
     * @since   1.0.5
     *
     * @var     object
     */
    public $dashboard = '';

    /**
     * Constructor. Acts as a bootstrap to load the rest of the plugin
     *
     * @since   1.0.0
     */
    public function __construct() {

        // Plugin Details
        $this->plugin                   = new stdClass;
        $this->plugin->name             = 'image-lazy-load';
        $this->plugin->settings_name    = 'image-lazy-load';
        $this->plugin->displayName      = 'Image Lazy Load';
        $this->plugin->version          = '1.1.3';
        $this->plugin->buildDate        = '2017-02-20 17:00:00';
        $this->plugin->requires         = 3.6;
        $this->plugin->tested           = '4.7.2';
        $this->plugin->folder           = plugin_dir_path( __FILE__ );
        $this->plugin->url              = plugin_dir_url( __FILE__ );
        $this->plugin->documentation_url= 'https://www.wpzinc.com/documentation/image-lazy-load-pro';
        $this->plugin->support_url      = 'https://www.wpzinc.com/support';
        $this->plugin->upgrade_url      = 'https://www.wpzinc.com/plugins/image-lazy-load-pro';
        $this->plugin->review_name      = 'image-lazy-load';
        $this->plugin->review_notice    = sprintf( __( 'Thanks for using %s to lazy load images on your WordPress web site!', $this->plugin->name ), $this->plugin->displayName );

        // Upgrade Reasons
        $this->plugin->upgrade_reasons = array(
            array(
                __( 'Horizontal Scrolling', $this->plugin->name ), 
                __( 'Supports themes which use horizontal scrolling by unveiling images as they appear into view', $this->plugin->name ),
            ),
            array(
                __( 'Responsive Support', $this->plugin->name ), 
                __( 'Full support for lazy loading responsive images which use srcset and size attributes (WordPress 4.4+)', $this->plugin->name ),
            ),
            array(
                __( 'Featured Image Support', $this->plugin->name ), 
                __( 'Lazy loads Featured Images automatically', $this->plugin->name ),
            ),
            array(
                __( 'Lazy Load Iframes', $this->plugin->name ), 
                __( 'Optionally choose to lazy load iframes, including YouTube videos', $this->plugin->name ),
            ),
            array(
                __( 'Lazy Load Videos', $this->plugin->name ), 
                __( 'Optionally choose to lazy load &lt;video&gt; elements', $this->plugin->name ),
            ),
            array(
                __( 'Animations', $this->plugin->name ), 
                __( 'Choose from 17 animations to use when images are displayed (including fade in, bounce, slide in etc)', $this->plugin->name ),
            ),
            array(
                __( 'Loading Animation', $this->plugin->name ), 
                __( 'Upload any loading animation image, such as a spinner, which displays until the image is loaded', $this->plugin->name ),
            ),
            array(
                __( 'Loading Animation Background', $this->plugin->name ), 
                __( 'Optionally define a background color for your loading animation whilst images are loaded into view', $this->plugin->name ),
            ),
            array(
                __( 'Disable', $this->plugin->name ), 
                __( 'Disable lazy loading by individual Post, or on specific Post Types and/or Taxonomies', $this->plugin->name ),
            ),
        );

        // Dashboard Submodule
        if ( ! class_exists( 'WPZincDashboardWidget' ) ) {
            require_once( $this->plugin->folder . '_modules/dashboard/dashboard.php' );
        }
        $this->dashboard = new WPZincDashboardWidget( $this->plugin );

        // Admin
        if ( is_admin() ) {
            // Required class
            require_once( $this->plugin->folder . 'includes/admin/admin.php' );
            require_once( $this->plugin->folder . 'includes/admin/install.php' );
        }

        // Global
        require_once( $this->plugin->folder . 'includes/global/common.php' );
        require_once( $this->plugin->folder . 'includes/global/content.php' );
        require_once( $this->plugin->folder . 'includes/global/settings.php' );
        
    }

    /**
     * Returns the singleton instance of the class.
     *
     * @since 1.0.2
     *
     * @return object Class.
     */
    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

}

// Initialise class
$image_lazy_load = Image_Lazy_Load::get_instance();

// Register activation hooks
register_activation_hook( __FILE__, array( 'Image_Lazy_Load_Pro_Install', 'activate' ) );
add_action( 'activate_wpmu_site', array( 'Image_Lazy_Load_Pro_Install', 'activate_wpmu_site' ) );