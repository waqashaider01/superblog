    <div class="header_classic_content">
        
        <div class="will_stick_wrap">
        
            <div class="header_row header_row_center clearfix will_stick">
            
                <div class="container_vis">
                
                    <?php get_template_part('/includes/head_titles'); ?>
                    
                    <?php $themnific_redux = get_option( 'themnific_redux' ); 
					
                        if (!empty($themnific_redux['tmnf-social-top-dis']))  {
							
                        get_template_part('/includes/head_social');
						
                    }?>
                    
                    <?php get_template_part('/includes/head_extend'); ?>
                
                    <?php get_template_part('/includes/head_nav'); ?>
                    
                </div>
                
            </div><!-- end .header_row_center -->
            
        </div>
    
    </div>