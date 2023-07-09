<?php 

// Set block variables
$space = ' ';

// From Common Functions -----------------------------------------------------------------
$blockVars = initBlockVars($block,'events','lv-events');
$block_id = $blockVars['id'] ?: $space;
$block_cls = $blockVars['className'] ?: $space;
$archive_url = get_post_type_archive_link('event');

$cat_array = get_field('category');
$color = get_field('color') ?? 'lv-event-green';
$quan = (int)get_field('quantity') ?? 3;
$category = isset($cat_array) ? $cat_array->slug : '';
$category_name = isset($cat_array) ? $cat_array->name : 'calendar';
$block_cls .= $space . $color;

$args = array(
    'limit' => $quan,
    'orderby' => 'date',
    'order'       => 'DES',
    'category' => $category
);

//var_dump($category);
//echo '<br/>';
//var_dump($quan);
//echo '<br/>';

?>

<?php if (class_exists('EM_Events')) : ?>
  <article id="<?php echo esc_attr($block_id); ?>" class="uk-height-small uk-width-1-1<?php echo esc_attr($block_cls); ?>">
      <h3><?php echo $category_name ?></h3>
      
      <div class="hide-events">
        <?php 
            echo EM_Events::output( $args );
        ?>
      </div>
  

    <ul class="the-buttons hide-events lv-cal-buttons uk-margin-medium-top uk-grid-small uk-position-bottom-right uk-position-medium" uk-grid>
        <li><a href="/events/categories/<?php echo $category; ?>/"><span class="uk-margin-small-right uk-icon" uk-icon="icon: calendar"></span>MORE</a></li>
        <li><a href="<?php echo $archive_url; ?>"><span class="uk-margin-small-right uk-icon" uk-icon="icon: calendar"></span>ALL</a></li>
    </ul>
      
    <article class="show-events-button">
        <a class="uk-button uk-button-primary" href="/events/categories/<?php echo $category; ?>" title="<?php echo $category_name?> Events" >Events</a>
    </article>
      
   </article>




<?php endif; wp_reset_query(); ?>