<?php
/**
 ** ADVANCED CARD LOOP TEMPLATE
 **/


class advCardView extends viewBase
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
        
        $uk_slider_items = $within_slider ? 'uk-slider-items' : null;
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

<?php if( $within_slider ): ?>

        <div id="<?php echo $block_id; ?>" class="<?php echo esc_attr($block_classes); ?>" <?php echo $block_attr; ?> uk-slider>

            <div class="uk-position-relative">
            
                <div class="<?php echo esc_attr($comp_wrapper['cls']); ?>uk-slider-container top-nav-arrows" <?php echo $comp_wrapper['attr']; ?> tabindex="-1">
                
 <?php endif; ?>   

                <span id="set-<?php echo $block_id; ?>" data-setting='<?php echo json_encode($settings); ?>' class="setting-store" style="display:none">
                </span>
                    
                    <ul id="ul-<?php echo $block_id; ?>" class="uk-grid-match <?php echo esc_attr($ul_attrs['cls']); ?> <?php echo esc_attr($uk_slider_items); ?> " <?php echo $ul_attrs['attr']; ?> <?php echo $uk_grid; ?> >
                        <?php $this->renderAdvContent(); ?>
                    </ul>
            
    <?php if( $within_slider ): ?>

                </div> <!-- tabindex -->

                <?php if( $arrow_nav ): ?>
                        <a class="uk-position-center-left-out <?php echo esc_attr($arrows_attrs['cls']); ?>" href="#" uk-slidenav-previous uk-slider-item="previous" <?php echo $arrows_attrs['attr']; ?>></a>
                        <a class="uk-position-center-right-outx <?php echo esc_attr($arrows_attrs['cls']); ?>" href="#" uk-slidenav-next uk-slider-item="next" <?php echo $arrows_attrs['attr']; ?>></a>
                <?php endif; ?>
                


            </div> <!-- uk-position-relative -->

            <?php if( $dot_nav ): ?>
                <ul class="uk-slider-nav uk-dotnav uk-flex-right uk-margin-large-top <?php echo esc_attr($dots_attrs['cls']); ?>" <?php echo $dots_attrs['attr']; ?> ></ul>
            <?php endif; ?>
            
        </div> <!-- uk-slider -->
    <?php endif; ?>
            



    <?php  } // close the function    
    
    
    public function renderAdvContent(){
    
        // Show the content of the slider (cards in this case)

        // Loop over query results
        while ( $this->query->have_posts() ) : 
            $this->query->the_post();         
        
        //  SET CARD INSTANCE VARIABLES --------------------------------------- //
    
        $settings = $this->settings;
        include 'card-parts/card-part-card-settings.php';  
        $content = $settings['card_content']; // Array of content for a single card
        include 'card-parts/card-part-image.php';  
        include 'card-parts/card-part-button.php';  
        include 'card-parts/card-part-icon.php';  
        include 'card-parts/card-part-code.php';  
        include 'card-parts/card-part-duration.php';
        include 'card-parts/card-part-badge.php';  
        include 'card-parts/card-part-card-badge.php';  
        include 'card-parts/card-part-date.php';
        include 'card-parts/card-part-title.php';  
        include 'card-parts/card-part-excerpt.php';  
        include 'card-parts/card-part-background.php';  
        ?>

        <li class="<?php echo esc_attr($li_attr['cls']); ?>" <?php echo $li_attr['attr']; ?> >

        <?php if($perm_link && !$button_exists): ?>
            <a style="text-decoration: none;" href="/?page_id=<?php echo get_the_ID() ?>">
        <?php endif ?>

            <div 
                 class="uk-card <?php echo esc_attr($card_bg); ?> <?php echo esc_attr($comp_attrs['cls']); ?>" 
                 <?php echo $bg_color_string; ?> 
                 <?php echo $comp_attrs['attr']; ?> >
                                
                <?php // MEDIA SECTION --------------------- ?> 
                <div class="uk-cover-container <?php echo esc_attr($media_wrapper['cls']); ?> <?php echo esc_attr($media_pos); ?>" <?php echo $media_wrapper['attr']; ?> >
                    
                    <?php // Image ----------------- ?> 
                    
                    
                    <?php if( isset($mSrc) ): get_img($mSrc,'medium_large', $mClass, $mAttr,$mAlt);?>
                    
                    <canvas width="<?php echo $mImgWidth?>" 
                            height="<?php echo $mImgHeight?>"
                    ></canvas>
                    <?php endif; ?>                

                    
                    <?php // Code ----------------- ?> 
                    <?php if( $mCodeElement ): ?>
                       <?php echo $mCodeElement; ?>
                    <?php endif; ?>
                    
                    <?php // Icon ----------------- ?> 
                    <?php if( $mIconElement ): ?>
                       <?php echo $mIconElement; ?>
                    <?php endif; ?>
                    
                    <?php // Badge ----------------- ?> 
                    <?php if( $mBadgeElement ): ?>
                        <?php echo $mBadgeElement ?>
                    <?php endif; ?>
                    
                    <?php // Card Badge ----------------- ?> 
                    <?php if( $mCBadgeElement ): ?>
                        <?php echo $mCBadgeElement ?>
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
                
                <?php // BODY SECTION--------------------- ?> 
                    <div class="uk-card-body <?php echo esc_attr($body['cls']); ?>" <?php echo $body['attr']; ?> >
                        
                        <?php // Code ----------------- ?> 
                        <?php if( $bCodeElement ): ?>
                           <?php echo $bCodeElement; ?>
                        <?php endif; ?>
                        
                        <?php // Icon ----------------- ?> 
                        <?php if( $bIconElement): ?> 
                           <?php echo $bIconElement; ?>
                        <?php endif; ?>

                        <?php // Badge ----------------- ?> 
                        <?php if( $bBadgeElement ): ?>
                            <?php echo $bBadgeElement ?>
                        <?php endif; ?>
                        
                        <?php // Card Badge ----------------- ?> 
                        <?php if( $bCBadgeElement ): ?>
                            <?php echo $bCBadgeElement ?>
                        <?php endif; ?>

                        <?php // Date ---------------- ?>                        
                        <?php if( $bDateElement ): ?>
                            <?php echo $bDateElement ?>
                        <?php endif; ?>
                        
                        <?php // Title ---------------- ?>
                        <?php if( $titleText ): ?>
                            <h3 class="uk-card-title <?php echo esc_attr($titleClass); ?>" <?php echo $titleAttr; ?>><?php echo $titleText; ?></h3>
                        <?php endif; ?>

                        <?php // Excerpt ---------------- ?>
                        <?php if( $excerptText ): ?> 
                            <p class="<?php echo esc_html($excerptClass); ?>"><?php echo $excerptText; ?></p>
                        <?php endif; ?>
                        
                        <?php // Duration ---------------- ?>                        
                        <?php if( $bDurElement ): ?>
                            <?php echo $bDurElement ?>
                        <?php endif; ?>
                        
                    </div>
                                        
                <?php // Footer Button ---------------- ?>
                <?php if( $bLinkElement ): ?>
                     <div class="uk-card-footer <?php echo esc_attr($footer['cls']); ?>" <?php echo $footer['attr']; ?> >
                            <?php echo $bLinkElement ?>
                    </div>
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
