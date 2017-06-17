<?php
/**
 * Settings class
 * 
 * @package Image_Lazy_Load_Pro
 * @author  Tim Carr
 * @version 1.0
 */
class Image_Lazy_Load_Pro_Settings {

    /**
     * Holds the class object.
     *
     * @since 1.0.2
     *
     * @var object
     */
    public static $instance;

    /**
     * Checks whether any settings exist in the options table.
     *
     * If not, creates the defaults we need and saves them
     *
     * @since   1.0.0
     */
    public function setup() {

        // Get settings
        $settings = Image_Lazy_Load_Pro_Settings::get_instance()->get_settings();

        // If no settings, create them
        if ( ! $settings || empty( $settings ) || ! is_array( $settings ) ) {
            $settings = array(
                'load'          => 0,
                'mobile'        => 0,
                'loading_image' => '',
            );

            Image_Lazy_Load_Pro_Settings::get_instance()->update_settings( $settings );
        }

    }

    /**
     * Retrieves a setting from either the options table or Post Meta.
     *
     * Safely checks if the key(s) exist before returning the default
     * or the value.
     *
     * @since   1.0.0
     *
     * @param   string  $key        Setting key value to retrieve
     * @param   string  $default    Default Value
     * @return  string              Value/Default Value
     */
    public function get_setting( $key, $default = '', $post_id = 0 ) {

        // Get settings
        $settings = $this->get_settings( $post_id );

        // Convert string to keys
        $keys = explode( '][', $key );
        
        foreach ( $keys as $count => $key ) {
            // Cleanup key
            $key = trim( $key, '[]' );

            // Check if key exists
            if ( ! isset( $settings[ $key ] ) ) {
                return $default;
            }

            // Key exists - make settings the value (which could be an array or the final value)
            // of this key
            $settings = $settings[ $key ];
        }

        // If here, setting exists
        return $settings; // This will be a non-array value

    }

    /**
     * Returns the settings for the given Post Type
     *
     * @since   1.0.0
     *
     * @param   int    $post_id     Post ID (0 = get from WordPress options table)
     * @return  array               Settings
     */
    public function get_settings( $post_id = 0 ) {

        // Get settings from either the Post meta or Options table
        if ( $post_id > 0 ) {
            $settings = get_post_meta( $post_id, 'image-lazy-load', true );
        } else {
            $settings = get_option( 'image-lazy-load' );
        }

        // Allow devs to filter before returning
        $settings = apply_filters( 'image_lazy_load_pro_settings_get_settings', $settings, $post_id );

        // Return result
        return $settings;

    }

    /**
     * Stores the given settings for the given Post Type in Post Meta or the Options table
     *
     * @since   1.0.0
     *
     * @param   array   $settings   Settings
     * @param   int     $post_id    Post ID (0 = update to WordPress options table)
     * @return  bool                Success
     */
    public function update_settings( $settings, $post_id = 0 ) {

        // Allow devs to filter before saving
        $settings = apply_filters( 'image_lazy_load_pro_settings_update_settings', $settings, $post_id );

        // Save against post meta or options
        if ( $post_id > 0 ) {
            update_post_meta( $post_id, 'image-lazy-load', $settings );
        } else {
            update_option( 'image-lazy-load', $settings );
        }

        // update_option returns false if no changes were made, even if the save was successful
        // so we return true manually
        return true;

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