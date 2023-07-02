<?php
function change_logo_class( $html ) {
    
    $html = str_replace( 'custom-logo-link', 'uk-logo uk-navbar-item', $html );
    $html = str_replace( 'custom-logo', 'uk-navbar-item', $html );
    
    return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );