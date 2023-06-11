                    <div id="footer" class="p-border">
                    
                        <div class="container container_alt"> 
                        
                            <?php get_template_part('/includes/uni-bottombox'); ?>
                                    
                        </div>
                        
                        <div class="clearfix"></div>
                
                        <div class="footer-below p-border">
                        
                        	<div class="container container_alt">
                            
								<?php 
                            	$themnific_redux = get_option( 'themnific_redux' ); if (!empty($themnific_redux['tmnf-mailchimp']))  {?> 
                                
                                    <div class="mailchimp_section_alt">
                                    
                                        <?php echo do_shortcode(esc_attr($themnific_redux['tmnf-mailchimp']));?>
                                        
                                    </div>
                                    
                                <?php } ?>
                            
								<?php if (empty($themnific_redux['tmnf-social-bottom-dis'])) {
									
									} else {?>
                                    
                                    <div class="footer_icons">
                                    
                                        <div class="container">
                                        
                                            <?php get_template_part('/includes/head_social' );?> 
                                            
                                        </div>
                                        
                                    </div>
                                    
                                <?php } ?>
                                
                                <div class="clearfix"></div>
                            
                            </div>
                            
                        </div>
                        
                        <div class="footer-below p-border">
                                
                            <?php if (function_exists('has_nav_menu') && has_nav_menu('bottom-menu')) {
								wp_nav_menu( array( 
									'depth' => 1, 
									'sort_column' => 'menu_order', 
									'container' => 'ul', 
									'menu_class' => 'bottom-menu', 
									'menu_id' => '' , 
									'theme_location' => 'bottom-menu') );
							} ?>
                                
							<?php $themnific_redux = get_option( 'themnific_redux' ); if(empty($themnific_redux['tmnf-footer-editor'])) { } else {
								
								echo '<div class="footer_text">' . wp_kses_post($themnific_redux['tmnf-footer-editor']). '</div>';
								
							} ?>
                            
                        </div>
                            
                    </div><!-- /#footer  -->
                    
                	<div class="clearfix"></div>
                
                </div><!-- /.main_part class  -->
                
            </div><!-- /.warpper_inn class  -->
            
            <div id="curtain" class="tranz">
                
                <?php get_search_form();?>
                
                <a class='curtainclose rad' href="<?php esc_url('#'); ?>" ><i class="fa fa-times"></i></a>
                
            </div>
                
            <div class="scrollTo_top rad ribbon">
            
                <a title="<?php esc_attr_e('Scroll to top','superblog');?>" class="rad" href="<?php esc_url('#'); ?>">&uarr;</a>
                
            </div>
            
        </div><!-- /.warpper class  -->
        
    	<?php get_template_part('/sidebar-flyoff' ); ?> 
        
    </div><!-- /.upper class  -->
    
    <?php wp_footer(); ?>

</body>
</html>