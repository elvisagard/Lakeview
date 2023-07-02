<?php
//PPX-TTAGS 10.0 CONTAINER CLASS

wp_cache_set('ppx_enable_container',false);
wp_cache_set('ppx_contentFullWidth','uk-width-1-1');
wp_cache_set('ppx_contentSidebarWidth','uk-width-2-3@m');
wp_cache_set('ppx_sidebarWidth','uk-width-1-3@m');

if ( ! function_exists( 'ppx_starter_enable_container' ) ) :
function ppx_starter_enable_container(){
    
    $ppx_enable_container = wp_cache_get('ppx_enable_container');
    $container_classes = null;
    
    if( $ppx_enable_container ){
        $container_classes = 'uk-container';
    }
    
    return $container_classes;
}

endif;
