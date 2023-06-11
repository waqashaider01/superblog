<?php

/*-----------------------------------------------------------------------------------*/
/* REDUX - speciable */
/*-----------------------------------------------------------------------------------*/



// detect plugin 
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
} else {
	
	function superblog_enqueue_reduxfall() {
		
		// Redux fallback
		wp_enqueue_style('reduxfall', get_template_directory_uri() . '/styles/reduxfall.css');
				
		// google link
		function tmnf_fonts_url() {
			$font_url = '';
			if ( 'off' !==  esc_attr_x( 'on', 'Google font: on or off','superblog')) {
				$font_url = add_query_arg( 'family', urlencode( 'Inter:300,400,500,600,700|Jost:600,500,800,700,400&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
			}
			return $font_url;
		}
		wp_enqueue_style( 'workart-fonts', tmnf_fonts_url(), array(), '1.0.0' );
		
	}
	add_action( 'wp_enqueue_scripts', 'superblog_enqueue_reduxfall' );
	
}

/*-----------------------------------------------------------------------------------*/
/* One Click Demo Import - speciable */
/*-----------------------------------------------------------------------------------*/


// detect plugin 
if ( class_exists( 'OCDI_Plugin' ) ) {

function tmnf_import_files() {
  return array(
  
  
  	// DEFAULT
    array(
      'import_file_name'           => esc_html__( 'Default Demo','superblog' ),
      'import_file_url'            => 'http://themestate.com/docs/superblog/import/superblog.xml',
      'import_widget_file_url'     => 'http://themestate.com/docs/superblog/import/superblog-widgets.wie',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themestate.com/docs/superblog/import/superblog-redux.json',
          'option_name' => 'themnific_redux',
        ),
      ),
      'import_preview_image_url'   => 'http://themestate.com/docs/superblog/import/superblog-screenshot.jpg',
      'preview_url'                => 'http://themestate.com/demo/superblog/',
    ),



    // london
    array(
      'import_file_name'           => esc_html__( 'London Demo','superblog' ),
      'import_file_url'            => 'http://themestate.com/docs/superblog/import/london/superblog-london.xml',
      'import_widget_file_url'     => 'http://themestate.com/docs/superblog/import/london/superblog-london-widgets.wie',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themestate.com/docs/superblog/import/london/superblog-london-redux.json',
          'option_name' => 'themnific_redux',
        ),
      ),
      'import_preview_image_url'   => 'http://themestate.com/docs/superblog/import/london/superblog-london-screenshot.jpg',
      'preview_url'                => 'http://themestate.com/demo/superblog/london/',
    ),



    // seoul
    array(
      'import_file_name'           => esc_html__( 'Seoul Demo','superblog' ),
      'import_file_url'            => 'http://themestate.com/docs/superblog/import/seoul/superblog-seoul.xml',
      'import_widget_file_url'     => 'http://themestate.com/docs/superblog/import/seoul/superblog-seoul-widgets.wie',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themestate.com/docs/superblog/import/seoul/superblog-seoul-redux.json',
          'option_name' => 'themnific_redux',
        ),
      ),
      'import_preview_image_url'   => 'http://themestate.com/docs/superblog/import/seoul/superblog-seoul-screenshot.jpg',
      'preview_url'                => 'http://themestate.com/demo/superblog/seoul/',
    ),

    // santiago
    array(
      'import_file_name'           => esc_html__( 'Santiago Demo','superblog' ),
      'import_file_url'            => 'http://themestate.com/docs/superblog/import/santiago/superblog-santiago.xml',
      'import_widget_file_url'     => 'http://themestate.com/docs/superblog/import/santiago/superblog-santiago-widgets.wie',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themestate.com/docs/superblog/import/santiago/superblog-santiago-redux.json',
          'option_name' => 'themnific_redux',
        ),
      ),
      'import_preview_image_url'   => 'http://themestate.com/docs/superblog/import/santiago/superblog-santiago-screenshot.jpg',
      'preview_url'                => 'http://themestate.com/demo/superblog/santiago/',
    ),
	
	
	// END OF ARRAY
	
  );
}
add_filter( 'pt-ocdi/import_files', 'tmnf_import_files' );


function tmnf_after_import_setup() {
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $bottom_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
			'bottom-menu' => $bottom_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'tmnf_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

}

/*-----------------------------------------------------------------------------------*/
/* THE END */
/*-----------------------------------------------------------------------------------*/
?>