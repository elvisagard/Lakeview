<?php
/**
 ** ADVANCED CARD PART - Date
 **/

        $mDateElement = false;
        $bDateElement = false;

        // Media DATE variables
        $mDate_block_id = array_search('m-date', array_column($content, 'ctx')) ?? false;
        if($mDate_block_id > -1){
            $mDateText = ppx_get_content($content[$mDate_block_id]['code_view']) ?: false; 
            $mDateClass = $content[$mDate_block_id]['elem_class'] ?: false;  
            $mDateAttr = $content[$mDate_block_id]['elem_attr'] ?: false;  
            $mdate_format = $content[$mDate_block_id]['date_format'];
            if('short' == $mdate_format){$mDateText = date('Y-m-d',strtotime($mDateText));} // yyyy-mm-dd
            if('long' == $mdate_format){$mDateText = date('F j, Y',strtotime($mDateText));} // March 22, 2022
            
            // Media Date functionality -------------------------//
            if($mDateText){
                $mDateElement = '<p class="'. esc_attr($mDateClass) . '" '. $mDateAttr .'>'. $mDateText .'</p>';
            }else{
                $mDateElement = false;
            } // end Media Date functionality
            
        } // Media DATE variables



        // Body DATE variables
        $bDate_block_id = array_search('b-date', array_column($content, 'ctx')) ?? false;
        if($bDate_block_id > -1){
            $bDateText = ppx_get_content($content[$bDate_block_id]['code_view']) ?: false; 
            $bDateClass = $content[$bDate_block_id]['elem_class'] ?: false;  
            $bDateAttr = $content[$bDate_block_id]['elem_attr'] ?: false; 
            $bdate_format = $content[$bDate_block_id]['date_format'];
            if('short'==$bdate_format){$bDateText = date('Y-m-d',strtotime($bDateText));} // yyyy-mm-dd
            if('long'==$bdate_format){$bDateText = date('F j, Y',strtotime($bDateText));} // March 22, 2022
            
            // Body Date functionality -------------------------//
            if($bDateText){
                    $bDateElement = '<p class="'. esc_attr($bDateClass) . '" '. $bDateAttr .'>'. $bDateText .'</p>';
            }else{
                $bDateElement = false;
            } // Body Date functionality
            
        } // end Body DATE variables


?>

