<?php
//PPX-TTAGS 7.0 PRINT COMMENT LINK
if ( ! function_exists( 'ppx_comment_link' ) ) :
	/**
	 * Prints Comment invite link or Comment Count Link
	 */
	function ppx_comment_link() {
        
        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'lv-base' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
        
    }
endif;
