<?php $themnific_redux = get_option( 'themnific_redux' );

if(empty($themnific_redux['tmnf-headad-script'])) {} else { 

	echo '<div class="headad">';
 
	echo wp_specialchars_decode($themnific_redux['tmnf-headad-script']);

	echo '</div>';

} if(empty($themnific_redux['tmnf-headad-image']['url'])) {} else {?> 

	<div class="headad">
	
		<a target="_blank" href="<?php echo esc_url($themnific_redux['tmnf-headad-target']);?>"><img src="<?php echo esc_url($themnific_redux['tmnf-headad-image']['url']);?>" alt="<?php esc_attr_e('Visit Sponsor','superblog');?>" /></a>
		
	</div>
	
<?php } ?>