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
 * Template Name: Edit Posts
 */

if ( isset( $_GET['post'] ) ) {
    $post_id = $_GET['post'];
    $current_post = get_post($post_id);
    $title = $current_post->post_title;
    $content = $current_post->post_content;

}




get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
  <!-- isset( $_GET['post']) -->
            <?php if( $_GET['post'] ): ?>
                   <form action="" id="primaryPostForm" method="POST">
         
                        <fieldset>
                            <label for="postTitle">Title</label>
                            <input type="text" name="postTitle" id="postTitle" value="<?php echo $title ?>" class="required" />
                        </fieldset>
                     
                        <fieldset>       
                            <label for="postContent">Content</label>
                            <textarea name="postContent" id="postContent" rows="8" cols="30"><?php echo $content ?></textarea>
                        </fieldset>
                        <fieldset>       
                            <label for="postStatus">Status</label>
                            <select name="postStatus" id="postContent" rows="8" cols="30">
                                <option value='published'>published</option>
                                <option value='future'>future</option>
                                <option value='draft'>draft</option>
                                <option value='pending'>pending</option>
                                <option value='private'>private</option>
                                <option value='trash'>trash</option>
                                <option value='auto-draft'>auto-draft</option>
                                <option value='inherit'>inherit</option>

                            </select>
                        </fieldset>
                        <fieldset>
                            <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                            <button type="submit"><?php _e( 'Add Post', 'framework' ); ?></button>
                        </fieldset>
                     
                    </form>
                <?php else:?>
                no post selected
            <?php endif;?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php 
    $postTitleError = '';
    if( isset( $_POST['submitted'] ) ) {
     
        if( trim( $_POST['postTitle'] ) === '' ) {
            $postTitleError = 'Please enter a title.';
            $hasError = true;
        }
    }
    //Show Error Message
    if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
<?php } ?>
<?php
     
    //do post form
    if( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
     
        if( trim( $_POST['postTitle'] ) === '' ) {
            $postTitleError = 'Please enter a title.';
            $hasError = true;
        }
     
        $post_information = array(
            'ID' => $post_id,
            'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
            'post_content' => $_POST['postContent'],
            'post_type' => 'post',
            'post_status' => $_POST['postStatus']
        );
     
     //echo "STATUS: ".$_POST['postStatus'];
        $post_id = wp_update_post( $post_information );
        if( $post_id) {
            wp_redirect( home_url());
            exit;
        }
     
    }
?>