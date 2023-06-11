				<div class="entryhead">
                
                    <?php if ( has_post_thumbnail()){ ?>

                        <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>

                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('superblog_grid',array('class' => 'tranz grayscale grayscale-fade'));  ?>
                        </a>
                
                    <?php } ?>                    
                
                </div><!-- end .entryhead --> 
                
                <div class="mosaicinside tmnf_titles_are_small titles_over">
                
                	<?php superblog_meta_front();?> 
                    
                    <div class="clearfix"></div>
                    
                    <h3 class="tmnf_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
                    
        		</div>
				
                <div class="tmnf_gradient_alt"></div>