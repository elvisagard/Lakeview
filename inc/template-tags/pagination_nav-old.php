<?php
//PPX-TTAGS 9.0 POST PAGINATION
if ( ! function_exists( 'pagination_nav' ) ) :
function pagination_nav() {
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;
    $translated = __( 'Page', 'lv-base' ); // Supply translatable string

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => '« Prev',
            'next_text' => 'Next »',
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
        ));
    }
}
endif;
