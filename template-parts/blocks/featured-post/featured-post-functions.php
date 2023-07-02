<?php
/* Function solely for Featured Post block */

//function fp_getBlockVars($block){
//    $blockVars = initBlockVars( $block, 'feat-post' , 'ppx-featured-post' ); // store top-level block 
//    return $blockVars;
//}


function fp_buildQueryArgs($block){ // Build the arguments for the query
    
    $sort = get_field('sort') ?: null;
    $orderby = get_field('orderby') ?: null;
    $order = get_field('order') ?: null;
    $limit = get_field('limit') ?: 3;
    $type = get_field('post_type') ?: 'demo';
    $tax = get_field('taxonomy') ?: null;
    $tax_terms = get_field('taxonomy_terms') ?: '';
    $tags = get_field('tags') ?: array();
    $tax_query;
    
    // Test for custom taxonomies
    if($tax){
        $tax_query = array(
            'relation' => 'OR',
            array(
                'taxonomy' => $tax,
                'field'    => 'slug',
                'terms'    => $tax_terms,
            ),
        );
    } else {
        $tax_query = '';
    }

    //Test for tags
        if($tags){
        $tags = implode(' ', $tags);
    }

    // Custom WP query query
    $args_query = array(
        'post_type' => array($type),
        'posts_per_page' => $limit,
        'order' => $sort['order'],
        'orderby' => $sort['orderby'],
        'category_name' => $cat,
        'tax_query' => $tax_query,
        'tag' => $tags,
    );
    return $args_query;
}

    
?>


