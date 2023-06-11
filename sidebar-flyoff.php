	<div id="flyoff" class="ghost tranz">
    
    	<a class="menuClose" href="#" ><i class="fas fa-times"></i><span><?php esc_html_e('Close','superblog');?></span></a>
    
    	<?php if ( is_active_sidebar( 'tmnf-sidebar-flyoff' ) ) { ?>
        
            <div class="widgetable p-border">
    
                <?php dynamic_sidebar('tmnf-sidebar-flyoff')?>
            
            </div>
            
		<?php } ?>
        
    </div><!-- #sidebar --> 
    
    <div class="action-overlay"></div>