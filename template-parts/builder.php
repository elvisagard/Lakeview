<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PPx_Starter_Theme
 */

?>

<?php 
//PPX-CNT 1.0 CONTENT
//echo '<div><strong>PPX-CNT</strong></div>'; 

// Get global variables for content layout width
$ppx_contentWidth = wp_cache_get('ppx_contentFullWidth');
$ppx_sidebarWidth = wp_cache_get('ppx_sidebarWidth');


// Set widths for main content with sidebar
$ppx_contentWidth = is_active_sidebar( 'sidebar-1' ) ? wp_cache_get('ppx_contentSidebarWidth') : null;


    $article_classes = array(
        'uk-article',
        'uk-padding-remove-horizontal',
        'uk-padding-large',
        'uk-flex',
        'uk-flex-wrap',
        'uk-grid-medium',
        'uk-child-width-expand@s'
//        'uk-column-1-2@l',
//        'uk-column-divider'
    );

?>
	
<?php get_template_part( 'template-parts/header', 'single' ); ?>
           
         
<main id="main">
    
    <div class="uk-container">
        <article id="post-<?php the_ID(); ?>" <?php post_class($article_classes); ?> uk-grid>
            
        <?php if(get_post_thumbnail_id()):?>
            <div class=" uk-height-medium uk-width-1-3@m">
                <?php echo get_img(get_post_thumbnail_id(), 'md', 'uk-object-cover', ''); ?>
            </div>
        <?php endif; ?>
        
        <div class="uk-width-2-3@m"">
            <?php
            the_content( sprintf(
                wp_kses(/* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lv-base' ),
                    array('span' => array('class' => array(),),)
                ),
                get_the_title()
            ) );


            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lv-base' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>
        <!--<footer>-->
                <?php // ppx_starter_entry_footer(); ?>
        <!--</footer>-->
            <!--footer -->

        </article><!-- #post-<?php the_ID(); ?> -->
    </div>



</main><!-- #main  -->

    
