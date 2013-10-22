<?php
/**
 * Displays status post format content
 *
 * @file           content-status.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content row-fluid">
	<div class="span1"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'luminescence_status_avatar', '70' ) ); ?></div>
	<div class="span11">
	<div class="entry-header">
		<header class="format-status-header">
			<h2><?php printf( __( 'Update By: ', 'luminescence' ) ) ; ?><?php the_author(); ?> <?php edit_post_link( __( '[ Edit ]', 'luminescence' ), '<span class="edit-link">', '</span>' ); ?><br /><span class="format-status-date"><?php printf( __( 'Date: ', 'luminescence' ) ) ; ?><?php echo get_the_date(); ?></span></h2>	
		</header>			
	</div><!-- .entry-header -->
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'luminescence' ) ); ?>
	</div>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php //luminescence_entry_meta(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'luminescence' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
<div class="entry-shadow">
	<img src="<?php echo get_template_directory_uri() ; ?>/images/post-shadow.png" alt="spacer"/>
</div>