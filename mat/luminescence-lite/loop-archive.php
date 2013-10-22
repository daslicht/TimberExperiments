<?php
/**
 * The loop for the archive results
 *
 * @file           loop-archive.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<?php if ( have_posts() ) : ?>
	<header class="archive-header">
		<h1 class="archive-title"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'luminescence' ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'luminescence' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'luminescence' ) ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'luminescence' ), get_the_date( _x( 'Y', 'yearly archives date format', 'luminescence' ) ) );
			else :
				_e( 'Archives', 'luminescence' );
			endif;
		?></h1>
	</header><!-- .archive-header -->

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php luminescence_paging_nav(); ?>

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>