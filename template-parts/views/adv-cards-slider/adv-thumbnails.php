<?php
/**
 ** ADVANCED PANEL LOOP TEMPLATE
 **/


class advThumbnailView extends viewBase
{
    public function render(){ 
        
        $space = ' ';
        
        // Set block id output
        $block_id = $this->id ?: $space;

        // Set classes variable
        $block_classes = $this->classes;
        $settings = $this->settings;
        $block_attr = $settings['block_attr'] ?: $space; 
        
        include 'card-parts/card-part-slider-settings.php'; 
        
        $uk_slider_items = $within_slider ? 'uk-slider-items' : $space;
        $uk_grid = $gaps ? 'uk-grid' : $space;
        
        $filter_items = [];
        switch ($set_filter_on) {
            case 'taxonomy':
                if(is_array($set_filter_terms)){
                    $filter_items = $set_filter_terms;
                }
                break;
            case 'tags':
                if(is_array($set_filter_tags)){
                    $filter_items = $set_filter_tags;
                }
                break;
            default:
                break;
        }
        
    ?>

    <?php if($filter_items): ?>
            <ul class="filter-menu-ul uk-subnav uk-subnav-pill <?php echo esc_attr($fmenu_attrs['cls']); ?>" <?php echo $fmenu_attrs['attr']; ?> >
                
                <li class="filter-menu-li <?php echo esc_attr($menu_li['cls']); ?>" <?php echo $menu_li['attr']; ?> >
                    <button class="lm-btn-all uk-button filter-menu-item lm-btn-light lm-btn-cat <?php echo esc_attr($menu_link['cls']); ?>" 
                       href="#" 
                       data-replace="<?php echo $block_id; ?>" 
                       data-<?php echo $set_filter_on; ?>-term="all" 
                       <?php echo $menu_link['attr']; ?>
                       >
                        All
                    </button>
                </li>
                
                <?php foreach ($filter_items as $key => $item) {

                    if($item['taxonomy']){
                        $item_value = $item['slug'];
                        $item_label = $item['name'];
                        $item_color = getCatColor($item_value);
                    }

                    if($item['label']){
                        $item_value = $item['value'];
                        $item_label = $item['label'];
                        $item_color = getCatColor($item_value);
                    }        

                    ?> 
                <li class="filter-menu-li <?php echo esc_attr($menu_li['cls']); ?>" <?php echo $fmenu_attrs['attr']; ?> >
                    <button class="filter-menu-item lm-btn-light dot-btn lm-btn-cat dot-<?php echo $item_color?> <?php echo esc_attr($menu_link['cls']); ?>"
                       href="#" 
                       data-replace="<?php echo $block_id; ?>" 
                       data-<?php echo $set_filter_on; ?>-term="<?php echo $item_value; ?>"
                       <?php echo $menu_link['attr']; ?>
                       ><span></span>
                        <?php echo $item_label; ?>
                    </button>
                </li>
                    <?php
                }
                ?>
            </ul>
    <?php endif; ?>

<?php if($within_slider): ?>
        <div id="<?php echo $block_id; ?>" class='<?php echo esc_html($block_classes); ?>' <?php echo $block_attr; ?> tabindex="-1" uk-slider>
 <?php endif; ?> 
            
            <span id="set-<?php echo $block_id; ?>" data-setting='<?php echo json_encode($settings); ?>' class="setting-store" style="display:none">
            </span>
            
                <ul id="ul-<?php echo $block_id; ?>" class="uk-grid-match <?php echo esc_attr($ul_attrs['cls']); ?> <?php echo esc_attr($uk_slider_items); ?> " <?php echo $ul_attrs['attr']; ?> <?php echo $uk_grid; ?> >
                    <?php $this->renderAdvContent(); ?>
                </ul>

<?php if( $within_slider ): ?>
            
            <?php if( $arrow_nav ): ?>
                <a class="<?php echo esc_attr($arrows_attrs['cls']); ?>" href="#" uk-slidenav-previous uk-slider-item="previous" <?php echo $arrows_attrs['attr']; ?>></a>
                <a class="<?php echo esc_attr($arrows_attrs['cls']); ?>" href="#" uk-slidenav-next uk-slider-item="next" <?php echo $arrows_attrs['attr']; ?>></a>
            <?php endif; ?>
       
        <?php if( $dot_nav ): ?>
            <ul class="uk-slider-nav uk-dotnav <?php echo esc_attr($dots_attrs['cls']); ?>" <?php echo $dots_attrs['attr']; ?> ></ul>
        <?php endif; ?>
            
    </div>
<?php endif; ?>  


    <?php  } // end Render ----------------

    
    
