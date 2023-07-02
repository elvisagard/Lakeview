<?php
//PPX-TTAGS 5.0 LIST TAGS LINKS
if ( ! function_exists( 'ppx_tag_list' ) ) :
	/**
	 * Prints list of item tags
	 */
	function ppx_tag_list() {
        
        //$taglist_prefix = 'Tags: ';
        
        /* translators: used between list items, there is a space after the comma */
//        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'lv-base' ) );
//        if ( $tags_list ) {
//            /* translators: 1: list of tags. */
//            printf( '<span class="tags-links">' . esc_html__( $taglist_prefix.'%1$s', 'lv-base' ) . '</span>', $tags_list ); // WPCS: XSS OK.
//        }
        $tags = get_the_tags();
        
        if ($tags && ! is_wp_error($tags)): 
            foreach($tags as $tag): ?>
            
                <a href="<?php echo get_tag_link( $tag->term_id); ?>" rel="tag" class="uk-text-meta uk-link-text <?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a>
            
            <?php endforeach; 
        
        endif; 
        
    }
endif;
