<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PPx_Starter_Theme
 */

//PPX-SNGL 1.0 SINGLE-ANNOUNCEMENTS


?>

<?php get_header();?>

<article id="site-wrapper">
    
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/builder-news');
    endwhile; // End of the loop.
    ?>
                
</article>
<!-- #site-wrapper -->

<?php get_footer(); ?>