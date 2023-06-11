                        <div class="eleinside" data-dot="<?php the_title();?>">
                        
                        	<div <?php post_class('item item_slider tranz'); ?>>
                                
                                <?php if ( has_post_thumbnail()) { ?>
                                
                                	<div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>

                                    <div class="imgwrap tranz">
                                    
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                                        
                                        <?php the_post_thumbnail( 'superblog_classic', array('class' => 'tranz bg_image')); ?>
                                        
                                        </a>

                                </div>
                                    
                                <?php } ?>
                                
                                <div class="eleslideinside tranz p-border ghost">
                                    
                                	<?php superblog_meta_front();?>
                                
                                    <h4><a href="<?php the_permalink(); ?>"><?php echo superblog_icon(); the_title(); ?></a></h4>
                                
                                </div><!-- end .eleslideinside -->
                            
                            </div><!-- end .item_slider -->
                                    
                        </div>