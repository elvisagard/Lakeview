<?php
/**
 ** ADVANCED CARD PART - Badge
 **/

        $mBadgeElement = false;
        $bBadgeElement = false;

        // Media Card BADGE variables
        $mBadge_block_id = array_search('m-badge', array_column($content, 'ctx')) ?? false;
        if($mBadge_block_id > -1){
            $mBadgeText = ppx_get_content($content[$mBadge_block_id]['code_view']) ?: false; 
            $mBadgeClass = $content[$mBadge_block_id]['elem_class'] ?: false;  
            $mBadgeAttr = $content[$mBadge_block_id]['elem_attr'] ?: false;  
            $mBadgeTag = $content[$mBadge_block_id]['elem_tag'] ?: false;  
            $mBadgeHref = $content[$mBadge_block_id]['elem_href'] ?: false;  
            
            // Media Badge functionality -------------------------//
            if($mBadgeText){
                if( $mBadgeTag === 'a'){
                    $mBadgeElement = '<a href="' . esc_url( $mBadgeHref ) . '" class="uk-badge ' . esc_attr($mBadgeClass) . '" '. $mBadgeAttr .'>'. $mBadgeText .'</a>';
                }
                elseif( $mBadgeTag === 'span'){
                    $mBadgeElement = '<span class="uk-badge ' . esc_attr($mBadgeClass) . '" '. $mBadgeAttr .'>'. $mBadgeText .'</span>';
                }
            } // end edia Badge functionality
            
        } // end Media Card BADGE variables



        // Body Card BADGE variables
        $bBadge_block_id = array_search('b-badge', array_column($content, 'ctx')) ?? false;
        if($bBadge_block_id > -1){
            $bBadgeText = ppx_get_content($content[$bBadge_block_id]['code_view']) ?: false; 
            $bBadgeClass = $content[$bBadge_block_id]['elem_class'] ?: false;  
            $bBadgeAttr = $content[$bBadge_block_id]['elem_attr'] ?: false;  
            $bBadgeTag = $content[$bBadge_block_id]['elem_tag'] ?: false;  
            $bBadgeHref = $content[$bBadge_block_id]['elem_href'] ?: false;  
            
            // Body Badge functionality -------------------------//
            if($bBadgeText){
                if( $bBadgeTag === 'a'){
                    $bBadgeElement = '<a href="' . esc_url( $bBadgeHref ) . '" class="uk-badge ' . esc_attr($bBadgeClass) . '" '. $bBadgeAttr .'>'. $bBadgeText .'</a>';
                }
                elseif( $bBadgeTag === 'span'){
                    $bBadgeElement = '<span class="uk-badge ' . esc_attr($bBadgeClass) . '" '. $bBadgeAttr .'>'. $bBadgeText .'</span>';
                }
            } // end Body Badge functionality 
            
        } // end Body Card BADGE variables



?>