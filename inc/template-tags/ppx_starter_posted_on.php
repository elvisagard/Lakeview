<?php
//PPX-TTAGS 1.0 POST DATE / TIME META
if ( ! function_exists( 'ppx_starter_posted_on' ) ) :
	/**
	 * Prints current post's date/time.
	 */
	function ppx_starter_posted_on($link = true) {
        
        $publish_prefix = ''; //'Published ';
		
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
        
        if($link){
            $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html_x( $publish_prefix.'%s', 'post date', 'lv-base' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
            );
            echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
        }
        else{
           echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK. 
        }
		
	}
endif;
