<?php
/**
 * The loop for the blog posts
 *
 * @file           loop-blog.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<?php if ( have_posts() ) : ?>


	<?php if ( is_category() ) : ?>
        <header class="category-header">
            <h1 class="category-title">
                <?php $current_category = single_cat_title("", true); ?>
           </h1>
            <?php if ( category_description() ) : // Show an optional category description ?>
                <?php echo category_description(); ?>
            <?php endif; ?>
        </header>
    <?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php luminescence_paging_nav(); ?>

<?php else : ?>
	<?php //get_template_part( 'content', 'none' ); ?>
<?php endif; ?>