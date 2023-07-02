<?php

/**
 * Accordion Container Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Space between class strings
$sp = ' ';

 // Set id for section block

if( get_field('block_id') ){
    $id = get_field('block_id');
}
else{
    $id = 'accordion-container-' . $block['id'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ppx-accordion-container';
if( !empty($block['className']) ) {
    $className .= $sp . $block['className'];
}

// Set accordion options
$accordion_options = get_field('accordion_options') ?: '';

// Set first panel as open
$active_first = get_field('open_first_item')==1 ? 'active="0"' : '';

// Set section attributes
$section_attr = 'uk-accordion';
$user_given_attr = get_field('section_attr') ?: '';
if( $user_given_attr != '' ) {
    $section_attr .= $sp . $user_given_attr . $sp . $accordion_options . $sp . $active_first;
}

?>

 <ul id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"  <?php echo $section_attr; ?>>
     


    <InnerBlocks  />
  
</ul>
