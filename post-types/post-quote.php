<div <?php post_class('tranz ribbon'); ?>>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
		<?php the_post_thumbnail('tmnf-standard',array('itemprop' => 'image'));  ?>
    
        <blockquote>
        
            <?php the_content(); ?>
        
        </blockquote>
        
        <p class="quuote_author"> &bull; <?php the_title(); ?> &bull; </p>
            
    <?php endwhile; else: endif ?>   
         
</div>