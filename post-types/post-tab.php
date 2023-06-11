<div class="tab-post p-border">

	<?php if ( has_post_thumbnail()) : ?>
    
        <div class="imgwrap">

            <div class="tmnf_rating tranz"><?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?></div>
        
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            
              <?php the_post_thumbnail( 'thumbnail',array('class' => "grayscale grayscale-fade")); ?>
              
            </a>
        
        </div>
         
    <?php endif; ?>
        
    <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo superblog_icon(); the_title(); ?></a></h4>
    
    <p class="meta meta_tmnfposts">
    	<span class="categs"><?php the_category(', ') ?></span>
    </p>

</div>