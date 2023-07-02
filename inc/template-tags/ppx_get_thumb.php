<?php
//PPX-TTAGS 14.0 THUMBNAIL FUNCTION
//Creates a thumbnail
if ( ! function_exists( 'ppx_get_thumb' ) ) : 
    function ppx_get_thumb( $text_placement = 'below', $isbg = true, $link_classes = '', $link_attr = '', $cell_classes = '', $cell_attr = '', $media_classes = ''){ ?>
    <div>
        <?php  
            // Permalink
            $permalink = get_permalink();
            echo '<a href="'.$permalink.'" class="uk-display-block uk-link-toggle '.$link_classes.'" '.$link_attr.'>';
            
            
            // Set Image
            // Get thumbnail id
            $thumbnail_id = get_post_thumbnail_id() ?: ppx_first_img();

            // If cell bg image is activated retrieve thumbnail
            $cell_attr .= $isbg ? 'uk-img '.get_img($thumbnail_id,'large','','','','','','',true) : '';
            
            
        ?>
        
        <div class="uk-inline uk-cover-container uk-background-cover uk-box-shadow-hover-large <?php echo $cell_classes ?>" <?php echo $cell_attr; ?>>
           <canvas class="" width="800" height="800"></canvas>
            <?php if (!$isbg):
               get_img($thumbnail_id, 'large', $media_classes , 'uk-cover');
            endif; ?>
            
        <?php // Set placement of text 
        if( $text_placement == 'overlay' ): ?>
            <div class="uk-position-bottom-left uk-overlay uk-overlay-default uk-padding-small">
                <?php the_title('<h4 class="uk-margin-remove-bottom uk-text-truncate uk-h5 uk-link-heading">','</h4>'); ?>
               <!-- <span class="uk-text-meta uk-text-truncate"><?php //ppx_starter_posted_on(false) ?></span> -->
            </div>
        </div>
        <?php elseif( $text_placement == 'below' ): ?>
        </div>
        <div class='uk-margin-small-top'>
            <?php the_title('<h4 class="uk-margin-remove-bottom uk-text-truncate uk-h5 uk-link-heading">','</h4>'); ?>
            <span class="uk-text-meta uk-text-truncate"><?php ppx_starter_posted_on(false) ?></span>
        </div> 
        <?php else: ?>
        </div>
        <?php endif; ?>
        </a>
    </div>  
<?php }
endif;
