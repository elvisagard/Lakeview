<?php
//PPX-TTAGS 8.0 POST THUMBNAIL
if ( ! function_exists( 'ppx_starter_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ppx_starter_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
            ?>
            <?php //PPX-TTAGS 4.1 - Thumbnail in single view
                echo '<div><strong>PPX-TTAGS 4.1</strong></div>';
            ?>
            
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
           
            <?php //PPX-TTAGS 4.2 - Thumbnail in index or loop view
                echo '<div><strong>PPX-TTAGS 4.1</strong></div>';
            ?>
        
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
