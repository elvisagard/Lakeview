<?php

// get the option fields
$hide_all_headers = get_field('hide_all_headers', 'options'); // true/false
$include_homepage = get_field('hide_homepage', 'options'); // true/false
$page_ids_string = get_field('page_ids', 'options') ?: '';

// convert string ids to array iof integers
$page_ids_array = json_decode('[' . $page_ids_string . ']', true) ?: array();

// get front page id
$front_page_id = (int)get_option('page_on_front');

// define show/hide states
$hide_it = 'display:none';
$show_it = 'display:block';

if($hide_all_headers){
    $hide_the_header = $hide_it;
}
else{
    
    // Include/Exclude homepage in array of ids
    if($include_homepage){
        array_push( $page_ids_array, $front_page_id );
    } 
    else{
        if(in_array($front_page_id, $page_ids_array)){
            $page_ids_array = array_diff($page_ids_array, array($front_page_id));
        }
    }
    
    // If page id in array then hide its header
    $check = in_array(get_the_ID(), $page_ids_array);
    $hide_the_header = $check || $hide_all_headers ? $hide_it : $show_it;
    
} // end else
    
    $thumb_id = false;
    if(get_post_thumbnail_id() && !is_home() && !is_archive() && !is_search()){
        $thumb_id = get_post_thumbnail_id();
    }
    if($thumb_id):
?>

<header style="<?php echo $hide_the_header ?>"  class="page-header uk-inline uk-width-expand" uk-img uk-parallax="bgy: -100" data-src="<?php echo wp_get_attachment_image_url($thumb_id, 'xxl'); ?>" data-srcset="<?php echo wp_get_attachment_image_srcset($thumb_id, 'xxl'); ?>" data-sizes="<?php echo wp_get_attachment_image_sizes($thumb_id, 'xxl'); ?>">
    
    <canvas class="uk-height-medium uk-width-expand"></canvas>
      <div class="uk-overlay-default">
       <div class="uk-container">
           <div class="uk-padding-small uk-padding-remove-horizontal">
            <?php
            if(is_home()):
                $id_frontpage = get_option('page_for_posts');
                echo '<h1 class="page-title">'.get_the_title( $id_frontpage ).'</h1>';
            
            elseif(is_archive()):
               if(single_term_title('',false)){
                   single_term_title( '<h1 class="page-title">', '</h1>' );
               }
                else{
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                }
               //the_archive_description( '<div class="archive-description">', '</div>' ); 
                
            else:
                the_title( '<h1 class="page-title">', '</h1>' );
            endif;
            //uk-flex uk-flex-middle uk-flex-left
            ?>
           </div>
        </div>
    </div>
</header><!-- .page-header -->

<?php else: ?>

<header style="<?php echo $hide_the_header ?>"  class="page-header">
    <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
             <?php
             if(is_home()):
                $id_frontpage = get_option('page_for_posts');
                echo '<h1 class="page-title">'.get_the_title( $id_frontpage ).'</h1>';
            
            elseif(is_archive()):
               if(single_term_title()){
                   single_term_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
               }
                else{
                    the_archive_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
                }
               //the_archive_description( '<div class="archive-description">', '</div>' ); 
             
            elseif(is_search()):
                /* translators: %s: search query. */
                echo '<h1 class="page-title uk-heading-medium">';
                printf( esc_html__( 'Search Results for: %s', 'lv-base' ), '<span>' . get_search_query() . '</span>' );
                echo '</h1>';
            
            else:
                the_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
            endif;
             //uk-flex uk-flex-middle uk-flex-left
             ?>
         </div>
     </div>
</header><!-- .page-header -->

<?php endif; ?>