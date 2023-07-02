<?php
/**
 ** ADVANCED CARD PART - Code
 **/


        $mCodeElement = false;
        $bCodeElement = false;

        // Media CODE variables
        $mCode_block_id = array_search('x-mcode', array_column($content, 'ctx')) ?? false;
        if($mCode_block_id > -1){
            $mCode = ppx_get_code_content($content[$mCode_block_id]['code_view']) ?: false; 
            
            // Media code functionality -------------------------//
            if($mCode){
                $mCodeElement = $mCode ?? false;
            }
            
        }
        

        // body CODE variables
        $bCode_block_id = array_search('x-bcode', array_column($content, 'ctx')) ?? false;
        if($bCode_block_id > -1){
            $bCode = ppx_get_code_content($content[$bCode_block_id]['code_view']) ?: false; 
            
            // Body Code functionality -------------------------//
            if($bCode){
                $bCodeElement = $bCode ?? false;
            }
        }

?>