<?php
/**
 ** ADVANCED CARD/PANEL BACKGROUND - 
 ** Useful when card or thumbnail backgrounds are not to be all the same
 **/

        // Media ICON variables
        $bg_hex_color = null;
        $bg_block_id = array_search('x-bg', array_column($content, 'ctx')) ?? null;
        if($bg_block_id > -1){
            $bg_hex_color = ppx_get_content($content[$bg_block_id]['code_view']);
            if($bg_hex_color){
                $card_bg = null;
                $thumb_bg = null;
                $bg_color_string = ' style="background-color:'.$bg_hex_color.';" ';
            }

        }; // end top level IF statement
