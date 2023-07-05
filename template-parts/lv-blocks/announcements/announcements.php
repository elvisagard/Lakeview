<?php 

/* Announcements Template  */

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'news','lv-news');

$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: null;
$archive_url = get_post_type_archive_link('news');
$args = array(
  'numberposts' => 5,
  'post_type'   => 'news',
  'order'       => 'DES',
  'orderby'     => 'date'
);
$news = get_posts( $args );



//$args2 = array(
//  'numberposts' => 5,
//  'post_type'   => 'event',
//  'order'       => 'DES',
//  'orderby'     => 'date'
//);
//$events = get_posts( $args2 );
//var_dump($events);


//if ( class_exists('EM_Events') ) {
//    echo EM_Events::output( array('limit' => 10,'orderby' => 'name') );
//}

//var_dump(em_get_events( array( 'category' => 'community-service' ) ));
//print_r(em_get_events( array( 'category' => 'community-service' ) ));

?>

<?php if ($news) : ?>
  <ul id="<? echo esc_attr($block_id); ?>" class="hide-news uk-list uk-list-square uk-list-primary uk-list-divider uk-list-collapse <?php echo esc_attr($block_cls); ?>">
    <?php foreach ( $news as $article ) : setup_postdata( $article ); ?>
      <li><a href="<?php echo $article->guid; ?>"><?php echo  $article->post_title; ?></a></li>
    <?php endforeach; wp_reset_postdata(); ?>
  </ul>
<?php endif; ?>

<div>
    <a class="uk-button uk-button-primary" href="<?php echo $archive_url; ?>" title="All News">All</a>
</div>
