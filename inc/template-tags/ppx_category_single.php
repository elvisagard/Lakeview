<?php
//PPX-TTAGS 6.1 DISPLAY SINGLE CATEGORY
if ( ! function_exists( 'ppx_category_single' ) ) :
	/**
	 * Prints list of categories
	 */
	function ppx_category_single() {
        
        $categories = get_the_category();
        if ( ! empty( $categories ) ){
        
            echo '<span class="uk-label">'. esc_html( $categories[0]->name ) .'</span>';
        
        }
    }
endif;
