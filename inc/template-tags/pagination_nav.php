<?php
//PPX-TTAGS 9.0 POST PAGINATION
if ( ! function_exists( 'pagination_nav' ) ) :
function pagination_nav($query = false, $block_id = 'false') {
    
    
//        if( is_singular() )
//        return;
    
    if($query){
       $wp_query = $query;
    }
    else{
        global $wp_query;
    }
    
    $bId = '';
    if($block_id){
        $bId = '#'.$block_id;
    }
    

    //echo $wp_query->max_num_pages;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination-wrapper uk-padding"><ul class="uk-pagination uk-flex-center">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<span uk-pagination-previous></span>') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active uk-active"' : '';
 
        printf( '<li%s><a href="%s'.$bId.'">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active uk-active"' : '';
        printf( '<li%s><a href="%s'.$bId.'">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active uk-active"' : '';
        printf( '<li%s><a href="%s'.$bId.'">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    //if ( get_next_posts_link() ){
    if ( $paged < $max ){
//        printf( '<li>%s</li>' . "\n", get_next_posts_link('<span uk-pagination-next></span>') );
        printf( '<li%s><a href="%s'.$bId.'"><span uk-pagination-next></span></a></li>' . "\n", $class, esc_url( get_pagenum_link( $paged +1 ) ), '1' );
    }
    echo '</ul></div>' . "\n";

}
endif;
