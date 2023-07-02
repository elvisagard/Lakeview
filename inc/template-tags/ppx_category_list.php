<?php
//PPX-TTAGS 6.0 LIST CATEGORY LINKS
if ( ! function_exists( 'ppx_category_list' ) ) :
	/**
	 * Prints list of categories
	 */
	function ppx_category_list() {
        
        
        $catlist_prefix = "Posted in";
        
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'lv-base' ) );
        
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( $catlist_prefix.' %1$s', 'lv-base' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
        
    }
endif;
