          	<div <?php post_class('item tmnf_item tmnf_item_grid'); ?>>               	
			
				<?php if ( has_post_thumbnail()){?>

                    <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>
                        
                    <div class="imgwrap tranz">
                        
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('superblog_grid',array('class' => 'tranz'));  ?>
                        </a>
                
                    </div>
                    
                <?php }  ?>    
    
            	<div class="item_inn tranz p-border titles_over">
                    
                    <?php superblog_meta_front();?>
                
                	<h3 class="tmnf_title"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                     
                
                </div><!-- end .item_inn -->
        
            </div>