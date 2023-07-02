<?php 

/* Events Template  */

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'events','lv-events');

$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: null;

$args = array(
  'numberposts' => -1,
  'post_type'   => 'belief',
  'order'       => 'ASC',
  'orderby'     => 'excerpt',
);

$beliefs = get_posts( $args );
?>


<?php if ($beliefs) : ?>

    <ul id="<? echo esc_attr($block_id); ?>" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-text-center uk-grid-small uk-grid-match <?php echo esc_attr($block_cls); ?>" uk-grid>

        <?php foreach ( $beliefs as $belief ) : setup_postdata( $belief ); ?>

            <?php 
                $ID = $belief->ID;
                $thumb_id = get_post_thumbnail_id($ID); 
                $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                $title = $belief->post_title;
                $badge = get_field('fundamental',$ID);
            ?>

            <li >
                <div class="uk-card uk-card-primary">
                    <div class="uk-card-media-top uk-cover-container">
                        <a href="<?php echo esc_attr(get_field('link',$ID)); ?>">
                            <?php get_img($thumb_id,'medium_large', '', 'uk-cover',$alt);?>
                        </a>
                        <canvas width="288" height="300"></canvas>
                        <div class="uk-card-badge uk-label uk-label-danger uk-border-rounded">Belief <?php echo $badge; ?></div>
                    </div>
                    <div class="uk-card-body">
                        <a href="<?php echo esc_attr(get_field('link',$ID)); ?>">
                            <h3 class="uk-card-title"><?php echo $title; ?></h3>
                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; wp_reset_postdata(); ?>
    </ul>

<?php endif; ?>