    public function renderAdvContent(){
    
        // Show the content of the slider (thumbnail panels in this case)
        
        // Loop over query results
        while ( $this->query->have_posts() ) : 
            $this->query->the_post();         
                
        //  SET PANEL INSTANCE VARIABLES --------------------------------------- //
        
        $settings = $this->settings;
        include 'card-parts/card-part-card-settings.php';  
        $content = $settings['card_content']; // Array of content for a single thumbnail
        include 'card-parts/card-part-image.php';  
        include 'card-parts/card-part-button.php';  
        include 'card-parts/card-part-icon.php';  
        include 'card-parts/card-part-code.php';  
        include 'card-parts/card-part-duration.php';  
        include 'card-parts/card-part-badge.php';  
        include 'card-parts/card-part-date.php';  
        include 'card-parts/card-part-title.php';  
        include 'card-parts/card-part-excerpt.php';
        include 'card-parts/card-part-background.php';
        ?>

        <li class="<?php echo esc_attr($li_attr['cls']); ?>" <?php echo $li_attr['attr']; ?>>
            
        <?php if($perm_link && !$button_exists): ?>
            <a style="text-decoration: none;" href="/?page_id=<?php echo get_the_ID() ?>">
        <?php endif ?>
               
            <div class="thumb-wrapper uk-border-rounded <?php echo $thumb_bg; ?> <?php echo esc_attr($comp_attrs['cls']); ?>" <?php echo $comp_attrs['attr']; ?> <?php echo $bg_color_string; ?>>                   
                <?php // MEDIA SECTION --------------------- ?> 
                <div class="uk-panel uk-cover-container <?php echo esc_attr($media_wrapper['cls']); ?>" 
                     <?php echo $media_wrapper['attr']; ?> >

                    <?php // Image ----------------- ?> 
                    <?php if( $mSrc ): ?>
                        <?php get_img($mSrc,'medium_large', $mClass, $mAttr,$mAlt);?>

                        <canvas width="<?php echo $mImgWidth?>" 
                                height="<?php echo $mImgHeight?>"
                        ></canvas>

                    <?php endif; ?>      

                        <?php // Icon ----------------- ?> 
                        <?php if( $mIconElement ): ?>
                           <?php echo $mIconElement; ?>
                        <?php endif; ?>

                        <?php // Badge ----------------- ?> 
                        <?php if( $mBadgeElement ): ?>
                            <?php echo $mBadgeElement ?>
                        <?php endif; ?>

                </div><!-- end media wrapper  -->

            </div> <!-- end component wrapper  -->
            
             <div class="uk-panel <?php echo esc_attr($body['cls']); ?>" <?php echo $body['attr'];?> >
                
                    <?php // Code ----------------- ?> 
                    <?php if( $mCodeElement ): ?>
                       <?php echo $mCodeElement; ?>
                    <?php endif; ?>

                    <?php // Title ---------------- ?>
                    <?php if( $titleText ): ?>
                 <a style="text-decoration: none;" href="/?page_id=<?php echo get_the_ID() ?>">
                        <h3 class="<?php echo esc_attr($titleClass); ?>" <?php echo $titleAttr; ?> title="<?php echo $titleText; ?>"><?php echo $titleText; ?></h3>
                    </a>
                    <?php endif; ?>

                    <?php // Excerpt ---------------- ?>
                    <?php if( $excerptText ): ?> 
                        <p class="<?php echo esc_html($excerptClass); ?>"><?php echo $excerptText; ?></p>
                    <?php endif; ?>

                    <?php // Date ---------------- ?>                        
                    <?php if( $mDateElement ): ?>
                        <?php echo $mDateElement ?>
                    <?php endif; ?>

                    <?php // Duration ---------------- ?>                        
                    <?php if( $mDurElement ): ?>
                        <?php echo $mDurElement ?>
                    <?php endif; ?>

                    <?php // Button ---------------- ?>                        
                    <?php if( $mLinkElement ): ?>
                        <?php echo $mLinkElement ?>
                    <?php endif; ?>
                
                </div>
                
        <?php if($perm_link && !$button_exists): ?>
            </a>
        <?php endif ?>
            
        </li>
        <?php endwhile ?>
            
   <?php  } // end renderAdvContent
    
} // close the class

?>
