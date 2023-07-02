<?php
//PPX-TTAGS 15.0 GET FIRST IMAGE FROM POST OR DEFAULT IMG
//src: https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post
if ( ! function_exists( 'ppx_first_img' ) ) : 
    function ppx_first_img(){ 
        
        global $post, $posts;
        $first_img_url = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
        $first_img_url = $matches[1][0];
        
        //Check for attchment ID
        $first_img_id = ppx_id_from_url( $first_img_url );
        
        // If nothing ID of default image
        if($first_img_url) {
          $first_img_id = "44"; //Enter default attachment id
        }
        return $first_img_id;
    }
endif;
