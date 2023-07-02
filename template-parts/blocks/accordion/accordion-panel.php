<?php

/**
 * Accordion Panel Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Set id for section block

if( get_field('block_id') ){
    $id = get_field('block_id');
}
else{
    $id = 'panel-' . $block['id'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ppx-accordion-panel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Space between class strings
$sp = ' ';

// Set section attributes

$theSectionAttr = isset($section_attr) ?: '';

// Set panel title
    $panel_title = get_field('panel_title');
    if($panel_title){
        $temp_title = $panel_title['title_text'] ?: '';
        $p_title = $temp_title != '' ? $temp_title : 'Temporary Title'; 
        $p_class = $sp . $panel_title['title_class'] ?: '';
    }

// Set panel content container classes
if( get_field('content_class') ){
    $content_class = get_field('content_class');
}


?>

 <li id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $theSectionAttr; ?>>
     
        <a class="uk-accordion-title <?php echo esc_attr($p_class); ?>" href="#"><?php echo $p_title; ?></a>
     
        <div class="uk-accordion-content <?php echo esc_attr($content_class); ?>">
            <InnerBlocks  />
        </div>
  
</li>
