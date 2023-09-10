<?php 

/* Announcements Template  */

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'news','lv-news');

$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: null;
$archive_url = get_post_type_archive_link('news');

$categories = get_field('category');
$cat_array = array();

if( $categories ){
    foreach( $categories as $cat ){
        array_push($cat_array, $cat->slug);
    }
}
$cat_list = count($cat_array)>0 ? implode(', ', $cat_array) : 'church-wide';

$quan = (int)get_field('quantity') ?? 5;
$title = get_field('title')=='' ? 'Our News' : get_field('title');



$args = array(
  'numberposts' => $quan,
  'post_type'   => 'news',
  'order'       => 'DES',
  'orderby'     => 'date',
  'taxonomy' => 'news-category',
  'term' => 'women',
  'tax_query' => array(
      'relation' => 'OR',
        array(
            'taxonomy' => 'news-category',
            'field'    => 'slug',
            'terms'    =>  $cat_array,
        ),
    )
    
);
$news = get_posts( $args );

//print_r($cat_list);
//die("");

?>

<?php if ($news) : ?>
<h3><?php echo $title ?></h3>
  <ul id="<?php echo esc_attr($block_id); ?>" class="hide-news uk-list uk-list-square uk-list-primary uk-list-divider uk-list-collapse <?php echo esc_attr($block_cls); ?>">
    <?php foreach ( $news as $article ) : setup_postdata( $article ); ?>
      <li><a href="<?php echo $article->guid; ?>"><?php echo  $article->post_title; ?></a></li>
    <?php endforeach; wp_reset_postdata(); ?>
  </ul>
<?php endif; ?>

<div>
    <a class="uk-button uk-button-primary" href="<?php echo $archive_url; ?>" title="All News">All</a>
</div>

