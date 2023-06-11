<input type="checkbox" id="show-menu" role="button">
<label for="show-menu" class="show-menu"><i class="fas fa-bars"></i><span class="close_menu">✕</span> <span class="label_text"><?php esc_html_e( 'Menu','superblog' ); ?></span></label>
 
<nav id="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
 
    <?php if ( function_exists('has_nav_menu') && has_nav_menu('main-menu') ) { 
            wp_nav_menu( array( 
				'depth' => 4, 
				'sort_column' => 'menu_order', 
				'container' => 'ul', 
				'menu_class' => 'nav', 
				'menu_id' => 'main-nav' , 
				'theme_location' => 'main-menu',
				)
			);
    } ?>
    
</nav><!-- end #navigation  -->