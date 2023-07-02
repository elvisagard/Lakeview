<?php
//PPX-TPLFN 5.0 LIMIT EXCERPT CUSTOMIZATIONS
// Limit excerpt output to specified number of words
function ppx_excerpt_length( $length ) {
        return 15;
}
add_filter( 'excerpt_length', 'ppx_excerpt_length', 999 );
