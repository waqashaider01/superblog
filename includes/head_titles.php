<?php $themnific_redux = get_option( 'themnific_redux' ); ?>

<div id="titles" class="tranz2">

	<?php if(empty($themnific_redux['tmnf-main-logo']['url'])) { ?>
    
		<h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a></h1>
            
	<?php } else { ?>  
            	
        <a class="logo logo_main" href="<?php echo esc_url(home_url('/')); ?>">
        
            <img class="this-is-logo tranz" src="<?php echo esc_url($themnific_redux['tmnf-main-logo']['url']);?>" alt="<?php bloginfo('name'); ?>"/>
            
        </a> 
        
        <a class="logo logo_inv" href="<?php echo esc_url(home_url('/')); ?>">
        
            <img class="this-is-logo tranz" src="<?php echo esc_url($themnific_redux['tmnf-main-logo-inv']['url']);?>" alt="<?php bloginfo('name'); ?>"/>
            
        </a>
                
	<?php } ?>
        
</div><!-- end #titles  -->