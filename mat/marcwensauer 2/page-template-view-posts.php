
<?php
/*
Template Name: View Posts
*/

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

<table id='allPosts'>
    <tr>
        <th>Post Title</th>
        <th>Post Excerpt</th>
        <th>Post Status</th>
        <th>Actions</th>
    </tr>
    <?php
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <tr>
        <td><?php echo get_the_title(); ?></td>
        <td><?php the_excerpt(); ?></td>
        <td><?php echo get_post_status( get_the_ID() ) ?></td>
        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
    </tr>
    <?php endwhile; endif; ?>
 
</table>