<?php
//PPX-TTAGS 3.0 AUTHOR META
if ( ! function_exists( 'ppx_starter_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ppx_starter_posted_by($type = '', $show_date = false) {
        
        $author_id = get_the_author_meta('ID');
        $author_prefix = '';
        $author_pic = get_field('profile_picture', 'user_'. $author_id );
        $author_position = get_field('position', 'user_'. $author_id );
        
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( $author_prefix.'%s', 'post author', 'lv-base' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		
        if($type == 'grid' && ! $show_date){
            ppx_author_grid($byline, $author_pic, $author_position);
        }
        elseif($type == 'grid' && $show_date){
            ppx_author_grid($byline, $author_pic, $author_position, true); 
        }
        elseif($type == 'line' && $show_date){
            ppx_author_line($byline, null, null, true); 
        }
        else{
            echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
        }
        

	}
endif;
