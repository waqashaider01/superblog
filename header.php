<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <div class="wrapper_main <?php $themnific_redux = get_option( 'themnific_redux' ); 
        if (!empty($themnific_redux['tmnf-uppercase']))  {echo esc_attr($themnific_redux['tmnf-uppercase']) . ' ';}
        if (!empty($themnific_redux['tmnf-header-full']))  {if($themnific_redux['tmnf-header-full'] == '1') echo 'header_fullwidth '; }
        if (!empty($themnific_redux['tmnf-letter-space']))  {if($themnific_redux['tmnf-letter-space'] == '1') echo 'letter_space '; }
        if (!empty($themnific_redux['tmnf-post-meta-dis']))  {if($themnific_redux['tmnf-post-meta-dis'] == '1') echo 'meta_disabled '; }
        if (!empty($themnific_redux['tmnf-container-width']))  {echo esc_attr($themnific_redux['tmnf-container-width']) . ' ';}
        if (!empty($themnific_redux['tmnf-header-layout']))  {echo esc_attr($themnific_redux['tmnf-header-layout']) . ' ';}
        if (!empty($themnific_redux['tmnf-image-filter']))  {echo esc_attr($themnific_redux['tmnf-image-filter']) . ' ';}
        if ( is_active_sidebar( 'tmnf-sidebar' ) ) {echo 'tmnf-sidebar-active ';} else { echo 'tmnf-sidebar-null ';};
        if ( is_active_sidebar( 'tmnf-shop-sidebar' ) ) {echo 'tmnf-shop-sidebar-active ';} else { echo 'tmnf-shop-sidebar-null ';};
        if ( has_nav_menu( 'magazine-menu' ) ) {echo 'tmnf-menu-active ';}
    ?>">
    
        <div class="wrapper">
        
            <div class="wrapper_inn">
                
                <?php get_template_part('/includes/head_ad' );?>
            
                <div id="header" itemscope itemtype="https://schema.org//WPHeader">
                    
                    <div class="clearfix"></div>
                    
                    <?php 
                    $themnific_redux = get_option( 'themnific_redux' );
                    
                    if (empty($themnific_redux['tmnf-header-layout'])) {get_template_part('/includes/header_classic' );} else {
                        if($themnific_redux['tmnf-header-layout'] == 'header_slim'){
                            get_template_part('/includes/header_slim' );
                            
                        }elseif($themnific_redux['tmnf-header-layout'] == 'header_classic_2'){
                        get_template_part('/includes/header_classic_2' );
                            
                            }elseif($themnific_redux['tmnf-header-layout'] == 'header_centered'){
                            get_template_part('/includes/header_centered' );
                            
                            }elseif($themnific_redux['tmnf-header-layout'] == 'header_centered_2'){
                            get_template_part('/includes/header_centered_2' );
                            
                            } else {
                            get_template_part('/includes/header_classic' );
                        }
                    }
                    ?>
                    
                    <div class="clearfix"></div>
                    
                </div><!-- end #header  -->
        
    <div class="main_part">