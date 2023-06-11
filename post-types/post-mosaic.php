				<div class="entryhead">
                
                    <?php if ( has_post_thumbnail()){ ?>

                        <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>

                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('superblog_single',array('class' => 'tranz grayscale grayscale-fade'));  ?>
                        </a>
                
                    <?php } ?>
                
                </div><!-- end .entryhead --> 
                
                <div class="mosaicinside tmnf_titles_are_medium titles_over">
                
                	<?php superblog_meta_front(); ?>
                    
                    <div class="clearfix"></div>
                
                    <h2 class="tmnf_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>  

                    <div class="tmnf_excerpt"><p><?php echo superblog_excerpt( get_the_excerpt(), '80'); ?><span class="helip">...</span></p></div>
                   
        		</div>
				
                <div class="tmnf_gradient_alt"></div>