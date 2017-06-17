jQuery( document ).ready(function() {

  jQuery('.nav-rtab-wrapper a[href*="#"]:not([href="#"])').click(function() {
    jQuery('.nav-rtab-wrapper > a').removeClass('nav-tab-active');
    jQuery(this).addClass('nav-tab-active');
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      if (target.length) {
        jQuery('.nav-rtabs  .nav-rtab-holder').css("display", "none");
        jQuery(target).css("display", "block");
        jQuery('.nav-rtab-form').attr("action", "options.php"+target.selector);
        jQuery('html, body').animate({scrollTop : 0},1);
      }
    }
  });

  if(window.location.hash.length) {
    var target = window.location.hash;
    jQuery('.nav-rtabs .nav-rtab-holder').css("display", "none");
    jQuery(target).css("display", "block");
    jQuery('.nav-rtab-wrapper > a').removeClass('nav-tab-active');
    jQuery('.nav-rtab-wrapper a[href="'+target+'"]').each(function(e){
      jQuery(this).addClass('nav-tab-active');
      jQuery('.nav-rtab-form').attr("action", "options.php"+target);
    });
  }

  jQuery( '.wp_theme_settings_color_field' ).wpColorPicker();
  
});

/* Custom Logo Upload */

    jQuery(document).ready(function($) {
        $('.header_logo_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);

            })
            .open();
        });
    });

    jQuery(document).ready(function($) {
        $('.header_favicon_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Favicon Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.favicon_icon').attr('src', attachment.url);
                $('.header_favicon_url').val(attachment.url);

            })
            .open();
        });
    });

    