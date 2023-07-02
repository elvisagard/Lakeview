<?php

/**
 * Content Section Template.
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
    $id = 'section-' . $block['id'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'ppx-content-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Space between class strings
$sp = ' ';

// Set section classes
$sctn = 'uk-section';

$sctn_padding = $sp . get_field('section_padding') ?: '';
$sctn_accent = $sp . get_field('section_accent') ?: '';
$sctn_bg = $sp . get_field('section_bg') ?: '';
$sctn_overlapped = get_field('section_overlapped') ? $sp . 'uk-section-overlap' : '';

$sctn_img = get_field('section_img') ?: null;
$sctn_img_id = isset($sctn_img['img']) ?: null;
$sctn_img_size = $sp . isset($sctn_img['size']) ?: '';
$sctn_img_position = $sp . isset($sctn_img['position']) ?: '';
$sctn_img_fixed = isset($sctn_img['fixed']) ? ' uk-background-fixed' : '';

$section_classes = $sctn . $sctn_padding . $sctn_bg . $sctn_accent . $sctn_overlapped . $sctn_img_size . $sctn_img_position . $sctn_img_fixed;

// Set section attributes

$section_attr = get_field('section_attr') ?: '';

if( $sctn_img_id ){
    
    $data_src = ' data-src="' . wp_get_attachment_image_url($sctn_img_id, 'xxl') . '"';
    $data_srcset = ' data-srcset="' . wp_get_attachment_image_srcset($sctn_img_id, 'xxl') . '"';
    $data_sizes = ' data-sizes="' . wp_get_attachment_image_sizes($sctn_img_id, 'xxl') . '"';
    $sctn_img_parallax = $sctn_img['parallax'] ? ' uk-parallax="bgy: -120"': '';
    
    $section_attr = 'uk-img'. $data_src . $data_srcset . $data_sizes . $sctn_img_parallax;
    
}

// Set container classes

$ctnr = get_field('section_width') != 'no-container' ? 'uk-container ' : '';
$ctnr .= get_field('section_width') ?: ''; 

$container_classes = $ctnr;

// ACCESSIBILITY VARIABLES

    // Set id for accessible block
    $access_id = 'access-' . $id;

    // Accesibility Heading
    $heading = get_field('access_heading') ?: '';
    $heading_tabbable = get_field('heading_tabbable') ? $sp . 'tabindex="0" ' : '';
    $heading_attr = $sp . get_field('heading_attr') ?: '';
    $h1_attr = $heading_tabbable . $heading_attr;
    $include_anchor = get_field('include_anchor')? true : false;

    // Accessibility Navigation
    $skip = get_field('skip');
    if($skip){
        $skip_text = $skip['text'] ?: '';
        $skip_href = '#' . $skip['href'] ?: '';
    }
    
    // Accessibility Attributes
    $access_attr = get_field('access_attr') ?: '';

//echo $section_classes;
//echo '<br>';
//echo $container_classes;
//echo '<br>';
//echo $section_bg['fixed'];
//echo '<br>';
//print_r($sctn_img);
?>

 <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $section_classes; ?>" <?php echo $section_attr; ?>>
 
    <div id="<?php echo esc_attr($access_id); ?>" class="sr-only" <?php echo $access_attr; ?>>
        
        <h1 <?php echo $h1_attr; ?>><?php echo $heading; ?></h1>

        <?php if($include_anchor) : ?>
            <a href="<?php echo esc_attr($skip_href); ?>"><?php echo $skip_text; ?></a>
        <?php endif; ?>        

        <?php 
            if ( have_rows('access_para') ) {
                while ( have_rows('access_para') ) {
                    the_row(); 
                    $para_text = get_sub_field('para_text');
                    $para_attr = get_sub_field('para_attr');
                    $para_tabbable = get_sub_field('para_tabbable') ? $sp . 'tabindex="0" ' : '';
                    $p_attr = $para_tabbable . $para_attr;

                    //Print pargraph text and attributes.
                    echo '<p' . $sp . $p_attr . '>'. $para_text . '</p>';

                } // end while
            } // end if
        ?>      

    </div>

  <div class="<?php echo $container_classes; ?>" >
    <InnerBlocks  />
  </div>
  
</section> 