<?php
/**
 ** ADVANCED CARD PART - Title
 **/


        $titleText = false;

        // TITLE variables
        $title_block_id = array_search('b-title', array_column($content, 'ctx')) ?? false;
        if($title_block_id > -1){
            $titleText = ppx_get_content($content[$title_block_id]['code_view']) ?: false; 
            $titleClass = $content[$title_block_id]['elem_class'] ?: false;  
            $titleAttr = $content[$title_block_id]['elem_attr'] ?: false;  
        } 

?>