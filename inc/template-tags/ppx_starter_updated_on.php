<?php
//PPX-TTAGS 2.0 UPDATED DATE / TIME META
if ( ! function_exists( 'ppx_starter_updated_on' ) ) :
	/**
	 * Prints current post's update time.
	 */
	function ppx_starter_updated_on($link = true) {
        $update_prefix = 'Updated ';
        $update_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $update_string = '<time class="updated" datetime="%3$s">%4$s</time>';
        }
        
        $update_string = sprintf( $update_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
        
        if($link){
            $updated_on = sprintf(
                /* translators: %s: update date. */
                esc_html_x( $update_prefix.'%s', 'post date', 'lv-base' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $update_string . '</a>'
            );
            echo '<span class="updated-on">' . $updated_on . '</span>'; // WPCS: XSS OK.
        }
        else{
            echo '<span class="updated-on">' . $update_string . '</span>'; // WPCS: XSS OK.    
        }   
    }
endif;
