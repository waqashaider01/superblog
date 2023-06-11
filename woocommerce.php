<?php get_header(); ?>

<div class="container_alt <?php if ( is_active_sidebar( 'tmnf-shop-sidebar' ) ) {echo 'tmnf-sidebar-shop-active ';} else { echo 'postbarNone-shop ';}; ?>">

	<div id="woo-site" class="post-wrapper postbarLeft">

         <div id="content" class="eightcol first">
         
            <div id="woo-inn" class="">
        
                <?php woocommerce_content(); ?>
                
            </div>    
    
        </div><!-- #content -->
        
        <div id="sidebar"  class="fourcol woocommerce">
        
            <?php if ( is_active_sidebar( 'tmnf-shop-sidebar' ) ) { ?>
            
                <div class="widgetable p-border">
                
                    <div class="sidewrap">
        
                    <?php dynamic_sidebar('tmnf-shop-sidebar') ?>
                    
                    </div>
                
                </div>
            
            <?php } ?>
               
        </div><!-- #sidebar -->
    
	</div><!-- .post-wrapper  -->
    
</div>

<?php get_footer(); ?>