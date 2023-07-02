<?php
/**
 ** ADVANCED CARD PART - Image
 **/


        // Set Media IMAGE variables
        $image_block_id = array_search('m-image', array_column($content, 'ctx')) ?? false;
        if($image_block_id > -1){
            $mSrc = ppx_get_content($content[$image_block_id]['code_view']) ?: false;
            $mUrl = get_permalink();
            $mAlt = get_post_meta($mSrc, '_wp_attachment_image_alt', true);
            $mClass = 'uk-cover uk-border-rounded'.$space.$content[$image_block_id]['elem_class'] ?: false;
            $mAttr = 'uk-cover'. $space . $content[$image_block_id]['elem_attr'] ?: false;
            $mHref = $content[$image_block_id]['elem_href'] ?: false;
            $mImgWidth = $content[$image_block_id]['img_width'] ?: 300;
            $mImgHeight = $content[$image_block_id]['img_height'] ?: 300;
        }

?>