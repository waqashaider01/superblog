<?php get_header();
if (have_posts()) : while (have_posts()) : the_post();
$single_sidebar = get_post_meta(get_the_ID(), 'themnific_single_sidebar', true);
$single_featured = get_post_meta(get_the_ID(), 'themnific_single_featured', true); ?>

<div class="post_wrap postbar<?php echo esc_attr($single_sidebar)  ?>">

    <div class="container_alt container_vis">
    
        <div id="core" <?php post_class(); ?>>
        
            <div id="content" class="eightcol">
            
                <div class="content_inn p-border">
                
                    <?php if (is_single()) { superblog_meta_single();} ?>
                    
                    <h1 class="entry-title tmnf_title_large p-border"><?php the_title(); ?></h1>
                    
                    <?php if (is_single()) { if ( has_excerpt( $post->ID ) ) {the_excerpt();} }?>
                    
                    <?php 	
                    $single_featured = get_post_meta(get_the_ID(), 'themnific_single_featured', true);
					
                    if ($single_featured == 'No')  {  } 
					
                    else {  ?>
                    
                        <div class="entryhead entryhead_single">
                        
                            <?php the_post_thumbnail('superblog_single',array('class' => 'standard grayscale grayscale-fade'));?>
                            
                        </div>
                        
                    <?php }?>
                    
                    <div class="entry">
                    
                        <?php the_content();?>
                        
                        <?php 
                        $themnific_redux = get_option( 'themnific_redux' );
						
                        echo do_shortcode(esc_attr($themnific_redux['tmnf-mailchimp'])); ?>
                        
                        <div class="clearfix"></div>
                        
						<?php //tags/likes
						
                        $themnific_redux = get_option( 'themnific_redux' );
						
                        if (empty($themnific_redux['tmnf-post-likes-dis'])) {
							
                            } else {
								
                                the_tags( '<p class="tmnf_posttag">', ' ', '</p>' ); ?>
                                
                                <p class="modified small cntr" itemprop="dateModified" ><?php esc_html_e('Last modified','superblog');?>: <?php the_modified_date(); ?></p>
                                
                        <?php }?>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                    
					<?php //post pagination
					
                    echo '<div id="post_pages" class="post-pagination"><div class="post_pagination_inn">';
					
                    wp_link_pages(array(
                        'before' => '<p>',
                        'after' => '</p>',
                        'next_or_number' => 'next_and_number', # activate parameter overloading
                        'nextpagelink' => '<span class="tmnf_next_link">'.esc_html__('Next »','superblog').'</span>',
                        'previouspagelink' => '<span class="tmnf_prev_link">'.esc_html__('« Previous','superblog').'</span>',
                        'pagelink' => '%',
                        'echo' => 1 )
                    );
					
                    echo '</div></div>';?>
                    
                    <?php if (is_single()) {get_template_part('/single-info');} else {comments_template();}?>
                    
                </div><!-- end .content_inn -->
                
            </div><!-- end #content -->
            
            <?php if($single_sidebar == 'None'){ } else { get_sidebar();} ?>
            
            <div class="clearfix"></div>
            
        </div><!-- end #core -->
        
    </div><!-- end .container -->

</div><!-- end .post_wrap -->

<div class="clearfix"></div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>