<?php

/*-----------------------------------------------------------------------------------
- Default
----------------------------------------------------------------------------------- */

add_action( 'after_setup_theme', 'superblog_theme_setup' );

function superblog_theme_setup() {
	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
		$content_width = 2600;

	/* Add theme support for automatic feed links. */
	add_theme_support( 'post-formats', array( 'video','audio', 'gallery','quote', 'link', 'aside' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	
	/* Add theme support for post thumbnails (featured images). */	
	add_theme_support('post-thumbnails');
	add_image_size('superblog_item', 446, 9999, false ); 			//(un-cropped) 
	add_image_size('superblog_slider', 1700, 700, true ); 			//(cropped)
	add_image_size('superblog_slider_vertical', 850, 850, true ); 	//(cropped)
	add_image_size('superblog_classic', 423, 380, true ); 			//(cropped)
	add_image_size('superblog_grid', 570, 570, true ); 				//(cropped)
	add_image_size('superblog_single', 1089, 730, true ); 			//(cropped)
	

	/* Add custom menus */
	register_nav_menus(array(
		'main-menu' => esc_html__( 'Main Menu','superblog' ),
		'bottom-menu' => esc_html__( 'Footer Menu','superblog' ),
	));

	/* Add your sidebars function to the 'widgets_init' action hook. */
	add_action( 'widgets_init', 'superblog_register_sidebars' );
	
	/* Make theme available for translation */
	load_theme_textdomain('superblog', get_template_directory() . '/lang' );

}

function superblog_register_sidebars() {
	
	register_sidebar(array('name' => esc_html__( 'Sidebar','superblog' ),'id' => 'tmnf-sidebar','description' => esc_html__( 'Sidebar widget section (displayed on posts / blog)','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget"><span>','after_title' => '</span></h5>'));
	
	register_sidebar(array('name' => esc_html__( 'Sidebar (Fly Off)','superblog' ),'id' => 'tmnf-sidebar-flyoff','description' => esc_html__( 'Sidebar widget section (hidden, accessible via menu button)','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget"><span>','after_title' => '</span></h5>'));

	
	//footer widgets
	register_sidebar(array('name' => esc_html__( 'Footer 1','superblog' ),'id' => 'tmnf-footer-1','description' => esc_html__( 'Widget section in footer - left','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget">','after_title' => '</h5>'));
	register_sidebar(array('name' => esc_html__( 'Footer 2','superblog' ),'id' => 'tmnf-footer-2','description' => esc_html__( 'Widget section in footer - center/left','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget">','after_title' => '</h5>'));
	register_sidebar(array('name' => esc_html__( 'Footer 3','superblog' ),'id' => 'tmnf-footer-3','description' => esc_html__( 'Widget section in footer - center/right','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget">','after_title' => '</h5>'));
	register_sidebar(array('name' => esc_html__( 'Footer 4','superblog' ),'id' => 'tmnf-footer-4','description' => esc_html__( 'Widget section in footer - right','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget">','after_title' => '</h5>'));
	
	//woo widgets
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(array('name' => esc_html__( 'Shop Sidebar','superblog' ),'id' => 'tmnf-shop-sidebar','description' => esc_html__( 'Sidebar widget section (displayed on shop pages)','superblog' ),'before_widget' => '<div class="sidebar_item">','after_widget' => '</div>','before_title' => '<h5 class="widget"><span>','after_title' => '</span></h5>'));
	}
	
}

//Add a pingback url auto-discovery header for single posts, pages, or attachments.

function superblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'superblog_pingback_header' );
	
/*-----------------------------------------------------------------------------------
- Framework - Please refrain from editing this section 
----------------------------------------------------------------------------------- */


// Set path to Framework and theme specific functions
$functions_path = get_template_directory() . '/functions/';

// Theme specific functionality
require_once ($functions_path . 'admin-functions.php');					// Custom functions and plugins

require_once ($functions_path . 'posttypes/post-metabox.php'); 			// custom meta box

// Add Redux options panel
if ( !isset( $themnific_redux ) && file_exists( get_template_directory()  . '/redux-framework/redux-themnific.php' ) ) {
    require_once( get_template_directory()  . '/redux-framework/redux-themnific.php' );
}

	
/*-----------------------------------------------------------------------------------
- Enqueues scripts and styles for front end
----------------------------------------------------------------------------------- */ 

function superblog_enqueue_style() {
	
	// Main stylesheet
	wp_enqueue_style( 'superblog-style', get_stylesheet_uri());
	
	// Font Awesome css	
	wp_enqueue_style('superblog-addons', get_template_directory_uri() .	'/styles/superblog-addons.css');
	
	// Font Awesome css	
	wp_enqueue_style('fontawesome', get_template_directory_uri() .	'/styles/fontawesome.css');
	
}
add_action( 'wp_enqueue_scripts', 'superblog_enqueue_style' );




// themnific custom css + chnage the order of how the sytlesheets are loaded, and overrides WooCommerce styles.
function superblog_custom_order() {
	
	// place wooCommerce styles before our main stlesheet
	if ( class_exists( 'WooCommerce' ) ) {
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_enqueue_style('woocommerce-frontend-styles', plugins_url() .'/woocommerce/assets/css/woocommerce.css');
	
		wp_enqueue_style('superblog-woo-custom', get_template_directory_uri().	'/styles/woo-custom.css');
		wp_enqueue_style('superblog-mobile', get_template_directory_uri().'/style-mobile.css');
	} else {
		wp_enqueue_style('superblog-mobile', get_template_directory_uri().'/style-mobile.css');
	}
}
add_action('wp_enqueue_scripts', 'superblog_custom_order');


function superblog_enqueue_script() {	

		// Load Common scripts	
		wp_enqueue_script('superblog-ownscript', get_template_directory_uri() .'/js/ownScript.js',array( 'jquery' ),'', true);
		
		// Load masonry
		$themnific_redux = get_option( 'themnific_redux' );
		if (!empty($themnific_redux['tmnf-blog-layout'])) {
			$themnific_blog_layout = $themnific_redux['tmnf-blog-layout']; 
		} else {$themnific_blog_layout = '';}
		$themnific_redux = get_option( 'themnific_redux' ); if ($themnific_blog_layout == 'blog_layout'|| $themnific_blog_layout == 'blog_layout_2') {
			if (is_archive()||is_home()||is_search()) {
				wp_enqueue_script('masonry');		
				wp_enqueue_script('superblog-masonry-start', get_template_directory_uri() .'/js/masonry.start.js',array( 'jquery' ),'', true);
			}
		} else {
			if (is_archive()||is_home()||is_search()) {
				wp_enqueue_script('masonry');		
				wp_enqueue_script('superblog-masonry-start', get_template_directory_uri() .'/js/masonry.start.js',array( 'jquery' ),'', true);
			}
		}
		
		// Singular comment script		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

}
	
add_action('wp_enqueue_scripts', 'superblog_enqueue_script');



/*-----------------------------------------------------------------------------------
- TGM_Plugin_Activation class.
----------------------------------------------------------------------------------- */
require_once get_template_directory()  . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'superblog_register_required_plugins' );
function superblog_register_required_plugins() {

    $plugins = array(
	

        // redux-framework
        array(
            'name'				=> esc_html__( 'Redux Framework','superblog' ),
            'slug'      		=> 'redux-framework',
            'required'  		=> true,
        ),     
        // elementor
        array(
            'name'				=> esc_html__( 'Elementor','superblog' ),
            'slug'      		=> 'elementor',
            'required'  		=> true,
        ),          
		// superblog-addons
        array(
            'name'				=> esc_html__( 'SuperBlog Addons','superblog' ),
            'slug'      		=> 'superblog-addons',
			'source'            => get_template_directory() . '/plugin/superblog-addons.zip', // The plugin source.
            'required'  		=> true,
        ),       
        // one-click-demo-import
        array(
            'name'				=> esc_html__( 'One Click Demo Import','superblog' ),
            'slug'      		=> 'one-click-demo-import',
            'required'  		=> false,
        ),      
        // top-10
        array(
            'name'				=> esc_html__( 'Top 10','superblog' ),
            'slug'      		=> 'top-10',
            'required'  		=> false,
        ),     
        // classic-widgets
        array(
            'name'				=> esc_html__( 'Classic Widgets','superblog' ),
            'slug'      		=> 'classic-widgets',
            'required'  		=> false,
        ),

    );
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins','superblog' ),
            'menu_title'                      => esc_html__( 'Install Plugins','superblog' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s','superblog' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.','superblog' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.','This theme requires the following plugins: %1$s.','superblog' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.','This theme recommends the following plugins: %1$s.','superblog' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','superblog' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','superblog' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','superblog' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','superblog' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','superblog' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','superblog' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','superblog' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','superblog' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer','superblog' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.','superblog' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s','superblog' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

	
/*-----------------------------------------------------------------------------------
- Other theme functions
----------------------------------------------------------------------------------- */

// icons - font awesome
function superblog_icon() {
	
	if(has_post_format('audio')) {return '<i title="'. esc_attr__('Audio','superblog').'" class="tmnf_icon fas fa-volume-up"></i>';
	}elseif(has_post_format('gallery')) {return '<i title="'. esc_attr__('Gallery','superblog').'" class="tmnf_icon far fa-image"></i>';
	}elseif(has_post_format('image')) {return '<i title="'. esc_attr__('Image','superblog').'" class="tmnf_icon fas fa-camera"></i>';	
	}elseif(has_post_format('link')) {return '<i title="'. esc_attr__('Link','superblog').'" class="tmnf_icon tmnf_icon_large fas fa-link"></i>';			
	}elseif(has_post_format('quote')) {return '<i title="'. esc_attr__('Quote','superblog').'" class="tmnf_icon fas fa-quote-right"></i>';		
	}elseif(has_post_format('video')) {return '<i title="'. esc_attr__('Video','superblog').'" class="tmnf_icon tmnf_icon_large far fa-play-circle"></i>';
	}
	
}


// link format
function superblog_permalink() {
	$linkformat = get_post_meta(get_the_ID(), 'themnific_linkss', true);
	if($linkformat) echo esc_url($linkformat); else the_permalink();
}


// remove 'Category' word on archives
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});


// new excerpt function

// Old Shorten Excerpt text for use in theme
function superblog_excerpt($text, $chars = 1620) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."";
	return $text;
}

function superblog_trim_excerpt($text) {
     $text = str_replace('[', '', $text);
     $text = str_replace(']', '', $text);
     return $text;
    }
add_filter('get_the_excerpt', 'superblog_trim_excerpt');


// excerpt class
function superblog_class_to_excerpt( $excerpt ){
    return '<div class="tmnf_excerpt">'.$excerpt.'</div>';
}
add_action('the_excerpt','superblog_class_to_excerpt');

// meta sections

if ( ! function_exists ( 'superblog_meta_categ' ) ) {
function superblog_meta_categ() { ?>   
	<p class="meta meta_categ tranz <?php $themnific_redux = get_option( 'themnific_redux' ); if(isset($themnific_redux['tmnf-post-meta-dis']) ? $themnific_redux['tmnf-post-meta-dis'] : null) echo 'tmnf_hide';?>">
        <span class="categs"><?php the_category(' • ') ?></span>
    </p>
<?php }
}

if ( ! function_exists ( 'superblog_meta_categ_alt' ) ) {
	function superblog_meta_categ_alt() { ?>   
		<p class="meta meta_categ_alt tranz <?php $themnific_redux = get_option( 'themnific_redux' ); if(isset($themnific_redux['tmnf-post-meta-dis']) ? $themnific_redux['tmnf-post-meta-dis'] : null) echo 'tmnf_hide';?>">
			<span class="categs"><?php the_category(' • ') ?></span>
		</p>
	<?php }
}

if ( ! function_exists ( 'superblog_meta_front' ) ) {
	function superblog_meta_front() { ?>   
		<p class="meta tranz meta_deko <?php $themnific_redux = get_option( 'themnific_redux' ); if(isset($themnific_redux['tmnf-post-meta-dis']) ? $themnific_redux['tmnf-post-meta-dis'] : null) echo 'tmnf_hide';?>">
			<span class="post-date"><?php the_time(get_option('date_format')); ?><span class="meta_divider"> • </span></span>
			<span class="categs"><?php the_category(' • ') ?></span>
			<?php if ( function_exists( 'echo_tptn_post_count' )) {?>
				<span class="post-views"><span class="meta_divider"> • </span>
				<?php esc_html_e('Views: ','superblog'); echo do_shortcode("[tptn_views]"); ?>
				</span>
			<?php } ?>
		</p>
	<?php }
}

if ( ! function_exists ( 'superblog_meta_single' ) ) {
	function superblog_meta_single() { ?>    
		<p class="meta meta_single tranz <?php $themnific_redux = get_option( 'themnific_redux' ); if(isset($themnific_redux['tmnf-post-meta-dis']) ? $themnific_redux['tmnf-post-meta-dis'] : null) echo 'tmnf_hide';?>">
			<?php 
			echo '<span class="author"><span>'; esc_html_e('Written by ','superblog');echo '</span>'; the_author_posts_link();echo '<span class="meta_divider">&bull;</span></span>';
			?>
			<span class="post-date"><?php the_time(get_option('date_format')); ?><span class="meta_divider">&bull;</span></span>
			<span class="post-time"><?php the_time(); ?><span class="meta_divider">&bull;</span></span>
			<span class="categs"><?php the_category(', ') ?></span>
			<span class="commes"><?php comments_number( '', esc_html__('• One Comment', 'superblog'), esc_html__('• % Comments', 'superblog') );?></span>
		</p>
	<?php
	}
}

if ( ! function_exists ( 'superblog_meta_more' ) ) {
	function superblog_meta_more() { ?>   
		<span class="meta_more tranz <?php $themnific_redux = get_option( 'themnific_redux' ); if(isset($themnific_redux['tmnf-post-meta-dis']) ? $themnific_redux['tmnf-post-meta-dis'] : null) echo 'tmnf_hide';?>">
				<a class="readmore" href="<?php superblog_permalink() ?>"><?php esc_html_e('Read More','superblog');?> <span class="gimmimore tranz">&rarr;</span></a>
	
		</span>
	<?php }
}



//////////////GUTENBERG

function superblog_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'superblog-gutenberg', get_theme_file_uri( '/styles/gutenberg.css' ), false, '1.1.1', 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'superblog-fonts', superblog_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'superblog_gutenberg_styles' );

/**
 * Register custom fonts.
 */
function superblog_fonts_url() {
	$fonts_url = '';
	$sourcesans = esc_html_x( 'on', 'Source Sans Pro font: on or off', 'superblog' );
	$opensans = esc_html_x( 'on', 'Open Sans font: on or off', 'superblog' );

	if ( 'off' !== $sourcesans || 'off' !== $opensans ) {
		$font_families = array();

		if ( 'off' !== $sourcesans ) {
			$font_families[] = 'Source Sans Pro:400,500,600,700,800';
		}

		if ( 'off' !== $opensans ) {
			$font_families[] = 'Open Sans:400,400i,500,600,700';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}



// span to default widgets
function superblog_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="cat_nr">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}
add_filter('wp_list_categories', 'superblog_cat_count_span');



function superblog_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="cat_nr">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'superblog_archive_count');



// override woocommerce image
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 160,
		'height' => 160,
		'crop'   => 1,
	);
} );



//dark theme mode  (forked from https://wordpress.org/plugins/wp-night-mode/ )
function superblog_dark_mode($classes) {
    $superblog_night_mode = isset($_COOKIE['tmnfNightMode']) ? $_COOKIE['tmnfNightMode'] : '';
    //if the cookie is stored..
    if ($superblog_night_mode !== '') {
        // Add 'dark-mode' body class
        return array_merge($classes, array('dark-mode'));
    }
    return $classes;
}
add_filter('body_class', 'superblog_dark_mode');


// Customize wp_review_show_total() output
function superblog_percent_wrap($content, $id, $type, $total) {
	  $content = preg_replace('/%/', '<span>%</span>', $content);
  return $content;
}
add_filter('wp_review_show_total', 'superblog_percent_wrap', 10, 4);

?>