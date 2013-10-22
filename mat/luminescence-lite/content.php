<?php

/**
 * Blog intro content
 *
 * @file           content.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) {           
            echo '<div class="entry-thumbnail clearfix">' . the_post_thumbnail();
            echo '<div class="entry-date-box"><span class="entry-month">';
            echo get_the_time(__('M', 'luminescence')) . '</span>';
            echo '<span class="entry-date">';
            echo get_the_time(__('d', 'luminescence')) . '</span>';
            echo '<span class="entry-year">';
            echo get_the_time(__('Y', 'luminescence')) . '</span>';
            echo '</div></div>';            
        } else {           
            echo '<div class="entry-thumbnail clearfix" style="min-height:2em;"><div class="entry-date-box"><span class="entry-month">';
            echo get_the_time(__('M', 'luminescence')) . '</span>';
            echo '<span class="entry-date">';
            echo get_the_time(__('d', 'luminescence')) . '</span>';
            echo '<span class="entry-year">';
            echo get_the_time(__('Y', 'luminescence')) . '</span>';
            echo '</div></div>';
        }  ?> 

		<?php if ( is_single() ) : ?>
			<h1 class="entry-title">
            <?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'luminescence'); ?> </h1>
		<?php else : ?>
			<h1 class="entry-title">				
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'luminescence'); ?> </a>
			</h1>
			
		<?php endif; // is_single() ?>

		<div class="entry-meta">
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="featured-post">
						<?php _e( '( Featured Article )', 'luminescence' ); ?>
					</span>
				<?php endif; ?>
			<?php //luminescence_entry_meta(); ?>
			<?php //edit_post_link( __( 'Edit', 'luminescence' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading...', 'luminescence' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'luminescence' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if (is_single()) : ?>
		<?php edit_post_link(__('Edit', 'luminescence')); ?>
		<div class="entry-footer-meta">
			<?php the_tags(__('<span class="meta-tagged">Tagged with:</span>', 'luminescence') . ' ', ', ', '<br />'); ?> 
			<?php printf(__('<span class="meta-posted">Posted in: %s</span>', 'luminescence'), get_the_category_list(', ')); ?> <br />
			
		</div> 

		 <?php luminescence_paging_nav(); ?>

		
	<?php endif; ?>
	</footer><!-- .entry-meta -->
              
</article><!-- end of #post-<?php the_ID(); ?> -->

<div class="entry-shadow">
	<img src="<?php echo get_template_directory_uri() ; ?>/images/post-shadow.png" alt="spacer"/>
</div>