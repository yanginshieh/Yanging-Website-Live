<?php
/**
 * Common class
 * 
 * @package Image_Lazy_Load_Pro
 * @author  Tim Carr
 * @version 1.0.0
 */
class Image_Lazy_Load_Pro_Common {

    /**
     * Holds the class object.
     *
     * @since   1.0.2
     *
     * @var     object
     */
    public static $instance;

    /**
     * Helper method to retrieve the <img> HTML attributes which should be copied
     * when cloning the image in the DOM.
     *
     * @since   1.1.1
     *
     * @return  array   Attributes
     */
    public function get_image_attributes() {

        // Define attributes
        $attributes = array(
            'align',
            'alt',
            'border',
            'class',
            'crossorigin',
            'height',
            'hspace',
            'ismap',
            'longdesc',
            'sizes',
            'src',
            'srcset',
            'usemap',
            'vspace',
            'width',
        );

        // Return filtered results
        return apply_filters( 'image_lazy_load_pro_common_get_image_attributes', $attributes );

    }

    /**
     * Helper method to retrieve the <img> HTML attributes which should be moved to data- attributes.
     *
     * @since   1.1.1
     *
     * @return  array   Attributes
     */
    public function get_image_data_attributes() {

        // Define attributes
        $attributes = array(
            'src',
        );

        // Return filtered results
        return apply_filters( 'image_lazy_load_pro_common_get_image_data_attributes', $attributes );

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