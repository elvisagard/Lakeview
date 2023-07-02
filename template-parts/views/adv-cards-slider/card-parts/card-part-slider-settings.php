<?php
/**
 ** ADVANCED CARD PART - Slider Settings
 **/

        
        // Set Slider Variables
        $within_slider      = $settings["within_slider"];
        $with_filter        = $settings["with_filter"];
        $gaps               = $settings["gaps"];
        $slider_classes     = $block_classes ?: $space;
        $taxonomy           = $settings["taxonomy"];
        $comp_wrapper = $settings['card_attr']['comp_wrapper'];
        $fmenu_attrs = $settings['slider_attr']['fmenu'];
        $ul_attrs = $settings['slider_attr']['elem_ul'];
        $arrows_attrs = $settings['slider_attr']['arrows'];
        $dots_attrs = $settings['slider_attr']['dots'];
        $menu_li = $settings['slider_attr']['menu_li'];
        $menu_link = $settings['slider_attr']['menu_link'];

        if($within_slider){
            $dot_nav            = $settings["slider_options"]["dot_nav"];
            $arrow_nav          = $settings["slider_options"]["arrow_nav"];   
        }

        // Filter settings
        $set_filter_on          = isset($settings['filter']['filter_on']) ?: '';
        $set_filter_taxonomy    = isset($settings['filter']['filter_taxonomy']) ?: [];

        //Convert object of taxonomy terms to array
        $tax_temp_array       = isset($settings['filter']['taxonomy_terms']) ?: [];
        $set_filter_terms = json_decode(json_encode($tax_temp_array), true) ;
        $set_filter_tags        = isset($settings['filter']['filter_tags']) ?: [];
?>
