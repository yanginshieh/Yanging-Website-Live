<?php
/**
 * Administration class
 * 
 * @package Image_Lazy_Load_Pro
 * @author  Tim Carr
 * @version 1.0.0
 */
class Image_Lazy_Load_Pro_Admin {

    /**
     * Holds the class object.
     *
     * @since   1.0.2
     *
     * @var     object
     */
    public static $instance;

    /**
     * Holds the base class object.
     *
     * @since   1.0.5
     *
     * @var     object
     */
    public $base;

    /**
     * Holds success and error notices
     *
     * @since   1.1.0
     *
     * @var     array
     */
    public $notices = array(
        'success'   => array(),
        'error'     => array(),
    );

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    public function __construct() {

        // Admin CSS, JS, Menu and Meta Boxes
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        
    }


    /**
     * Add the Plugin to the WordPress Administration Menu
     *
     * @since 1.0.0
     */
    public function admin_menu() {

        // Get base instance
        $this->base = ( class_exists( 'Image_Lazy_Load_Pro' ) ? Image_Lazy_Load_Pro::get_instance() : Image_Lazy_Load::get_instance() );
        
        // Licensing
        add_menu_page( $this->base->plugin->displayName, $this->base->plugin->displayName, 'manage_options', $this->base->plugin->name, array( $this, 'settings_screen' ), 'dashicons-images-alt' );
        
        // Add any other submenu pages now
        do_action( 'image_lazy_load_pro_admin_menu' );

    }

    /**
     * Output the Settings Screen
     * Save POSTed data from the Administration Panel into a WordPress option
     *
     * @since   1.0.0
     */
    public function settings_screen() {

        // Page
        $page = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( $_REQUEST['page'] ) : '' );

        // Maybe save settings
        $result = $this->save_settings();
        if ( is_string( $result ) ) {
            // Error - add to array of errors for output
            $this->notices['error'][] = $result;
        } elseif ( $result === true ) {
            // Success
            $this->notices['success'][] = __( 'Settings saved successfully.', $this->base->plugin->name ); 
        }

        // Load View
        include_once( $this->base->plugin->folder . '/views/admin/settings.php' );  

    } 

    /**
     * Helper method to save settings
     *
     * @since   1.0.0
     *
     * @return  mixed   Error String on error, true on success
     */
    public function save_settings() {

        // Check if a POST request was made
        if ( ! isset( $_POST['submit'] ) ) {
            return false;
        }

        // Run security checks
        // Missing nonce 
        if ( ! isset( $_POST[ $this->base->plugin->name . '_nonce' ] ) ) { 
            return __( 'Nonce field is missing. Settings NOT saved.', $this->base->plugin->name );
        }

        // Invalid nonce
        if ( ! wp_verify_nonce( $_POST[ $this->base->plugin->name . '_nonce' ], $this->base->plugin->name ) ) {
            return __( 'Invalid nonce specified. Settings NOT saved.', $this->base->plugin->name );
        }

        // Save settings
        return Image_Lazy_Load_Pro_Settings::get_instance()->update_settings( $_POST[ $this->base->plugin->name ] );

    }

    /**
     * Helper method to get the setting value from the plugin settings
     *
     * @since 1.0.0
     *
     * @param string    $key       Setting Key
     * @param mixed     $default   Default Value if Setting does not exist
     * @return mixed               Value
     */
    public function get_setting( $key = '', $default = '' ) {

        return Image_Lazy_Load_Pro_Settings::get_instance()->get_setting( $key, $default );

    }

    /**
     * Loads plugin textdomain
     *
     * @since 1.0.5
     */
    public function load_language_files() {

        load_plugin_textdomain( $this->base->plugin->name, false, $this->base->plugin->name . '/languages/' );

    } 

    /**
     * Returns the singleton instance of the class.
     *
     * @since   1.0.2
     *
     * @return  object Class.
     */
    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

}

// Load the class
$image_lazy_load_pro_admin = Image_Lazy_Load_Pro_Admin::get_instance();