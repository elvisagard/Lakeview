<?php
//PPX-TTAGS 4.0 POST FOOTER
if ( ! function_exists( 'ppx_starter_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ppx_starter_entry_footer() {
        
        //echo '<div><strong>PPX-TTAGS 4.0</strong></div>';
        
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
        
            ppx_tag_list();
		}

	}
endif;
