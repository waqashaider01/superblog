<div class="head_extend">
   
    <a class="icon_extend searchOpen" href="#" ><i class=" icon-search-2"></i><span><?php esc_html_e('Search','superblog');?></span></a>
    
    <?php if ( is_active_sidebar( 'tmnf-sidebar-flyoff' ) ) { ?>
    
    	<a class="icon_extend menuOpen" href="#"><i class="fas fa-fire"></i><span><?php esc_html_e('Menu','superblog');?></span></a>
        
    <?php } ?>   
    
    <?php $themnific_redux = get_option( 'themnific_redux' ); if (!empty($themnific_redux['tmnf-darkmode-dis'])) { ?>             	
    
        <div class="tmnf-button">
        
            <div class="tmnf-button-inner-left"></div>
            
            <div class="tmnf-button-inner"></div>
            
        </div>
    
    <?php } ?>

</div>