<div <?php post_class('item tranz '); ?>>
    	
	<div class="ribbon">
    
		<?php the_post_thumbnail('superblog_item',array('class' => 'img_standard')); ?>
        
        <div class="item_inn">
            
            <blockquote>
            
                <?php the_title(); ?>
            
            </blockquote>
            
            <div class="quuote_author"><?php the_content(); ?></div>
            
        </div>
        
    </div>
    
</div>