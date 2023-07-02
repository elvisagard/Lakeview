<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PPx_Starter_Theme
 */


//PPX-TPLFN 1.0 CONDITIONAL BODY CLASSES
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
include 'template-functions/ppx_starter_body_classes.php';


//NAV MENU HOOKS -----------------

include 'template-functions/uikit_active_class.php';
include 'template-functions/new_submenu_class.php';
include 'template-functions/ppx_excerpt_length.php';
include 'template-functions/new_excerpt_more.php';
//include '/template-functions/change_logo_class.php';


//PPX-TPLFN 5.0 CUSTOM LOGO CLASSES

// Adds uikit code to customizer logo output

add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['class'] )  && 'custom-logo-link' === $attr['class'] ){
        $attr['class'] = 'uk-logo uk-navbar-item';
    }
    if( isset( $attr['class'] )  && 'custom-logo' === $attr['class'] ){
        $attr['class'] = 'uk-navbar-item';
    }
    

    return $attr;
} );