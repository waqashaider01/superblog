    <div class="header_classic_content header_classic_2_content">
    
        <div class="header_row header_row_center clearfix">
        
            <div class="container">
            
                <?php get_template_part('/includes/head_titles'); ?>

                <?php get_template_part('/includes/head_ad' );?>
                
            </div>
            
        </div><!-- end .header_row_center -->
        
        <div class="will_stick_wrap">
        
            <div class="header_row header_row_bottom clearfix will_stick">
            
                <div class="container_vis">

                    <div class="spec_menu_wrap">

                        <div class="clearfix"></div>
                    
                        <?php get_template_part('/includes/head_nav'); ?>
                    
                        <?php get_template_part('/includes/head_extend'); ?>
                        
                        <?php $themnific_redux = get_option( 'themnific_redux' ); 
                        
                            if (!empty($themnific_redux['tmnf-social-top-dis']))  {
                                
                            get_template_part('/includes/head_social');
                            
                        }?>

                        <div class="clearfix"></div>

                    </div>
                
                </div>
                
            </div><!-- end .header_row_bottom -->
            
        </div>
    
    </div>