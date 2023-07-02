<?php
//PPX-TPLFN 3.0 CUSTOM SUBMENU
// Wraps wp submenus in uikit dropdown code
function new_submenu_class($menu) {
    
    // String determined by menu #id added via 'wp_nav_menu'
    $desktopid = 'primary-menu';
    $mobileid = 'mobile-menu';
    
    //PPX-TPLFN 3.1 DESKTOP DROPDOWN MARKUP
    if(strpos($menu, $desktopid)){
        $menu = preg_replace('/<ul class="sub-menu">/','<div class="uk-navbar-dropdown"><ul class="uk-nav uk-navbar-dropdown-nav">',$menu);        
        $menu = preg_replace('%</ul></li>%','</ul></div></li>',$menu);
    }
    
    //PPX-TPLFN 3.2 ADD CLASSES TO SUBMENU ON MOBILE
    elseif(strpos($menu, $mobileid)){
        $menu = preg_replace('/<ul class="sub-menu">/','<ul class="uk-nav-sub">',$menu);
        $menu = preg_replace('/id="'.$mobileid.'"/','id="'.$mobileid.'" uk-nav',$menu);
    }
    
    return $menu;      
}
add_filter('wp_nav_menu','new_submenu_class'); 
