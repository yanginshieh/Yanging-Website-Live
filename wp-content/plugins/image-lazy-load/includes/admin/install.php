<?php
/**
 * Install class
 * 
 * @package Image_Lazy_Load_Pro
 * @author  Tim Carr
 * @version 1.0.0
 */
class Image_Lazy_Load_Pro_Install {

    /**
     * Holds the class object.
     *
     * @since   1.0.2
     *
     * @var     object
     */
    public static $instance;


    /**
     * Activation routine
     * - Creates settings in the options table if they don't already exist
     *
     * @since   1.0.0
     *
     * @param   bool    $network_wide   Network Wide activation
     */
    static public function activate( $network_wide = false ) {

        // Check if we are on a multisite install, activating network wide, or a single install
        if ( is_multisite() && $network_wide ) {
            // Multisite network wide activation
            // Iterate through each blog in multisite, creating table
            $sites = wp_get_sites( array( 
                'limit' => 0 
            ) );
            foreach ( $site as $site ) {
                switch_to_blog( $site->blog_id );
                Image_Lazy_Load_Pro_Settings::get_instance()->setup();
                restore_current_blog();
            }
        } else {
            // Single Site
            Image_Lazy_Load_Pro_Settings::get_instance()->setup();
        }

    }

    /**
     * Activation routine when a WPMU site is activated
     * - Creates settings in the options table if they don't already exist
     *
     * We run this because a new WPMU site may be added after the plugin is activated
     * so will need necessary option settings
     *
     * @since 1.0.0
     */
    static public function activate_wpmu_site( $blog_id ) {

        switch_to_blog( $blog_id );
        $this->activate();
        restore_current_blog();

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