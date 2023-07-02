<?php
//PPX-TPLFN 2.0 UIKIT MENU ITEM CLASSES
function uikit_active_class ( $classes, $item ) { 
    
    //PPX-TPLFN 2.1 UIKIT ACTIVE CLASS
    // Adds uikit active class to the current menu item
    if ( $item->current || $item->current_item_ancestor ) {
        $classes[] = 'uk-active';
    }
    
    //PPX-TPLFN 2.2 UIKIT PARENT CLASS
    // Adds uikit parent class to li's with a submenu
    elseif ( in_array('menu-item-has-children', $classes) ) {
        $classes[] = 'uk-parent';
    }
    
    //print_r($item);
    return $classes;
}

add_filter( 'nav_menu_css_class', 'uikit_active_class', 10, 2 );
