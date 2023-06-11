<?php
/**
 * The template for displaying comments
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="p-border">

<?php if ( have_comments() ) : ?>

    <h2 id="comments-title" class="dekoline">
		<?php printf( esc_attr(_n ( '1 Comment %2$s', '%1$s Comments %2$s', get_comments_number(),'superblog' )), number_format_i18n( get_comments_number() ),   get_the_title(','));?>
    </h2>
    
    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=54');?>
    </ol>
    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
    
        <div class="navigation">
        
            <div class="nav-previous fl"><?php previous_comments_link( esc_html__( 'Older Comments','superblog' ) ); ?></div>
            
            <div class="nav-next fr"><?php next_comments_link( esc_html__( 'Newer Comments','superblog' ) ); ?></div>
            
        </div><!-- .navigation -->
        
    <?php endif;  ?>

	<?php else : 
	if ( ! comments_open() ) :?>
    
        <p class="nocomments"><?php esc_html_e( 'Comments are closed.','superblog' ); ?></p>
        
    <?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>

</div><!-- #comments -->
