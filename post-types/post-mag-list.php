          	<div <?php post_class('item tmnf_item tmnf_item_list'); ?>>               	
			
				<?php if ( has_post_thumbnail()){?>
                        
                    <div class="imgwrap tranz">

                        <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>
                        
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('superblog_grid',array('class' => 'tranz'));  ?>
                        </a>
                
                    </div>
                    
                <?php }  ?>    
    
            	<div class="item_inn tranz p-border rad">
                    
                    <?php superblog_meta_front();?>
                
                	<h3 class="tmnf_title"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php echo superblog_icon(); the_title(); ?></a></h3>
                    
                    <?php if ( has_excerpt( get_the_ID() ) ) {the_excerpt();} else {?>
                    	<div class="tmnf_excerpt meta_deko"><p><?php echo superblog_excerpt( get_the_excerpt(), '140'); ?><span class="helip">...</span></p></div>
                    <?php } ?>
                    
                	<?php superblog_meta_more(); ?>
                     
                
                </div><!-- end .item_inn -->
        
            </div>