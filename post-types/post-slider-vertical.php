                        <div class="eleinside" data-dot="<?php the_title();?>">
                        
                        	<div <?php post_class('item item_slider tranz'); ?>>
                                
                                <?php if ( has_post_thumbnail()) { ?>
                                    
                                    <a class="img_viewport" href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                                    
                                    	<?php the_post_thumbnail( 'superblog_slider_vertical', array('class' => 'tranz bg_image')); ?>
                                    
                                    </a>
                                    
                                <?php } ?>
                                
                                <div class="eleslideinside tranz tmnf_special_bg">
                                
                                    <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>
                                
                                	<div class="eleslideinside_inner">
                                
                                        <h2 class="tmnf_title_medium"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php echo superblog_icon(); the_title(); ?></a></h2>
                                    
                                    	<?php superblog_meta_front();?>
                                        
                                        <?php if ( has_excerpt( get_the_ID() ) ) {the_excerpt();} else {?>
                                            <div class="tmnf_excerpt meta_deko"><p><?php echo superblog_excerpt( get_the_excerpt(), '340'); ?><span class="helip">...</span></p></div>
                                        <?php } ?>
                                    
                                    </div>
                                
                                </div><!-- end .eleslideinside -->
                            
                            </div><!-- end .item_slider -->
                                    
                        </div>