<?php
/* Featured Post Template  */

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'fpost','ppx-featured-post');

$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: null;
$block_attr = $blockVars['attr'] ?: null;

$user_choice = get_field('ptype_vs_pid');


// Responsive Media --------------------------------------------------------------------
$media_classes   = get_field('img_attr') ? getGroupClsAttr('img_attr')['cls'] : '';

$canvas_width     = getGroupWidthHeight('cnv_size')['w'];
$canvas_height    = getGroupWidthHeight('cnv_size')['h'];
$canvas_classes   = getGroupClsAttr('cnv_attr')['cls'];
$canvas_attr      = getGroupClsAttr('cnv_attr')['attr'];

$add_responsive     = get_field('add_responsive'); 

if($add_responsive){
    $canvas_width_mobile       = get_field('mobile_size')['width'] ?: '480';
    $canvas_height_mobile      = get_field('mobile_size')['height'] ?: '320';
    $canvas_width_tablet       = get_field('tablet_size')['width'] ?: '800';
    $canvas_height_tablet      = get_field('tablet_size')['height'] ?: '600';

    $canvas_reg = '<canvas class="'.$canvas_classes.' uk-visible@m" width="'.$canvas_width.'" height="'.$canvas_height.'"></canvas>';

    $canvas_tablet = '<canvas class="'.$canvas_classes.' uk-visible@s uk-hidden@m" width="'.$canvas_width_tablet.'" height="'.$canvas_height_tablet.'"></canvas>';

    $canvas_mobile = '<canvas class="'.$canvas_classes.' uk-hidden@s" width="'.$canvas_width_mobile.'" height="'.$canvas_height_mobile.'"></canvas>';
}
else{
    $canvas_reg = '<canvas class="'.$canvas_classes.'" width="'.$canvas_width.'" height="'.$canvas_height.'"></canvas>';
}



// Process user choice ------------------------------------------------------------------
switch($user_choice){
    case 'post':
        $post_id = get_field('selected_post');
        $featured_post = get_post( $post_id, ARRAY_A );
        break;
    case 'ptype':
        $type = get_field('post_type') ?: 'demo'; 
        $limit = 1;
        $args = array( 
            'numberposts' => $limit, 
            'post_type'=>$type,
        );
        $recent_posts = wp_get_recent_posts( $args );
        $featured_post = $recent_posts[0];
        $post_id = $featured_post['ID']; 
}


//KEY $img_ca = image class and attribute

// Get post THUMBNAIL -----------------------------------------------------------
$include_image = get_field('inc_image');
$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'featured-thumb' )[0];
$thumbnail_url = $include_image && $thumbnail_url ? $thumbnail_url : null;
$img_ca = getGroupClsAttr('image');

// Get the post TITLE -----------------------------------------------------------
$include_title = get_field('inc_title');
$title = $include_title && !$featured_post['post_title']==''? $featured_post['post_title'] : null;
$title_ca = getGroupClsAttr('title');

// Get the post EXCERPT
$include_exerpt = get_field('inc_excerpt');
$excerpt = $include_exerpt && !$featured_post['post_excerpt']=='' ? $featured_post['post_excerpt'] : null;
$excerpt_ca = getGroupClsAttr('excerpt');

// Get the DATE -----------------------------------------------------------------
$include_date = get_field('inc_date');
$date = $include_date ? $featured_post['post_date'] : null;
//$date = date('Y-m-d',strtotime($date)); // yyyy-mm-dd
$date = date('F j, Y',strtotime($date)); // March 22, 2022
$date_ca = getGroupClsAttr('date');

// Get the BADGE -----------------------------------------------------------------
$include_badge = get_field('inc_badge');
$badge_text = $include_badge ? get_field('badge_text'): null;
$badge_ca = getGroupClsAttr('badge');

// Get the MEDIA WRAPPER attributes -----------------------------------------------------------------
$media_ca = getGroupClsAttr('media_wrapper');


// Get the CATEGORY -----------------------------------------------------------------
$include_cat = get_field('inc_cat');
$cat = $include_cat ? get_field('category'): null;
$cat_ca = getGroupClsAttr('cat_attr');
$ctw_ca = getGroupClsAttr('cat_tag_wrap');

// Get the FOOTER -----------------------------------------------------------------
$footer_ca = getGroupClsAttr('footer');

// Get the POST TAGS -------------------------------------------------------------
$include_tags = get_field('inc_tags');
$tag_limit = get_field('tag_limit') ?: 3;
if($include_tags){
    $post_tags = get_the_tags( $post_id);
    $tag_name_array = array();
    if ($post_tags) {
        $selected_tags = array_slice($post_tags, 0, $tag_limit);
        foreach($selected_tags as $tag) {
            array_push($tag_name_array, $tag->name); 
        }
    }
}
$tags_ca = getGroupClsAttr('tags');


