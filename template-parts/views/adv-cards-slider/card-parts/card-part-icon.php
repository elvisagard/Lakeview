<?php
/**
 ** ADVANCED CARD PART - Icon
 **/

        $mIconElement = false;
        $bIconElement = false;


        // Media ICON variables
        $mIcon_block_id = array_search('m-icon', array_column($content, 'ctx')) ?? false;
        if($mIcon_block_id > -1){
            
            $mIconClass = $content[$mIcon_block_id]['elem_class'] ?: false;  
            $mIconElemAttr = $content[$mIcon_block_id]['elem_attr'] ?: false;  
            $mIconTag = $content[$mIcon_block_id]['elem_tag'] ?: false;  
            $mIconHref = $content[$mIcon_block_id]['elem_href'] ?: false;
            $mSvgWidth = $content[$mIcon_block_id]['img_width'] ?: false;
            $mSvgHeight = $content[$mIcon_block_id]['img_height'] ?: false;
            $mImgUpload = $content[$mIcon_block_id]['img_upload'] ?: false;
            
            $mIconOpt = $content[$mIcon_block_id]['icon_opt'] ?: false;
                        
            if( 'code' == $mIconOpt){
                $mIconName = ppx_get_content($content[$mIcon_block_id]['code_view']) ?: false;
                $mIconAttr = $content[$mIcon_block_id]['icon_attr'] ?: false;
                } // end $icon_opt = 'code'
            elseif( 'library' == $mIconOpt ){
                if($mImgUpload){
                    $theIconArray = wp_get_attachment_image_src( $mImgUpload, 'thumbnail', true );
                    $mSvgUrl = $theIconArray[0];
                    $miWidth = $content[$mIcon_block_id]['img_width'] ?: $theIconArray[1];
                    $miHeight = $content[$mIcon_block_id]['img_height'] ?: $theIconArray[2];
                }
            }
            elseif( 'name' == $mIconOpt ){
                    $mIconName = $content[$mIcon_block_id]['icon_name'] ?: false;
                    $mIconAttr = $content[$mIcon_block_id]['icon_attr'] ?: false; 
            } // end $icon_opt = 'name'
            
            // Media Icon functionality -------------------------//
            if($mIconName){
                if($mIconTag === 'a'){
                    $mIconElement = '<a href="' . esc_attr( $mIconHref ) . '" uk-icon="icon: ' . esc_attr( $mIconName ) . '; ' . esc_attr( $mIconAttr ) . '" class="uk-icon-link ' . esc_attr($mIconClass) . '" ' . $mIconElemAttr . '></a>';
                }
                else{
                    $mIconElement = '<span uk-icon="icon: ' .esc_attr( $mIconName ) . '; ' .esc_attr( $mIconAttr ) . '" class="uk-icon ' . esc_attr($mIconClass) . '" ' . $mIconElemAttr . '></span>';
                }
            }elseif($mSvgUrl){
                $mIconElement = '<img src="'. esc_url( $mSvgUrl ) . '" class="' . esc_attr($mIconClass) . '" width="'. $miWidth .'" height="'. $miHeight .'" uk-svg '. $mIconElemAttr .'>';
            }else{
                $mIconElement = false;
            } // end Media Icon functionality
            
        }; // end top level IF statement



        // Body ICON variables

        $bIcon_block_id = array_search('b-icon', array_column($content, 'ctx')) ?? false;
        if($bIcon_block_id > -1){
            
            $bIconClass = $content[$bIcon_block_id]['elem_class'] ?: false;  
            $bIconElemAttr = $content[$bIcon_block_id]['elem_attr'] ?: false;  
            $bIconTag = $content[$bIcon_block_id]['elem_tag'] ?: false;  
            $bIconHref = $content[$bIcon_block_id]['elem_href'] ?: false;
            $bSvgWidth = $content[$bIcon_block_id]['img_width'] ?: false;
            $bSvgHeight = $content[$bIcon_block_id]['img_height'] ?: false;
            $bImgUpload = $content[$bIcon_block_id]['img_upload'] ?: false;
            $bIconOpt = $content[$bIcon_block_id]['icon_opt'] ?: false;
                        
            if( 'code' == $bIconOpt){
                $bIconName = ppx_get_content($content[$bIcon_block_id]['code_view']) ?: false;
                $bIconAttr = $content[$bIcon_block_id]['icon_attr'] ?: false;
                } // end $icon_opt = 'code'
            elseif( 'library' == $bIconOpt ){
                if($bImgUpload){
                    $theBIconArray = wp_get_attachment_image_src( $bImgUpload, 'thumbnail', true );
                    $bSvgUrl = $theBIconArray[0];
                    $biWidth = $content[$bIcon_block_id]['img_width'] ?: $theBIconArray[1];
                    $biHeight = $content[$bIcon_block_id]['img_height'] ?: $theBIconArray[2];
                }
            }
            elseif( 'name' == $bIconOpt ){
                    $bIconName = $content[$bIcon_block_id]['icon_name'] ?: false;
                    $bIconAttr = $content[$bIcon_block_id]['icon_attr'] ?: false; 
            } // end $icon_opt = 'name'
            
            // Body Icon functionality -------------------------//
            if($bIconName ){
                if($bIconTag === 'a'){
                    $bIconElement = '<a href="' . esc_attr( $bIconHref ) . '" uk-icon="icon: ' . esc_attr( $bIconName ) . '; ' . esc_attr( $bIconAttr ) . '" class="uk-icon-link ' . esc_attr($bIconClass) . '" ' . $bIconElemAttr . '></a>';
                }
                elseif($bIconTag === 'span'){
                    $bIconElement = '<span uk-icon="icon: ' .esc_attr( $bIconName ) . '; ' .esc_attr( $bIconAttr ) . '" class="uk-icon ' . esc_attr($bIconClass) . '" ' . $bIconElemAttr . '></span>';
                }
            }elseif($bSvgUrl){
                $bIconElement = '<img src="'. esc_url( $bSvgUrl ) . '" class="' . esc_attr($bIconClass) . '" width="'. $biWidth .'" height="'. $biHeight .'" uk-svg '. $bIconElemAttr .'>';
            }else{
                $bIconElement = false;
            } // end Body Icon functionality
            
        }; // end top level IF statement


?>