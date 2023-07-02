<?php
/**
 * Register ACF Blocks
 *
 */

//PPX-BLOCKS 1.0 REGISTER BLOCKS

function register_acf_block_types() {
    
    $stylesheet;
        
    if(is_admin()) { 
        $stylesheet = get_template_directory_uri() .'/scss/uikit-admin.css';
        $script = get_template_directory_uri() . '/js/uikit.min.js';
    }
    else{ 
        $stylesheet = ''; 
        $script = '';
    }

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register layout block
        acf_register_block_type(array(
            'name'              => 'ppx-layout',
            'title'             => __('PPx Page Layout'),
            'description'       => __('Set the layout of the page'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'schedule',
            'keywords'          => array( 'layout', 'sidebar', 'page layout' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/layout/layout.php',
            'enqueue_style'     => $stylesheet,
        ));
        // register section block
        acf_register_block_type(array(
            'name'              => 'ppx-section',
            'title'             => __('PPx Content Section'),
            'description'       => __('Section block for content'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'text',
            'keywords'          => array( 'layout', 'section', 'text', 'container', 'page section', 'block' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/section/section.php',
            'enqueue_style'     => $stylesheet
        ));
        acf_register_block_type(array(
            'name'              => 'ppx-content-grid',
            'title'             => __('PPx Content Grid'),
            'description'       => __('Section block for displaying information in a grid'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'align-left',
            'keywords'          => array( 'layout', 'grid', 'section', 'text', 'two column', 'block', 'image', 'canvas', 'information', 'content block' ),
            'supports'			=> array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/content-grid/content-grid.php',
            'enqueue_style'     => $stylesheet
        ));
        
        // Register content view block
        acf_register_block_type(array(
            'name'              => 'ppx-content-view',
            'title'             => __('PPx Content View'),
            'description'       => __('Display content in a custom view'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'layout',
            'keywords'          => array( 'views', 'page layout', 'uikit', 'slider', 'cards', 'elements' ),
            'render_template'   => 'template-parts/blocks/content-views/content-views.php',
            'enqueue_style'     => $stylesheet,
            'enqueue_script'     => $script
        ));

        // Register card block
        acf_register_block_type(array(
            'name'              => 'ppx-card',
            'title'             => __('PPx Card'),
            'description'       => __('Display content in a card block'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'id',
            'keywords'          => array( 'page layout', 'uikit', 'cards', 'elements' ),
            'render_template'   => 'template-parts/blocks/card/card.php',
            'enqueue_style'     => $stylesheet
        ));
        
        // Register slideshow block
        acf_register_block_type(array(
            'name'              => 'ppx-slideshow',
            'title'             => __('PPx Slideshow'),
            'description'       => __('Slideshow of images and text'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'images-alt',
            'keywords'          => array( 'page layout', 'uikit', 'slideshow', 'elements', 'slides', 'hero' ),
            'render_template'   => 'template-parts/blocks/slideshow/slideshow.php',
            'enqueue_style'     => $stylesheet,
            'enqueue_script'     => $script
        ));
        // Register taxonomy browser block
        acf_register_block_type(array(
            'name'              => 'ppx-tax-browser',
            'title'             => __('PPx Taxonomy Browser'),
            'description'       => __('Display a slider of taxonomies'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'category',
            'keywords'          => array( 'page layout', 'uikit', 'taxonomy',  'taxonomies', 'slider', 'elements' ),
            'render_template'   => 'template-parts/blocks/taxonomy-browser/taxonomy-browser.php',
            'enqueue_style'     => $stylesheet
        ));
        // Register single thumbnail block
        acf_register_block_type(array(
            'name'              => 'ppx-thumbnail',
            'title'             => __('PPx Thumbnail'),
            'description'       => __('A single thumbnail link'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'cover-image',
            'keywords'          => array( 'layout', 'thumbnail', 'text', 'image', 'content', 'image', 'link', 'picture' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/thumbnail/thumbnail.php',
            'enqueue_style'     => $stylesheet
        ));
        //Register single video block
        acf_register_block_type(array(
            'name'              => 'ppx-video',
            'title'             => __('PPx Video'),
            'description'       => __('Single video with title and description'),
            'mode'				=> 'preview',
            'category'          => 'Embeds',
            'icon'              => 'format-video',
            'keywords'          => array( 'video', 'content', 'youtube', 'block' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/video/video.php',
            'enqueue_style'     => $stylesheet
        ));
        // register accordion container
        acf_register_block_type(array(
            'name'              => 'ppx-accordion-container',
            'title'             => __('PPx Accordion Container'),
            'description'       => __('Accordion container as parent to Accordion Panel block'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'list-view',
            'keywords'          => array( 'layout', 'text', 'container','accordion container', 'block' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/accordion/accordion-container.php',
            'enqueue_style'     => $stylesheet
        ));
        // register accordion panel
        acf_register_block_type(array(
            'name'              => 'ppx-accordion-panel',
            'title'             => __('PPx Accordion Panel'),
            'description'       => __('Accordion panel as child to Accordion Container block'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'list-view',
            'keywords'          => array( 'layout', 'text', 'panel', 'accordion panel', 'block' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/accordion/accordion-panel.php',
            'enqueue_style'     => $stylesheet
        ));
        // register advance cards slider
        acf_register_block_type(array(
            'name'              => 'ppx-adv-cards-slider',
            'title'             => __('PPx Advanced Cards Slider'),
            'description'       => __('Slider for advanced cards'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'layout', 'cards', 'slider', 'advanced' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/adv-cards-slider/adv-cards-slider.php',
            'enqueue_style'     => $stylesheet
        ));
        // register feature post
        acf_register_block_type(array(
            'name'              => 'ppx-feature-post',
            'title'             => __('PPx Feature Post'),
            'description'       => __('Display A Featured Post'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'embed-post',
            'keywords'          => array( 'feature', 'post' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/featured-post/featured-post.php',
            'enqueue_style'     => $stylesheet
        ));
                // register feature post
        acf_register_block_type(array(
            'name'              => 'ppx-button',
            'title'             => __('PPx Button'),
            'description'       => __('Display A Button'),
            'mode'				=> 'preview',
            'category'          => 'layout',
            'icon'              => 'button',
            'keywords'          => array( 'button', 'display' ),
            'supports'			=> array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'template-parts/blocks/button/button.php',
            'enqueue_style'     => $stylesheet
        ));
    }
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
