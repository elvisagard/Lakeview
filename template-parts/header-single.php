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
  
    <div class="uk-container">
   
        <div class="uk-padding-large uk-padding-remove-horizontal">
             <?php
            ppx_category_single();
             if(is_archive()):
                 the_archive_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
                 //the_archive_description( '<div class="archive-description">', '</div>' );
             else:
                 the_title( '<h1 class="page-title uk-heading-medium">', '</h1>' );
             endif;
             //uk-flex uk-flex-middle uk-flex-left
            
            ppx_starter_posted_by('line',true);
             ?>
         </div>
     </div>
   
    <?php
        $thumb_id = get_post_thumbnail_id() ? get_post_thumbnail_id() : false;
        if(get_post_thumbnail_id()):
    ?>

        <div class="uk-cover-container uk-height-medium">
        <?php echo get_img(get_post_thumbnail_id(), 'xl', '', 'uk-cover'); ?>
        </div>
    <?php endif; ?>

</header><!-- .page-header -->

