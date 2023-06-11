<?php
/*
Template Name: Elementor Full Width (Transparent Header)
Template Post Type: page
*/
?>
<?php get_header();

	if (have_posts()) : while (have_posts()) : the_post();
	
		the_content();
	
	endwhile; endif;

get_footer(); ?>