          	<div <?php post_class('tmnf_item item_big tranz'); ?>>
                
                <h2 class="tmnf_title"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            
				<?php if ( has_post_thumbnail()){?>

                    <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>

                    <div class="imgwrap tranz">
                        
                        <a href="<?php the_permalink(); ?>">
                        
                            <?php the_post_thumbnail('superblog_item_landscape',array('class' => 'tranz'));  ?>
                            
                        </a>
                        
                    </div>
                    
                <?php }  ?>   
                 
            	<div class="item_inn tranz">
                    
                    <?php superblog_meta_front();?>
                    
                    <?php if ( has_excerpt( get_the_ID() ) ) {the_excerpt();} else {?>
                    	<div class="tmnf_excerpt"><p><?php echo superblog_excerpt( get_the_excerpt(), '340'); ?><span class="helip">...</span></p></div>
                    <?php } ?>
                    
                	<?php superblog_meta_more(); ?>
                    
                </div><!-- end .item_inn -->
                
                <div class="clearfix"></div>
                
            </div>