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
        'uk-padding-remove-horizontal',
        'uk-padding-large',
    );

?>
	
<?php get_template_part( 'template-parts/header', 'single' ); ?>
           
         
<main id="main">
    
    <div class="uk-container">
        <article id="post-<?php the_ID(); ?>" <?php post_class($article_classes); ?>>
            
        <?php if(get_post_thumbnail_id()):?>
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                    <?php echo get_img(get_post_thumbnail_id(), 'medium', '', 'uk-cover'); ?>
                    <canvas width="600" height="400"></canvas>
                </div>
                <div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Posted <?php echo get_the_date(); ?></h3>
                        <?php
                            the_content( sprintf(
                                wp_kses(/* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lv-base' ),
                                    array('span' => array('class' => array(),),)
                                ),
                                get_the_title()
                            ) );

                            ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="uk-card uk-card-default uk-padding-large">
                <div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Posted <?php echo get_the_date(); ?></h3>
                        <?php
                            the_content( sprintf(
                                wp_kses(/* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lv-base' ),
                                    array('span' => array('class' => array(),),)
                                ),
                                get_the_title()
                            ) );

                            ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
            

            
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lv-base' ),
                'after'  => '</div>',
            ) );
        ?>
        <!--<footer>-->
                <?php // ppx_starter_entry_footer(); ?>
        <!--</footer>-->
            <!--footer -->

        </article><!-- #post-<?php the_ID(); ?> -->
        
        <h4 class="uk-margin-remove-top">Related Categories</h4>
        <div class="uk-flex uk-flex-column uk-margin-large-bottom">
            <?php 
            $categories = wp_get_post_terms( $post->ID, 'news-category' );
            foreach($categories as $category){
               $cat_link = get_term_link($category);
               echo '<a href="'.$cat_link.'">'.$category->name.'</a>'; // category link
            }
             ?>
        </div>

    </div>



</main><!-- #main  -->

    
