            <div class="tmnf_related">
			<?php $backup = $post;
			$tags = wp_get_post_tags($post->ID);
			
			if ($tags) { $tag_ids = array();
			
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>4, // Number of related posts that will be shown.
					'ignore_sticky_posts'=>1
				);
				
				$my_query = new wp_query($args);
				
				if( $my_query->have_posts() ) { echo '<h3 class="meta_deko related_title"><span>' . esc_html__( 'Related Posts','superblog').'</span></h3>'; while ($my_query->have_posts()) { $my_query->the_post();if(has_post_format('aside')||has_post_format('quote')){ } else { ?>
			
                <div <?php post_class('item item_related'); ?>>               	
                
                    <?php if ( has_post_thumbnail()){?>

                        <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>
                            
                        <div class="imgwrap tranz">
                            
                            <a href="<?php the_permalink(); ?>">
                            
                                <?php the_post_thumbnail('superblog_classic',array('class' => 'tranz'));  ?>
                                
                            </a>
                    
                        </div>
                        
                    <?php }  ?>    
        
                    <div class="item_inn tranz p-border rad">
                        
                        <?php superblog_meta_front();?>
                    
                        <h4 class="tmnf_title tmnf_title_small"><a class="link link--forsure" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                         
                    </div><!-- end .item_inn -->
            
                </div>
            
					<?php }
					
					} echo '';
					
				}
				
			}
			
			$post = $backup;
			
			wp_reset_postdata();?>
		</div>
		<div class="clearfix"></div>