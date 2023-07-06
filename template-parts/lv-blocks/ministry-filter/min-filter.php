<?php 

/* Events Template  */

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'events','lv-events');

$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: null;
$archive_url = get_post_type_archive_link('ministry');
$cat = get_field('min_cat');

$args = array(
  'numberposts' => -1,
  'post_type'   => 'post',
  'order'       => 'DES',
  'orderby'     => 'date',
  'category_name' => $cat
);
$ministries = get_posts( $args );

//var_dump($ministries);

//var_dump($block);

//$args2 = array(
//  'numberposts' => 5,
//  'post_type'   => 'event',
//  'order'       => 'DES',
//  'orderby'     => 'date'
//);
//$ministries = get_posts( $args2 );



//if ( class_exists('EM_Events') ) {
//    echo EM_Events::output( array('limit' => 10,'orderby' => 'name') );
//}

//var_dump(em_get_events( array( 'category' => 'community-service' ) ));
//print_r(em_get_events( array( 'category' => 'community-service' ) ));

?>


<?php if ($ministries) : ?>
    <article id="<?php echo esc_attr($block_id); ?>" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center uk-grid-small <?php echo esc_attr($block_cls); ?>" uk-grid>
        <?php foreach ( $ministries as $ministry ) : setup_postdata( $ministry ); ?>
            <div class="uk-light">
                <a href="<?php echo $ministry->guid; ?>"><h5 class="uk-card uk-card-default uk-card-body"><?php echo  $ministry->post_title; ?></h5></a>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </article>
<?php endif; ?>

<div>
    <a class="uk-button uk-button-primary" href="<?php echo $archive_url; ?>" title="All Ministries">All Ministries</a>
</div>

