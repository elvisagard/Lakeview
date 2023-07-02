<?php

$include_homepage = get_field('hide_homepage', 'options'); // true/false
$page_ids_list = get_field('page_ids', 'options');
$front_page_id = (int)get_option('page_on_front');

$page_ids_array = json_decode('[' . $page_ids_list . ']', true);

if($include_homepage){
    array_push( $page_ids_array, $front_page_id);
}elseif(in_array($front_page_id, $page_ids_array)){
    $page_ids_array = array_diff($page_ids_array, array($front_page_id));
    }

$check = in_array(get_the_ID(), $page_ids_array);

$hide_the_header = $check ? $hide_the_header = 'display:none' : $hide_the_header = 'display:block';
    
?>


<header style="<?php echo $hide_the_header ?>" class="page-header uk-inline uk-width-expand">
  

   
    <?php
        $thumb_id = get_post_thumbnail_id() ? get_post_thumbnail_id() : false;
        if(get_post_thumbnail_id()):
    ?>

        <div class="ministry-header uk-cover-container uk-preserve uk-height-medium gray-bg-image light-header-text">
            
            <?php echo get_img(get_post_thumbnail_id(), 'xl', '', 'uk-cover uk-relative'); ?>    
            
        <div class="ministry-header-text uk-position-absolute uk-width-1-1 uk-height-1-1">
   
            <div class="uk-padding-large uk-container uk-height-1-1 ">
                 <?php
                ppx_category_single();
                 if(is_archive()):
                     the_archive_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
                     //the_archive_description( '<div class="archive-description">', '</div>' );
                 else:
                     the_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
                 endif;
                 //uk-flex uk-flex-middle uk-flex-left
                 ?>
             </div>
            
         </div>
            
        
        </div>
    <?php endif; ?>

</header><!-- .page-header -->

