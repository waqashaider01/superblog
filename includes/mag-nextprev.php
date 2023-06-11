<div id="post_nav" class="p-border">

    <?php $prevPost = get_previous_post(false);// false = all categories
	
	if($prevPost) {
		
		$args = array(
			'posts_per_page' => 1,
			'include' => $prevPost->ID
		);
		
		$prevPost = get_posts($args);
		
		foreach ($prevPost as $post) {
			
			setup_postdata($post);
			
    ?>
        <div class="post_nav_item post_nav_prev tranz p-border">
        
            <span class="post_nav_arrow">&larr;</span>
            
        	<a href="<?php superblog_permalink(); ?>">
            
        		<?php the_post_thumbnail('thumbnail');?>
                
            </a>
            
            <a class="post_nav_text" href="<?php superblog_permalink(); ?>">
            
            	<span class="post_nav_label"><?php esc_html_e('Previous Story','superblog');?></span><br/><?php the_title(); ?>
            </a>
            
        </div>
        
    <?php
                wp_reset_postdata();
				
            } //end foreach
			
        } // end if
         
        $nextPost = get_next_post(false);// false = all categories
		
        if($nextPost) {
			
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
			
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
				
                setup_postdata($post);
    ?>
        <div class="post_nav_item post_nav_next tranz p-border">
        
            <span class="post_nav_arrow">&rarr;</span>
            
        	<a href="<?php superblog_permalink(); ?>">
            
        		<?php the_post_thumbnail('thumbnail');?>
                
            </a>
            
            <a class="post_nav_text" href="<?php superblog_permalink(); ?>">
            
            	<span class="post_nav_label"><?php esc_html_e('Next Story','superblog');?></span><br/><?php echo the_title(); ?>
            
            </a>
            
        </div>
        
    <?php
	
                wp_reset_postdata();
				
            } //end foreach
			
        } // end if
		
    ?>
    
</div>