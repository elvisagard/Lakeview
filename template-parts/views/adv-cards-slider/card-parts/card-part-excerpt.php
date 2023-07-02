<?php
/**
 ** ADVANCED CARD PART - Excerpt
 **/


        $excerptText = false;

        // EXCERPT variables
        $excerpt_block_id = array_search('b-excerpt', array_column($content, 'ctx')) ?? false;
        if($excerpt_block_id > -1){
            $excerptText = ppx_get_content($content[$excerpt_block_id]['code_view']) ?: false; 
            $excerptClass = $content[$excerpt_block_id]['elem_class'] ?: false;  
            $excerptAttr = $content[$excerpt_block_id]['elem_attr'] ?: false;  
        }

?>