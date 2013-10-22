<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 * Template Name: View Posts
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

         
            <?php
            $query = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => '-1',
                'post_status' => array(
                    'publish',
                    'pending',
                    'draft',
                    'private',
                    'trash'
                )
            ) );
            ?>
            <table id="allPosts">
                <tr>
                    <th style="width:100px">Post Title</th>
                    <th style="width:100px">Post Excerpt</th>
                    <th style="width:100px">Post Status</th>
                    <th style="width:100px">Actions</th>
                </tr>
                <?php
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <tr>
                    <td><?php echo get_the_title(); echo get_the_ID()?></td>
                    <td><?php the_excerpt(); ?></td>
                    <td><?php echo get_post_status( get_the_ID() ) ?></td>
                    <?php  
                        $edit_post = add_query_arg( 'post', get_the_ID(), get_permalink( 61 + wp_referer_field()  ) ) //$_POST['_wp_http_referer'] )
                    ?>
                    <td>
                        <a href="<?php echo $edit_post; ?>">Edit</a>
                        <a href="<?php echo $edit_post; ?>">Delete</a>
                    </td>
                </tr>
                <?php endwhile; endif; ?>
             
            </table>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>