<?php get_header();
$themnific_redux = get_option( 'themnific_redux' );?>

<div class="archive_title container">

    <h2><span class="maintitle"><?php echo esc_attr($s); ?></span></h2>
    
    <div class="subtitle"><?php esc_html_e('Search Results','superblog');?></div>
    
</div>

<?php 	
	$themnific_redux = get_option( 'themnific_redux' );
	
	if (!empty($themnific_redux['tmnf-blog-layout'])) {
		
		$themnific_blog_layout = $themnific_redux['tmnf-blog-layout']; 
		
	} else {
		$themnific_blog_layout = '';
	}
	
?>

<div id="core" class="<?php if (empty($themnific_redux['tmnf-blog-layout'])) {echo 'blogger_wide';} else {
				if($themnific_blog_layout == 'blog_layout'){
						echo 'blogger_sidebar';
					}elseif($themnific_blog_layout == 'blog_layout_2'){
						echo 'blogger_wide';
					}elseif($themnific_blog_layout == 'blog_layout_3'){
						echo 'blogger_sidebar blogger_list';
					} else {
						echo 'blogger_sidebar';
				}
			} ?>"> 

    <div class="container_alt">
    
        <div id="content" class="eightcol">
        
        	<div class="blogger">
            
            	<div class="item placeholder_item"></div>
            
				<?php if (have_posts()) : while (have_posts()) : the_post();
				
					if(has_post_format('quote')){get_template_part('/post-types/post-quote-post');} 
					
					else {
						if($themnific_blog_layout == 'blog_layout_3'){
							
							get_template_part('/post-types/post-mag-list');
							
						} else {
							
							get_template_part('/post-types/post-classic');
							
						}  
					} 
					
                endwhile; ?><!-- end post -->
                
                <div class="clearfix"></div>
                
              </div><!-- end latest posts section-->
              
              <div class="clearfix"></div>
              
                        <div class="pagination"><?php the_posts_pagination(); ?></div>
                        
                        <?php else : ?>
                        
                        	<div class="item item-no-search-results">
                            
                            	<div class="no-search-results">
                                
                                    <h2 itemprop="headline"><?php esc_html_e('Oops! Nothing found here','superblog');?></h2>
                                    
                                    <p><?php esc_html_e('Take a moment and do a search below','superblog');?></p>
                                    
									<?php get_search_form();?>
                                    
                                </div>
                                
                            </div>
                            
             			</div><!-- end latest posts section-->
                        
                        <?php endif; ?>
                        
    	</div><!-- end .content -->
        
		<?php if($themnific_blog_layout == 'blog_layout'|| $themnific_blog_layout == 'blog_layout_3'||$themnific_blog_layout == ''){
			
			get_sidebar();
			
		} ?>
        
    </div><!-- end .container -->
    
</div><!-- end #core -->	

<?php get_footer(); ?>