<?php
/**
 ** ADVANCED CARD PART - Buttons
 **/


        $mLinkElement = false;
        $bLinkElement = false;

        // Set Media BUTTON variables
        $mButton_block_id = array_search('m-link', array_column($content, 'ctx')) ?? false;
        if($mButton_block_id > -1){
            $mButText = ppx_get_content($content[$mButton_block_id]['button_text']) ?: false; // code_view type
            $mButHref = ppx_get_content($content[$mButton_block_id]['button_href']) ?: false; // code_view type
            $mButClass = $content[$mButton_block_id]['elem_class'] ?: false;
            $mButAttr = $content[$mButton_block_id]['elem_attr'] ?: false;
            $mButOpt = $content[$mButton_block_id]['link_opt'] ?: false;            
            
            // Media BUTTON functionality -------------------------//
            if($mButText && $mButHref){
                if( $mButText && $mButHref && $mButOpt === 'link'){
                    $mLinkElement = '<a href="' . esc_url( $mButHref ) . '" class="uk-button ' . esc_attr($mButClass) . '" '. $mButAttr .'>'. $mButText .'</a>';
                }
                elseif( $mButText && $mButHref && $mButOpt === 'button'){
                    $mLinkElement = '<button class="uk-button ' . esc_attr($mButClass) . '" '. $mButAttr .'>'. $mButText .'</button>';
                }
            }else{
                $mLinkElement = false;
            }
            
        } // end Media BUTTON variables



        // Set Body BUTTON variables
        $bButton_block_id = array_search('b-link', array_column($content, 'ctx')) ?? false;
        if($bButton_block_id > -1){
            $bButText = ppx_get_content($content[$bButton_block_id]['button_text']) ?: false; // code_view type
            $bButHref = ppx_get_content($content[$bButton_block_id]['button_href']) ?: false; // code_view type
            $bButClass = $content[$bButton_block_id]['elem_class'] ?: false;
            $bButAttr = $content[$bButton_block_id]['elem_attr'] ?: false;
            $bButOpt = $content[$bButton_block_id]['link_opt'] ?: false;
            
            // Body BUTTON functionality -------------------------//
            if($bButText && $bButHref){
                if( $bButText && $bButHref && $bButOpt === 'link'){
                    $bLinkElement = '<a href="' . esc_url( $bButHref ) . '" class="uk-button ' . esc_attr($bButClass) . '" '. $bButAttr .'>'. $bButText .'</a>';
                }
                elseif( $bButText && $bButHref && $bButOpt === 'button'){
                    $bLinkElement = '<button class="uk-button ' . esc_attr($bButClass) . '" '. $bButAttr .'>'. $bButText .'</button>';
                }
            }else{
                $bLinkElement = false;
            }
            
        } // end Body BUTTON variables
        
        $button_exists = $mLinkElement || $bLinkElement ? true : false;

?>