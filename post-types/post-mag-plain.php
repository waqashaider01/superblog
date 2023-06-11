				<div class="item tmnf_item tmnf_item_plain">  
        
                    <div class="item_inn tranz p-border rad">
                        
                        <?php superblog_meta_front();?>
                    
                        <h4 class="tmnf_title"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        
                        <div class="tmnf_excerpt"><p><?php echo superblog_excerpt( get_the_excerpt(), '100'); ?><span class="helip">...</span></p></div>
                    
                    </div><!-- end .item_inn -->
            
                </div>