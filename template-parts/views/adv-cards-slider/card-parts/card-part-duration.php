<?php
/**
 ** ADVANCED CARD PART - Duration
 **/



        $mDurElement = false;
        $bDurElement = false;

        // Media DURATION variables
        $mDur_block_id = array_search('m-dur', array_column($content, 'ctx')) ?? false;
        if($mDur_block_id > -1){
            $mDurText = ppx_get_content($content[$mDur_block_id]['code_view']) ?: false; 
            $mDurClass = $content[$mDur_block_id]['elem_class'] ?: false;  
            $mDurAttr = $content[$mDur_block_id]['elem_attr'] ?: false;  
            
            // Media Duration functionality -------------------------//
            if($mDurText){
                $mDurElement = '<p class="'. esc_attr($mDurClass) . '" '. $mDurAttr .'>'. $mDurText .'</p>';
            }else{
                $mDurElement = false;
            } // end Media Duration functionality
            
        } // end Media DURATION variables



        // Body Duration variables
        $bDur_block_id = array_search('b-dur', array_column($content, 'ctx')) ?? false;
        if($bDur_block_id > -1){
            $bDurText = ppx_get_content($content[$bDur_block_id]['code_view']) ?: false; 
            $bDurClass = $content[$bDur_block_id]['elem_class'] ?: false;  
            $bDurAttr = $content[$bDur_block_id]['elem_attr'] ?: false;  
            
            // Body Duration functionality -------------------------//
            if($bDurText){
                $bDurElement = '<p class="'. esc_attr($bDurClass) . '" '. $bDurAttr .'>'. $bDurText .'</p>';
            }else{
                $bDurElement = false;
            } // Body Duration functionality
            
        } // end Body Duration variables



?>