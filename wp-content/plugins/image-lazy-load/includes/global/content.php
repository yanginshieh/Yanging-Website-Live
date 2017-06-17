<?php
/**
 * Content class
 * 
 * @package Image_Lazy_Load_Pro
 * @author Tim Carr
 * @version 1.0
 */
class Image_Lazy_Load_Pro_Content {

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
     * Constructor
     *
     * @since 1.0.0
     */
    public function __construct() {

	 	add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts_css' ) );

    }

    /**
     * Checks to see if Lazy Loading should be disabled on this particular URL
     *
     * Checks global and Post-specific settings
     *
     * @since 1.0.0
     */
    public function frontend_scripts_css() {

        global $post, $wp_query;

        // Get base instance
        $this->base = ( class_exists( 'Image_Lazy_Load_Pro' ) ? Image_Lazy_Load_Pro::get_instance() : Image_Lazy_Load::get_instance() );

        // By default, Lazy Loading is enabled
        // Let's see if there's a setting that disables it
        $instance = Image_Lazy_Load_Pro_Settings::get_instance();

        // Get settings
        $settings = array(
            'load'              => $instance->get_setting( 'load', 0 ),
            'mobile'            => $instance->get_setting( 'mobile', 0 ),
            'animation'         => $instance->get_setting( 'animation', 'fadeIn' ),
        );

        // 1. Mobile: If we're on mobile and loading on mobile is disabled, bail
        $is_mobile = $this->is_mobile();
        if ( $is_mobile && ! $settings['mobile'] ) {
            return;
        }

        // If here, we need to lazy load the images on this URL
        // Load required CSS and JS

        // CSS
        wp_enqueue_style( $this->base->plugin->name . '-frontend', $this->base->plugin->url . 'assets/css/frontend.css', array(), $this->base->plugin->version ); 
        
        // JS
        wp_enqueue_script( $this->base->plugin->name . '-lazyloadxt' , $this->base->plugin->url . 'assets/js/min/jquery.lazyloadxt-min.js', array( 'jquery' ), $this->base->plugin->version, true );
        wp_enqueue_script( $this->base->plugin->name . '-frontend' , $this->base->plugin->url . 'assets/js/min/frontend-min.js', array( 'jquery' ), $this->base->plugin->version, true );
        wp_localize_script( $this->base->plugin->name . '-frontend', 'image_lazy_load', array(
            'load'              => $settings['load'],
            'load_horizontal'   => $settings['load_horizontal'],
        ) );

        // Enable the filters needed to replace images
        add_filter( 'the_content', array( $this, 'replace_content' ) );

    }

    /**
     * Checks if the device viewing a page is a mobile
     *
     * @since   1.0.0
     *
     * @return  bool    Is Mobile
     */
    public function is_mobile() {

        // Get the user agent
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Check if the user is on a mobile device
        if( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$user_agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($user_agent,0,4))){
            // Is a mobile device
            return true;
        }

        // Not a mobile device
        return false; 

    }

    /**
     * Replaces all <img> tags in the content with appropriately formatted tags that lazy loading can use
     *
     * @since   1.0.0
     *
     * @param   string  $content    Content
     * @return  string              Modified Content
     */
    public function replace_content( $content ) {

        // If content is empty, return
        if ( empty( $content ) ) {
            return $content;
        }

        // Load content into DOMDocument
        $doc = new DOMDocument();

        if ( phpversion() <= '5.4.0' ) {
            $doc->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
        } else {
            $doc->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
        }

        // Replace images
        $doc = $this->replace_images( $doc );

        // Get modified HTML
        $html = $doc->saveHTML();
        
        // If HTML if empty, something went wrong - return original content
        if ( empty( $html ) ) {
            return $content;
        }

        // Return HTML
        return $html;
        
    }

    /**
     * Replace images with lazy loaded versions
     *
     * @since   1.0.0
     *
     * @param   object     $doc     DOMDocument
     * @return  object              DOMDocument
     */
    private function replace_images( $doc ) {

        // Get all images
        $images = $doc->getElementsByTagName( 'img' );

        // If no images found, return
        if ( count( $images ) == 0 ) {
            return $doc;
        }

        // Get the attributes to copy and move
        $image_attributes       = Image_Lazy_Load_Pro_Common::get_instance()->get_image_attributes();
        $image_data_attributes  = Image_Lazy_Load_Pro_Common::get_instance()->get_image_data_attributes();

        // Get any classes that we need to exclude from lazy loading
        $exclude_classes = explode( ' ', Image_Lazy_Load_Pro_Settings::get_instance()->get_setting( 'exclude_classes', '' ) );
        
        // Iterate through images
        foreach ( $images as $image ) {
            // Skip this image if it has an excluded class
            if ( count( $exclude_classes ) > 0 ) {
                $classes = explode( ' ', $image->getAttribute( 'class' ) );
                if ( count( $classes ) > 0 ) {
                    foreach ( $classes as $class ) {
                        if ( in_array( $class, $exclude_classes ) ) {
                            // Skip this image from lazy loading
                            continue 2;
                        }
                    }
                }
            }

            // Append a noscript image after this image for backward compat for non-JS users
            $noscript = $doc->createElement( 'noscript' );
            $noscript_node = $image->parentNode->insertBefore( $noscript, $image );

            // Create a new image inside the <noscript>
            $noscript_image = $doc->createElement( 'IMG' ); // Deliberate, lowercase fails
            
            // Copy the following attributes to the noscript image
            foreach ( $image_attributes as $attribute ) {
                // If the attribute's value is empty, skip it
                if ( empty( $image->getAttribute( $attribute ) ) ) {
                    continue;
                }

                $noscript_image->setAttribute( $attribute, $image->getAttribute( $attribute ) );
            }

            // Move the following attributes to data- versions on the original image
            foreach ( $image_data_attributes as $attribute ) {
                $image->setAttribute( 'data-' . $attribute, $image->getAttribute( $attribute ) );
                $image->removeAttribute( $attribute );
            }

            // Set the image src to a transparent image; this ensures no border is displayed when an image
            // has no src
            $image->setAttribute( 'src', 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' );

            // Set the image class
            $image->setAttribute( 'class', $image->getAttribute( 'class' ) . ' lazy' );

            // Assign the fallback image to the noscript
            $noscript_node->appendChild( $noscript_image );

            // Request that the user review the plugin. Notification displayed later,
            // can be called multiple times and won't re-display the notification if dismissed.
            Image_Lazy_Load::get_instance()->dashboard->request_review();

        }

        // Return DOM
        return $doc;

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

// Load the class
$image_lazy_load_pro_content = Image_Lazy_Load_Pro_Content::get_instance();