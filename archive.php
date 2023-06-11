<?php get_header(); 
$themnific_redux = get_option( 'themnific_redux' );?>

<div class="archive_title container">

	<?php
    the_archive_title( '<h2><span class="maintitle">', '</span></h2>' );
    the_archive_description( '<div class="subtitle">', '</div>' );
    ?>
    
</div>

<?php // blog content - start
	$themnific_redux = get_option( 'themnific_redux' );
	if (!empty($themnific_redux['tmnf-blog-layout'])) {
		$themnific_blog_layout = $themnific_redux['tmnf-blog-layout']; 
	} else {$themnific_blog_layout = '';}
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
            
				<?php 
                if (have_posts()) : while (have_posts()) : the_post();
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
                
            </div><!-- end .blogger-->
            
            <div class="clearfix"></div>
            
                <div class="pagination"><?php the_posts_pagination(); ?></div>
                
                <?php else : ?>
                
                    <div class="errorentry entry ghost">
                    
                        <h1 class="post entry-title" itemprop="headline"><?php esc_html_e('Nothing found here','superblog');?></h1>
                        
                        <h4><?php esc_html_e('Perhaps You will find something interesting from these lists...','superblog');?></h4>
                        
                        <div class="hrline"></div>
                        
                        <?php get_template_part('/includes/uni-404-content');?>
                        
                    </div>
                    
            </div><!-- end .blogger 2nd -->
            
            <?php endif; ?>
            
    	</div><!-- end .content -->
        
		<?php if($themnific_blog_layout == 'blog_layout'|| $themnific_blog_layout == 'blog_layout_3'||$themnific_blog_layout == ''){
			get_sidebar();
		} ?>
        
    </div><!-- end .container -->
    
</div><!-- end #core -->
	
<?php get_footer(); ?>