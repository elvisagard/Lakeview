<?php
//PPX-TTAGS 11.0 RESPONSIVE IMG FUNCTION 
if ( ! function_exists( 'get_img' ) ) :
function get_img($id, $size, $classes = '', $meta = '', $alt = null, $width = null, $height = null, $title = null, $bg = false){
    
    //get_img(id,system size,classes,meta,alt,width,height,title,bg?);
    if($width && $height){
    $meta .= ' width="'.$width.'" height="'.$height.'" ';
    }

    if($alt){
        $meta .= ' alt="'.$alt.'" ';
    }
    if($title){
        $meta .= ' title="'.$title.'" ';
    }
    $meta .= ' class="'.$classes.'"';
    
    
    if( $bg ){
        $data_result = 'data-src="'. wp_get_attachment_image_url( $id, $size ) .'" data-srcset="'. wp_get_attachment_image_srcset( $id, $size ) .'" sizes="'. wp_get_attachment_image_sizes( $id, $size ) .'" uk-img';
        return $data_result;
    }
    else{
        echo '<img uk-img data-src="'. wp_get_attachment_image_url( $id, $size ) .'" 
        data-srcset="'. wp_get_attachment_image_srcset( $id, $size ) .'"
        sizes="'. wp_get_attachment_image_sizes( $id, $size ) .'" '.$meta.'/>';
    }   
}

endif;
