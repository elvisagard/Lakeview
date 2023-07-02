<?php
/**
 ** ADVANCED CARD PART - Card Badge
 **/

        $mCBadgeElement = false;
        $bCBadgeElement = false;

        // Media Card BADGE variables
        $mCBadge_block_id = array_search('m-cbadge', array_column($content, 'ctx')) ?? false;
        if($mCBadge_block_id > -1){
            $mCBadgeText = ppx_get_content($content[$mCBadge_block_id]['code_view']) ?: false; 
            $mCBadgeClass = $content[$mCBadge_block_id]['elem_class'] ?: false;  
            $mCBadgeAttr = $content[$mCBadge_block_id]['elem_attr'] ?: false;  
            $mCBadgeTag = $content[$mCBadge_block_id]['elem_tag'] ?: false;  
            $mCBadgeHref = $content[$mCBadge_block_id]['elem_href'] ?: false;  
            
            // Media Card Badge functionality -------------------------//
            if($mCBadgeText){            
                if( $mCBadgeTag === 'a'){
                    $mCBadgeElement = '<a href="' . esc_url( $mCBadgeHref ) . '" class="uk-card-badge ' . esc_attr($mCBadgeClass) . '" '. $mCBadgeAttr .'>'. $mCBadgeText .'</a>';
                }
                elseif( $mCBadgeTag === 'span'){
                    $mCBadgeElement = '<span class="uk-card-badge ' . esc_attr($mCBadgeClass) . '" '. esc_attr( $mCBadgeAttr ) .'>'. $mCBadgeText .'</span>';
                }else{
                    $mCBadgeElement = '<div class="uk-card-badge ' . esc_attr($mCBadgeClass) . '" '. esc_attr( $mCBadgeAttr ) .'>'. $mCBadgeText .'</div>';
                }
            }else{
                $mCBadgeElement = false;
            } // end Media Card Badge functionality
            
        } // Media Card BADGE variables



        // Body Card BADGE variables
        $bCBadge_block_id = array_search('b-cbadge', array_column($content, 'ctx')) ?? false;
        if($bCBadge_block_id > -1){
            $bCBadgeText = ppx_get_content($content[$bCBadge_block_id]['code_view']) ?: false; 
            $bCBadgeClass = $content[$bCBadge_block_id]['elem_class'] ?: false;  
            $bCBadgeAttr = $content[$bCBadge_block_id]['elem_attr'] ?: false;  
            $bCBadgeTag = $content[$bCBadge_block_id]['elem_tag'] ?: false;  
            $bCBadgeHref = $content[$bCBadge_block_id]['elem_href'] ?: false;  
            
            // Body Card Badge functionality -------------------------//
            if($bCBadgeText){
                if( $bCBadgeTag === 'a'){
                    $bCBadgeElement = '<a href="' . esc_url( $bCBadgeHref ) . '" class="uk-card-badge ' . esc_attr($bCBadgeClass) . '" '. $bCBadgeAttr .'>'. $bCBadgeText .'</a>';
                }
                elseif( $bCBadgeTag === 'span'){
                    $bCBadgeElement = '<span class="uk-card-badge ' . esc_attr($bCBadgeClass) . '" '. $bCBadgeAttr .'>'. $bCBadgeText .'</span>';
                }else{
                    $bCBadgeElement = '<div class="uk-card-badge ' . esc_attr($bCBadgeClass) . '" '. $bCBadgeAttr  .'>'. $bCBadgeText .'</div>';
                }
            }else{
                $bCBadgeElement = false;
            } // Body Card Badge functionality
            
        } // end Body Card BADGE variables


?>