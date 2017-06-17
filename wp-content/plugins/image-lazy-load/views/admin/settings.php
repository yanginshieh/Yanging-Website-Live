<div class="wrap">
    <h2 class="wpzinc">
        <?php echo $this->base->plugin->displayName; ?> 
        &raquo; 
        <?php 
        _e( 'Settings', $this->base->plugin->name ); 
        ?>
    </h2>

    <?php
    // Notices
    foreach ( $this->notices as $type => $notices_type ) {
        if ( count( $notices_type ) == 0 ) {
            continue;
        }
        ?>
        <div class="<?php echo ( ( $type == 'success' ) ? 'updated' : $type ); ?> notice">
            <?php
            foreach ( $notices_type as $notice ) {
                ?>
                <p><?php echo $notice; ?></p>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?> 
    
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <!-- Content -->
            <div id="post-body-content">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable publishing-defaults">  
                    <form id="post" name="post" method="post" action="admin.php?page=<?php echo $page; ?>">            
                        <!-- Settings -->           
                        <div class="postbox">
                            <h3 class="hndle"><?php _e( 'Settings', $this->base->plugin->name ); ?></h3>

                            <div class="option">
                                <div class="left">
                                    <strong><?php _e( 'Load Image', $this->base->plugin->name ); ?></strong>
                                </div>
                                <div class="right">
                                    <input type="number" min="-9999" max="9999" name="<?php echo $this->base->plugin->name; ?>[load]" value="<?php echo $this->get_setting( 'load', 0 ); ?>" />
                                    <?php _e( 'pixels before it reaches the enter the viewport when scrolling vertically.', $this->base->plugin->name ); ?>
                                </div>
                            </div>

                            <div class="option">
                                <label for="mobile">
                                    <div class="left">
                                       <strong><?php _e( 'Enable on Mobile', $this->base->plugin->name ); ?></strong>
                                    </div>
                                    <div class="right">
                                        <input type="checkbox" name="<?php echo $this->base->plugin->name; ?>[mobile]" id="mobile" value="1"<?php echo ( ( $this->get_setting( 'mobile', 0 ) == 1 ) ? ' checked' : '' ); ?> />
                                    </div>
                                </label>
                               
                                <p class="description"><?php _e( 'Lazy loaded items may have an increased delay on mobile devices', $this->base->plugin->name ); ?></p>    
                            </div>
                        </div>
                        <!-- /postbox -->

                        <!-- Save -->
                        <div class="submit">
                            <?php wp_nonce_field( $this->base->plugin->name, $this->base->plugin->name . '_nonce' ); ?>
                            <input type="submit" name="submit" value="<?php _e( 'Save', $this->base->plugin->name ); ?>" class="button button-primary" /> 
                        </div>
                    </form>
                </div>
                <!-- /normal-sortables -->
            </div>
            <!-- /Content -->

            <!-- Sidebar -->
            <div id="postbox-container-1" class="postbox-container">
                <?php require( $this->base->plugin->folder . '/_modules/dashboard/views/sidebar-upgrade.php' ); ?>      
            </div>
            <!-- /Sidebar -->
        </div>
        
        <!-- Upgrade -->
        <div class="metabox-holder columns-1">
            <div id="post-body-content">
                <?php require( $this->base->plugin->folder . '/_modules/dashboard/views/footer-upgrade.php' ); ?>
            </div>
        </div>
    </div>   
</div>