// Get the CANVAS DIMENSIONS -------------------------------------------------------

$canvas = get_field('canvas');
if( $canvas ){
    $canvas_width = $canvas['width'] ?: 600;
    $canvas_height = $canvas['height'] ?: 400;
}

// Get the BUTTON ------------------------------------------------------------------
if( $type="products" ){
    $button = get_field('button');
    if($button){
        $button_text = $button['text'] ?: null;
        $button_url = $button['url'] ?: '';
        $button_cls = $button['cls'] ?: '';
        $button_attr = $button['attr'] ?: '';
    }
}

$price_ca = getGroupClsAttr('price');

// Get the OLD PRICE ------------------------------------------------------------------
if( $type="products" ){
    $old_price = get_field('old_price');
    if($old_price){
        $old_price_price = $old_price['price'] ?: null;
        $old_price_cls = $old_price['cls'] ?: null;
        $old_price_attr = $old_price['attr'] ?: null;
    }
}

// Get the NEW PRICE ------------------------------------------------------------------
if( $type="products" ){
    $new_price = get_field('new_price');
    if($new_price){
        $new_price_price = $new_price['price'] ?: null;
        $new_price_cls = $new_price['cls'] ?: null;
        $new_price_attr = $new_price['attr'] ?: null;
    }
}


?>


<div id="<?php echo esc_attr($block_id); ?>" class="uk-card <?php echo esc_attr($block_cls) ?>" <?php echo $block_attr; ?> uk-grid>
    
    <div class=" <?php echo esc_attr($media_ca['cls']); ?>" <?php echo $media_ca['attr']; ?> >
        
       <?php 
        if( $thumbnail_url ){
            //echo '<img src="'.esc_url($thumbnail_url).'" alt="image" uk-cover>';
            get_img(get_post_thumbnail_id( $post_id ), 'large', $media_classes , 'uk-cover');
            if($add_responsive){ 
                echo $canvas_reg;
                echo $canvas_tablet;
                echo $canvas_mobile;
            }
            else{
                echo $canvas_reg;
            }
        }
        ?>
        
    </div>
    
    <div>
        <div class="uk-card-body">
            
            <?php if( $badge_text ):?>
                <div style="position: static;"  class="uk-card-badge uk-label <?php echo esc_attr($badge_ca['cls']); ?>" <?php echo $badge_ca['attr']; ?>><?php echo $badge_text ?></div>
            <?php endif; ?>
            
            <?php if( $date ):?>
                <p class="<?php echo esc_attr($date_ca['cls']); ?>" <?php echo $date_ca['attr']; ?>><?php echo $date ?></p>
            <?php endif; ?>
            
            <?php if( $title ):?>
                <h2 class="<?php echo esc_attr($title_ca['cls']); ?>" <?php echo $title_ca['attr']; ?>><?php echo $title ?></h2>
            <?php endif; ?>
            
            <?php if( $old_price_price || $new_price_price ):?>
                <div class="<?php echo esc_attr($price_ca['cls']); ?> uk-grid-small" <?php echo $price_ca['attr']; ?> uk-grid>
                    <p style="text-decoration: line-through;"><?php echo $old_price_price ?></p>
                    <p><?php echo $new_price_price ?></p>
                </div>
            <?php endif; ?>
            
            <?php if( $excerpt ):?>
                <p class="<?php echo esc_attr($excerpt_ca['cls']); ?>" <?php echo $excerpt_ca['attr']; ?>><?php echo $excerpt ?></p>
            <?php endif; ?>
            
        </div>

        <div class="uk-card-footer <?php echo esc_attr($footer_ca['cls']); ?>" <?php echo $footer_ca['attr']; ?> >
            
            <?php if( $tag_name_array ):?>
                <div class="uk-grid-small <?php echo esc_attr($ctw_ca['cls']); ?>" <?php echo $ctw_ca['attr']; ?> uk-grid>
                    
                    <?php if( $cat ):?>
                        <p class="<?php echo esc_attr($cat_ca['cls']); ?>" <?php echo $cat_ca['attr']; ?> ><?php echo $cat['label'] ?></p>
                    <?php endif; ?>
                    
                    <?php foreach($tag_name_array as $tag):?>
                        <div>
                            <p class="<?php echo esc_attr($tags_ca['cls']); ?>" <?php echo $tags_ca['attr']; ?> ><?php echo $tag ?></p>
                        </div>                
                    <?php endforeach; ?>
                    
                </div>
            <?php endif; ?>

            <?php if( $button_text ):?>
                <a href="<?php echo esc_url($button_url); ?>" class="uk-button <?php echo esc_attr($button_cls); ?>" <?php echo $button_attr; ?>><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
            
        </div>
    </div>
</div>





