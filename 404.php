<?php get_header(); 
$themnific_redux = get_option( 'themnific_redux' );?>
	
<div class="container">

    <div id="core" class="blogger postbarNone">
    
        <div id="content" class="eightcol not_found_content">
        
            <div class="page content_inn">
                
                <div class="errorentry entry cntr">
            
                    <h2><?php esc_html_e('404 • Page not found ','superblog');?></h2>
                
                    <p>&nbsp;
                    <?php esc_html_e('Oops! The page you are looking for does not exist.','superblog');?></p>
                    
                    <p><?php esc_html_e('It might have been moved or deleted. Try a search below...','superblog');?></p>
                        
                    <div class="cntr error-search"><?php get_search_form();?></div>
                
                </div>
        
            </div>
                
        </div><!-- #content -->
            
    </div>

</div>
    
<?php get_footer(); ?>