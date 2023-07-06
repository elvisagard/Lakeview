<?php
//PPX-TTAGS 12.0 CARD FUNCTION
if ( ! function_exists( 'ppx_get_card' ) ) :
	function ppx_get_card($title, $body, $link, $thumbnail_id, $img_align, $attr, $link_text = null, $link_type = "link"){
        // Set show media bool variable
        $show_card_media = $thumbnail_id > 0;

        // Set card classes
        $card_classes = 'uk-card uk-card-default';
        if( !empty($attr['class_post']) ){
            $card_classes .= " ".$attr['class_post'];
        }
        
        
        // Set card media classes
        $card_media_classes = '';

        // Set canvas classes
        $canvas_classes = '';

        // Set horizontal boolean
        $horizontal = false;

        // Conditional card and card media classes
        switch ($img_align) {
            case 'top':
                $card_media_classes .= 'uk-card-media-top uk-cover-container';
                $canvas_classes .= 'uk-width-expand';
                break;
            case 'right':
                $horizontal = true;
                $card_classes .= ' uk-grid-collapse uk-child-width-1-2@s uk-margin';
                $card_media_classes .= 'uk-card-media-right uk-flex-last@s uk-cover-container';
                break;
            case 'bottom':
                $card_media_classes .= 'uk-card-media-bottom uk-cover-container';
                $canvas_classes .= 'uk-width-expand';
                break;
            case 'left':
                $horizontal = true;
                $card_classes .= ' uk-grid-collapse uk-child-width-1-2@s uk-margin';
                $card_media_classes .= 'uk-card-media-left uk-cover-container';
                break;
            default:
                break;
        }

        // Image data
        $image_data = $show_card_media ? wp_get_attachment_image_src($thumbnail_id, 'xxl') : [];

        // Image dimensions
        $image_width = $show_card_media ? $image_data[1] : 0;
        $image_height = $show_card_media ? $image_data[2] : 0;

        // Header styles
        $header_styles = '';
        if( !empty($attr['header_styles']) ){
            $header_styles =  $attr['header_styles'] ?: '';
        }
        
        
        ?>
            
        <div>
            <div class="<?php echo $card_classes; ?>" <?php if($horizontal){ echo 'uk-grid'; } ?>>
                <!-- Card Media (top, left, right) -->
                <?php if($show_card_media && $img_align == 'top'): ?>
                    <div class="<?php echo $card_media_classes; ?>">
                        
                        <?php echo get_img($thumbnail_id, 'large', 'uk-disabled', 'uk-cover'); ?>
                        
                        <?php if(!empty($link)): ?><a href="<?php echo $link; ?>" class="uk-link-toggle uk-display-block"><?php endif; ?>
                        <canvas class="<?php echo $canvas_classes ?>" width="400" height="240"></canvas>
                        <?php if(!empty($link)): ?></a><?php endif; ?>
                        <!-- <canvas class="<?php //echo $canvas_classes ?>" width="<?php //echo $image_width; ?>" height="<?php //echo $image_height; ?>"></canvas> -->
                    </div>
                <?php endif; ?>
                
                <?php if($show_card_media && $img_align == 'left' || $img_align == 'right'): ?>
                    <div class="<?php echo $card_media_classes; ?>">
                        
                        <?php echo get_img($thumbnail_id, 'xlarge', 'uk-disabled', 'uk-cover'); ?>
                        
                        
                        <?php if(!empty($link)): ?><a href="<?php echo $link; ?>" class="uk-link-toggle uk-display-block"><?php endif; ?>
                        <canvas class="<?php echo $canvas_classes ?> uk-hidden@l" width="400" height="320"></canvas>
                        <canvas class="<?php echo $canvas_classes ?> uk-visible@l" width="540" height="480"></canvas>
                        <?php if(!empty($link)): ?></a><?php endif; ?>
                        <!-- <canvas class="<?php //echo $canvas_classes ?>" width="<?php //echo $image_width; ?>" height="<?php //echo $image_height; ?>"></canvas> -->
                    </div>
                <?php endif; ?>

                <div class="uk-flex uk-flex-column">
                    <!-- Card Body -->
                    <div class="uk-card-body uk-flex-auto">
                       <div>
                            <?php if(!empty($link)): ?><a href="<?php echo $link; ?>" class="uk-link-toggle <?php echo $header_styles; ?>"><?php endif; ?>
                            <h3 class="uk-link-heading uk-h2 <?php echo $header_styles; ?>">
                                <?php echo $title; ?>
                            </h3>
                            <?php if(!empty($link)): ?></a><?php endif; ?>
                            <p><?php echo $body; ?></p>

                            <?php if(!empty($link) && $link_type != 'footer_button'): 
                               if($link_type == "link"){ ?>
                                    <a href="<?php echo $link; ?>" class="uk-display-inline-block uk-button uk-button-link"><?php echo $link_text; ?></a>
                            <?php } else{ ?>
                                   <a href="<?php echo $link; ?>" class="uk-display-inline-block uk-button uk-button-default"><?php echo $link_text; ?></a>
                              <?php } ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($link) && $link_type == 'footer_button'): ?>
                            <a href="<?php echo $link; ?>" class="uk-card-footer div-top uk-display-block uk-text-uppercase"><?php echo $link_text; ?></a>
                    <?php endif; ?>
                </div>

                <!-- Card Media (bottom) -->
                <?php if($show_card_media && $img_align == 'bottom'): ?>
                    <div class="<?php echo $card_media_classes; ?>">
                        <?php echo get_img($thumbnail_id, 'large', 'uk-disabled', 'uk-cover'); ?>
                        
                        
                        <?php if(!empty($link)): ?><a href="<?php echo $link; ?>" class="uk-link-toggle uk-display-block"><?php endif; ?>
                        <canvas class="<?php echo $canvas_classes ?>" width="400" height="200"></canvas>
                        <?php if(!empty($link)): ?></a><?php endif; ?>
                        <!-- <canvas class="<?php //echo $canvas_classes ?>" width="<?php //echo $image_width; ?>" height="<?php //echo $image_height; ?>"></canvas> -->
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
	
endif; ?>
