<?php

    if ( ! class_exists( 'superblog_redux_config' ) ) {

        class superblog_redux_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                $this->initSettings();

            }

            public function initSettings() {
                $this->theme = wp_get_theme();
                $this->setArguments();
                $this->setHelpTabs();
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }
                add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            // Remove the demo link
            function remove_demo() {
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( esc_html__( 'Customize &#8220;%s&#8221;','superblog' ), $this->theme->display( 'Name' ) );
                $item_info = ob_get_contents();
                ob_end_clean();

                $sampleHTML = '';

                // ACTUAL DECLARATION OF SECTIONS
                $this->sections[] = array(
                    'title'  => esc_html__( 'General Settings','superblog' ),
                    'desc'   => esc_html__( '','superblog' ),
                    'icon'   => 'el el-cogs',
                    'fields' => array( // header end
					

                        array(
                            'id'       => 'tmnf-main-logo',
                            'type'     => 'media',
							'default'  => '',
							'readonly' => false,
                            'preview'  => true,
							'url'      => true,
                            'title'    => esc_html__( 'Main Logo','superblog' ),
                            'desc'     => esc_html__( 'Upload a logo for your theme','superblog' ),
                        ),
					
					
												
                      	array(
                            'id'       => 'tmnf-container-width',
                            'type'     => 'radio',
                            'title'    => esc_html__('Container Width Limitation','superblog'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'tmnf_width_wide' => esc_html__('Wide (1480px)','superblog'),
                                'tmnf_width_normal' => esc_html__('Normal (1360px)','superblog'),
                                'tmnf_width_narrow' => esc_html__('Narrow (1200px)','superblog'),
                                'tmnf_width_minimal' => esc_html__('Minimal (1060px)','superblog'),
                            ),
                            'default'  => 'tmnf_width_normal'
                        ),
												
                      	array(
                            'id'       => 'tmnf-blog-layout',
                            'type'     => 'radio',
                            'title'    => esc_html__('Blog Layout','superblog'),
                            'subtitle' => esc_html__('Select layout and styling for the blog template','superblog'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'blog_layout' => esc_html__('Masonry Blog With Sidebar','superblog'),
                                'blog_layout_2' => esc_html__('Masonry Blog Without Sidebar','superblog'),
                                'blog_layout_3' => esc_html__('List Blog With Sidebar','superblog'),
                            ),
                            'default'  => 'blog_layout'
                        ),
												
                      	array(
                            'id'       => 'tmnf-uppercase',
                            'type'     => 'radio',
                            'title'    => esc_html__('Uppercase Fonts','superblog'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'upper_none' => esc_html__('None','superblog'),
                                'upper' => esc_html__('Minimal','superblog'),
                                'upper upper_medium' => esc_html__('Medium','superblog'),
                                'upper upper_maxi' => esc_html__('Maximal','superblog'),
                            ),
                            'default'  => 'upper'
                        ),
						
                        array(
                            'id'       => 'tmnf-letter-space',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Additional Letter Space','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),
												
                      	array(
                            'id'       => 'tmnf-image-filter',
                            'type'     => 'radio',
                            'title'    => esc_html__('Images Filter','superblog'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'image_css_none' => esc_html__('None','superblog'),
                                'image_css_desaturate' => esc_html__('Desaturate','superblog'),
                                'image_css_desaturate_half' => esc_html__('Desaturate 50%','superblog'),
                                'image_css_sepia' => esc_html__('Sepia','superblog'),
                                'image_css_bright' => esc_html__('Bright','superblog'),
                            ),
                            'default'  => 'image_css_none'
                        ),
						
						array(
                            'id'       => 'tmnf-mailchimp',
                            'type'     => 'text',
                            'title'    => esc_html__( 'MailChimp Shortcode','superblog' ),
							'default'  => '',
                            'validate' => 'html',
						),
					
					// section end
                    )
                );
				// General Layout THE END
	



                $this->sections[] = array(
                    'type' => 'divide',
                );




                $this->sections[] = array(
                    'title'  => esc_html__( 'Primary Styling','superblog' ),
                    'desc'   => esc_html__( '','superblog' ),
                    'icon'   => 'el el-tint',
                    'fields' => array( // header end



						array(
                            'id'          => 'superblog-body-typography',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Typography','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => true,
                            'output'      => array( 'body,input,button,textarea' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography used as the general text.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '400',
                                'font-family' => 'Inter',
                                'google'      => true,
                                'font-size'   => '15px',
                            ),
                        ),

                        array(
                            'id'       => 'superblog-background',
                            'type'     => 'background',
                            'title'    => esc_html__( 'Main Body Background','superblog' ),
                            'subtitle' => esc_html__( 'Body background with image, color, etc.','superblog' ),
                            'output'   => array('.wrapper_inn,.postbar,.item_small.has-post-thumbnail .item_inn' ),
                            'default'     => array(
                                'background-color'       => '#FAFAFA',
                            ),
                        ),

                        array(
                            'id'       => 'superblog-ghost',
							'type'      => 'color',
							'title'     => esc_html__('Ghost Background Color','superblog'),
							'subtitle'  => esc_html__('Set alternative background color (similar to the Main Body Background) ','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'background-color' => '.ghost,.sidebar_item,textarea,input,.tmnf_posttag a,.item_big:before,.entry blockquote'
							)
						),

                        array(
                            'id'       => 'superblog-link-color',
                            'type'     => 'link_color',
                            'title'    => esc_html__( 'Links Color Option','superblog' ),
                            'subtitle' => esc_html__( 'Pick a link color','superblog' ),
							'output'   => array( 'a' ),
                            'default'  => array(
                                'regular' => '#000',
                                'hover'   => '#FA430B',
                                'active'  => '#000',
                            )
                        ),
						

						
						array(
							'id'        => 'superblog-color-entry-link',
							'type'      => 'color',
							'title'     => esc_html__('Entry Links (in post texts)','superblog'),
							'subtitle'  => esc_html__('Pick a custom color for post links.','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'color' => '.entry p a,.entry ol a,.entry ul a,.elementor-text-editor a',
								'border-color' => '.entry p a,.entry ol a,.entry ul a',
							)
						),
						

						
						array(
							'id'        => 'superblog-color-entry-link-hover',
							'type'      => 'color',
							'title'     => esc_html__('Entry Links (in post texts): Hover Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom color for post links.','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'background-color' => '.entry p a:hover,.entry ol li>a:hover,.entry ul li>a:hover,.elementor-text-editor a:hover',
							)
						),
						
                        array(
                            'id'       => 'superblog-primary-border',
							'type'      => 'color',
							'title'     => esc_html__('Borders Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for primary borders','superblog'),
							'default'   => '#efefef',
							'output'    => array(
								'border-color' => '.p-border,.sidebar_item,.sidebar_item  h5,.sidebar_item li,.sidebar_item ul.menu li,.block_title:after,.meta,.tagcloud a,.page-numbers,input,textarea,select,.page-link span,.post-pagination>p a,.entry .tmnf_posttag a,li.comment',
							)
						),
						
						array(
							'id'        => 'superblog-text-sidebar',
							'type'      => 'color',
							'title'     => esc_html__('Sidebar Text Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for sidebar text.','superblog'),
							'default'   => '#333',
							'output'    => array(
								'color' => '#sidebar',
							)
						),
						
						array(
							'id'        => 'superblog-links-sidebar',
							'type'      => 'color',
							'title'     => esc_html__('Sidebar Link Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for sidebar links.','superblog'),
							'default'   => '#000',
							'output'    => array(
								'color' => '.widgetable a',
							)
						),
						
						array(
							'id'        => 'superblog-hover-sidebar',
							'type'      => 'color',
							'title'     => esc_html__('Sidebar Link Color: Hover','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'color' => '.widgetable a:hover,.menu li.current-menu-item>a',
							)
						),
						

						
						array(
							'id'        => 'superblog-special-bg',
							'type'      => 'color',
							'title'     => esc_html__('Special Sections: Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a bg color for special sections.','superblog'),
							'default'   => '#1d1b28',
							'output'    => array(
								'background-color' => '#flyoff,.content_inn .mc4wp-form,.tmnf_special_bg,.headad',
							)
						),
						
						
						array(
							'id'        => 'superblog-special-text',
							'type'      => 'color',
							'title'     => esc_html__('Special Sections: Text/Link Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for text in special sections.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '#flyoff,#flyoff h5,#flyoff p,#flyoff a,#flyoff span,.content_inn .mc4wp-form,.tmnf_special_bg,.tmnf_special_bg a,.tmnf_special_bg p',
							)
						),


					// section end
                    )
                );
				// Primary styling THE END
				


                $this->sections[] = array(
                    'title'  => esc_html__( 'Header Styling','superblog' ),
                    'icon'   => 'el el-tint',
                    'fields' => array( // header end
						
                        array(
                            'id'       => 'tmnf-header-full',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Full-Width Header','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),
					
					
												
                      	array(
                            'id'       => 'tmnf-header-layout',
                            'type'     => 'radio',
                            'title'    => esc_html__('Header Layout','superblog'),
                            'subtitle' => esc_html__('Select layout for your header','superblog'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'header_classic' => esc_html__('Classic Header','superblog'),
                                'header_classic_2' => esc_html__('Classic Header 2','superblog'),
                                'header_slim' => esc_html__('Slim Header','superblog'),
                                'header_centered' => esc_html__('Centered Header','superblog'),
                                'header_centered_2' => esc_html__('Centered Header 2','superblog'),
                            ),
                            'default'  => 'header_classic_2'
                        ),
						
						array(
							'id'        => 'superblog-bg-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Header Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a bg color for the header. On mobile devices is transparent header disabled.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'background-color' => '#header',
							)
						),
						
						array(
							'id'        => 'superblog-links-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Header Link Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for header links.','superblog'),
							'default'   => '#000',
							'output'    => array(
								'color' => '#header h1 a',
							)
						),
						
						array(
							'id'        => 'superblog-borders-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Header Borders Color','superblog'),
							'subtitle'  => esc_html__('Pick a bg color for the header. On mobile devices is transparent header disabled.','superblog'),
							'default'   => '#efefef',
							'output'    => array(
								'border-color' => '.header_row,.spec_menu_wrap',
							)
						),
						
						array(
							'id'   => 'tmnf-info-menu-button',
							'type' => 'info',
							'title' => esc_html__('Menu Section + Special menu button','superblog'),
							'style' => 'success',
						),
						
						array(
							'id'        => 'superblog-navbar-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Navigation Background Color','superblog'),
							'subtitle'  => esc_html__('Color will be used only for "Centered" and "Classic 2" header layouts.','superblog'),
							'default'   => '#fcfcfc',
							'output'    => array(
								'background-color' => '.header_centered .will_stick,.header_centered_2 .will_stick,.will_stick.scrollDown,.spec_menu_wrap',
							)
						),


						array(
                            'id'          => 'superblog-header-typography',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Navigation Typography','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( '.nav>li>a,.top_nav .searchform input.s' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography used as navigation text.','superblog' ),
                            'default'     => array(
                                'color'       => '#000',
                                'font-weight'  => '500',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '15px',
                            ),
                        ),
						
						array(
							'id'        => 'superblog-hover-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Navigation Link Color: Hover Color','superblog'),
							'subtitle'  => esc_html__('Pick a hover color for header links.','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'color' => '.nav>li>a:hover,.menu-item-has-children>a:after',
							)
						),
						
						array(
							'id'        => 'superblog-icons-myheader',
							'type'      => 'color',
							'title'     => esc_html__('Header Icons: Color','superblog'),
							'subtitle'  => esc_html__('Pick a hover color for header icons.','superblog'),
							'default'   => '#000',
							'output'    => array(
								'color' => '#header ul.social-menu li a,.head_extend a',
								'background-color' => '.tmnf-button .tmnf-button-inner-left::before',
								'border-color' => '.tmnf-button .tmnf-button-inner-left::after',
							)
						),
						
						array(
							'id'        => 'superblog-bg-submenu',
							'type'      => 'color',
							'title'     => esc_html__('Sub-menu Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a hover color for header links.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'background-color' => '.nav li ul',
								'border-bottom-color' => '.nav>li>ul:after',
								
							)
						),

						array(
                            'id'          => 'superblog-submenu-typography',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Sub-menu Typography','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( '.nav ul li>a' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography used as navigation text.','superblog' ),
                            'default'     => array(
                                'color'       => '#494949',
                                'font-weight'  => '500',
                                'font-family' => 'Inter',
                                'google'      => true,
                                'font-size'   => '12px',
                            ),
                        ),
						
						array(
							'id'        => 'superblog-hover-submenu',
							'type'      => 'color',
							'title'     => esc_html__('Sub-menu Link Color: Hover Color','superblog'),
							'subtitle'  => esc_html__('Pick a hover color for header links.','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'color' => '.nav li ul li>a:hover',
							)
						),
						
						
						


						array(
							'id'   => 'tmnf-info-mobile-meu-button',
							'type' => 'info',
							'title' => esc_html__('Mobile Menu Button','superblog'),
							'style' => 'success',
						),
						
						array(
							'id'        => 'superblog-header-special-bg',
							'type'      => 'color',
							'title'     => esc_html__('Menu Button: Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for header text.','superblog'),
							'default'   => '#FA430B',
							'output'    => array(
								'background-color' => '.show-menu,#main-nav>li.special>a,.nav>li.current-menu-item>a',
								'color' => '.nav a i',
							)
						),
						
						
						array(
							'id'        => 'superblog-header-special-text',
							'type'      => 'color',
							'title'     => esc_html__('Menu Button: Text Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for header text.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '#header .show-menu,#main-nav>li.special>a,.nav>li.current-menu-item>a,[class*="hero-cover"] #header #main-nav>li.current-menu-item>a',
							)
						),
						
						
						


						array(
							'id'   => 'tmnf-info-trans',
							'type' => 'info',
							'title' => esc_html__('Transparent Header','superblog'),
							'style' => 'success',
						),
						
						
						
						array(
							'id'        => 'superblog-images-bg',
							'type'      => 'color',
							'title'     => esc_html__('Transparent Header: Background Color (fallback)','superblog'),
							'subtitle'  => esc_html__('Pick a fallback background color for transparent header','superblog'),
							'default'   => '#000',
							'output'    => array(
								'background-color' => '[class*="hero-cover"]  .will_stick.scrollDown,.page-header-image,.main_slider_wrap,[class*="hero-cover"] #header,.imgwrap,.tmnf_mosaic,.img_viewport',
							)
						),
						
						array(
							'id'        => 'superblog-images-text',
							'type'      => 'color',
							'title'     => esc_html__('Transparent Header: Text Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom bg color for images','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '.page-header-image p,.page-header-image h1.entry-title,.page-header-image .meta a,[class*="hero-cover"]  #header .nav > li:not(.special) > a,[class*="hero-cover"]  #header #titles a,[class*="hero-cover"]  #header .head_extend a,[class*="hero-cover"]  #header .social-menu a,.has-post-thumbnail .titles_over a,.has-post-thumbnail .titles_over p',
							)
						),
					

                        array(
                            'id'       => 'tmnf-main-logo-inv',
                            'type'     => 'media',
							'default'  => '',
							'readonly' => false,
                            'preview'  => true,
							'url'      => true,
                            'title'    => esc_html__( 'Main Logo for Transparent Header','superblog' ),
                            'desc'     => esc_html__( 'Upload a logo for your theme','superblog' ),
                        ),
						
						
						array(
							'id'   => 'tmnf-info-spacing',
							'type' => 'info',
							'title' => esc_html__('Header Spacing','superblog'),
							'style' => 'success',
						),
						

                        array(
                            'id'             => 'superblog-width-header',
                            'type'           => 'dimensions',
                            'output'   => array( '#titles' ),
                            'units'          => 'px', 
                            'units_extended' => 'true',  
                            'height'          => false, 
                            'title'          => esc_html__( 'Header Title/Logo Width Option','superblog' ),
                            'subtitle'       => esc_html__( 'Choose the width limitation for the header logo.','superblog' ),
                            'default'        => array(
                                'width'  => 200,
                            )
                        ),

                        array(
                            'id'       => 'superblog-spacing-header',
                            'type'     => 'spacing',
                            'output'   => array( '#titles,.header_fix' ),
                            'mode'     => 'margin',
                            'all'      => false,
                            'right'         => false,    
                            'left'          => false,     
                            'units'         => 'px',      
                            'title'    => esc_html__( 'Header Title/Logo Spacing','superblog' ),
                            'subtitle' => esc_html__( 'Choose the margin for header logo.','superblog' ),
                            'default'  => array(
                                'margin-top'    => '50px',
                                'margin-bottom' => '45px',
                            )
                        ),
						

                        array(
                            'id'       => 'superblog-spacing-nav',
                            'type'     => 'spacing',
                            'output'   => array( '#main-nav,.head_extend,#header ul.social-menu' ),
                            'mode'     => 'margin',
                            'all'      => false,
                            'right'         => false,    
                            'left'          => false,       
                            'units'         => 'px',      
                            'title'    => esc_html__( 'Header Navigation Spacing','superblog' ),
                            'subtitle' => esc_html__( 'Choose the margin for header navigation.','superblog' ),
                            'default'  => array(
                                'margin-top'    => '4px',
                                'margin-bottom'    => '4px',
                            )
                        ),


					// section end
                    )
                );
				// header styling THE END






                $this->sections[] = array(
                    'title'  => esc_html__( 'Footer Styling','superblog' ),
                    'icon'   => 'el el-tint',
                    'fields' => array( // header end
						
						array(
                            'id'       => 'tmnf-footer-editor',
                            'type'     => 'textarea',
                            'title'    => esc_html__( 'Footer Text','superblog' ),
                            'desc'     => esc_html__( 'This field is HTML validated!','superblog' ),
							'default'  => 'Copyright © 2022 - SuperBlog Theme',
                            'validate' => 'html',
						),
						
						array(
							'id'        => 'superblog-color-myfooter',
							'type'      => 'background',
							'title'     => esc_html__('Footer Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a background color for the footer.','superblog'),
							
                            'output'   => array('#footer,#footer .searchform input.s' ),
                            'default'     => array(
                                'background-color'       => '#32373b',
                            ),
						),
						
						array(
							'id'        => 'superblog-color-wrapper',
							'type'      => 'color',
							'title'     => esc_html__('Alt Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a background color','superblog'),
							'default'   => '#282d33',
							'output'    => array(
								'background-color' => '.footer-below'
							)
						),
						
						array(
							'id'        => 'superblog-text-myfooter',
							'type'      => 'color',
							'title'     => esc_html__('Footer Text - Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for footer links.','superblog'),
							'default'   => '#bcbcbc',
							'output'    => array(
								'color' => '#footer,#footer p,#footer h2,#footer h3,#footer h4,#footer h5,#footer .meta,#footer .searchform input.s,#footer cite',
							)
						),
						
						array(
							'id'        => 'superblog-links-myfooter',
							'type'      => 'color',
							'title'     => esc_html__('Footer Links - Color','superblog'),
							'subtitle'  => esc_html__('Pick a color for footer links.','superblog'),
							'default'   => '#d8d8d8',
							'output'    => array(
								'color' => '#footer a,#footer .meta a,#footer ul.social-menu a span,.bottom-menu li a',
							)
						),
						
						array(
							'id'        => 'superblog-hover-myfooter',
							'type'      => 'color',
							'title'     => esc_html__('Footer Links - Hover Color','superblog'),
							'subtitle'  => esc_html__('Pick a hover color for footer links.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '#footer a:hover',
							)
						),
						
						
                        array(
                            'id'       => 'superblog-footer-border',
							'type'      => 'color',
							'title'     => esc_html__('Footer Borders','superblog'),
							'subtitle'  => esc_html__('Pick a color for footer borders.','superblog'),
							'default'   => '#3b4247',
							'output'    => array(
								'border-color' => '#footer,#footer h5.widget,#footer .sidebar_item li,#copyright,#footer .tagcloud a,#footer .tp_recent_tweets ul li,#footer .p-border,#footer .searchform input.s,#footer input,.footer-icons ul.social-menu a,.footer_text',
							)
						),


					// section end
                    )
                );
				// footer styling THE END









                $this->sections[] = array(
                    'title'  => esc_html__( 'Typography','superblog' ),
                    'icon'   => 'el el-bold',
                    'fields' => array( // header end


						array(
							'id'   => 'tmnf-info-spec-heading',
							'type' => 'info',
							'title' => esc_html__('Special Headings','superblog'),
							'style' => 'success',
						),


						array(
                            'id'          => 'superblog-h1-title',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Site Title','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( '#header h1' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H1.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '400',
                                'font-family' => 'Vidaloka',
                                'google'      => true,
                                'font-size'   => '50px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-large-titles',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Large Titles','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h1.entry-title,h1.tmnf_title_large,h2.tmnf_title_large,.tmnf_titles_are_large .tmnf_title' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H2.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '400',
                                'font-family' => 'Vidaloka',
                                'google'      => true,
                                'font-size'   => '50px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-medium-titles',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Medium Titles','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h2.tmnf_title_medium,h3.tmnf_title_medium,.tmnf_titles_are_medium .tmnf_title,.blogger_list h3' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H2.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '700',
                                'font-family' => 'Playfair Display',
                                'google'      => true,
                                'font-size'   => '30px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-small-titles',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Small Titles','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h3.tmnf_title_small,h4.tmnf_title_small,.tmnf_columns_4 h3.tmnf_title_medium,.tmnf_titles_are_small .tmnf_title' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H2.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '600',
                                'font-family' => 'Playfair Display',
                                'google'      => true,
                                'font-size'   => '19px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-buttons-typo',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Buttons Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( '.tmnf_carousel h4,.wp_review_tab_widget_content .entry-title,.tptn_link,.tab-post h4,cite,.menuClose span,.icon_extend,ul.social-menu a span,a.mainbutton,.submit,.mc4wp-form input,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce button.button, .woocommerce input.button,.wpcf7-submit' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H5.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '400',
                                'font-family' => 'Playfair Display',
                                'google'      => true,
                                'font-size'   => '16px',
                            ),
                        ),	
						
						array(
							'id'   => 'tmnf-info-post-heading',
							'type' => 'info',
							'title' => esc_html__('In Post Headings','superblog'),
							'style' => 'success',
						),
						
						array(
                            'id'          => 'superblog-h1',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'H1 Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h1' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H2.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '600',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '40px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-h2',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'H2 Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h2' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H2.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '600',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '34px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-h3',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'H3 Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h3,blockquote' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H3.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '600',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '28px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-h4',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'H4 Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h4,h3#reply-title,.entry h5, .entry h6,blockquote,.post_pagination_inn a' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H4.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '600',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '24px',
                            ),
                        ),
						
						array(
                            'id'          => 'superblog-h5',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'H5 + H6 Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( 'h5,h6,.quuote_author,.owl-dot,.entry .tmnf_posttag a,.meta_more a,.tptn_after_thumb::before' ),
                            'units'       => 'px',
                            'line-height' => false,
                            'subtitle'    => esc_html__( 'Select the typography for heading H5.','superblog' ),
                            'default'     => array(
                                'color'       => '#373737',
                                'font-weight'  => '500',
                                'font-family' => 'Jost',
                                'google'      => true,
                                'font-size'   => '14px',
                            ),
                        ),	
						


					// section end
                    )
                );
				// typography styling THE END










                $this->sections[] = array(
                    'title'  => esc_html__( 'Other Styling','superblog' ),
                    'icon'   => 'el el-tint',
                    'fields' => array( // header end
						
	
						
						array(
                            'id'          => 'superblog-meta',
                            'type'        => 'typography',
                            'title'       => esc_html__( 'Meta Sections - Font Style','superblog' ),
                            'google'      => true,
                            'font-backup' => true,
                            'all_styles'  => false,
                            'output'      => array( '.meta,.meta a,.tptn_date,.post_nav_text span' ),
                            'units'       => 'px',
                            'subtitle'    => esc_html__( 'Select the typography for meta sections.','superblog' ),
                            'default'     => array(
                                'color'       => '#999999',
                                'font-weight'  => '400',
                                'font-family' => 'Playfair Display',
                                'google'      => true,
                                'font-size'   => '11px',
                                'line-height' => '18px'
                            ),
                        ),
						
						array(
							'id'        => 'superblog-bg-color-dekoline',
							'type'      => 'color',
							'title'     => esc_html__('"Read More" Buttons and Dividers: Background Color','superblog'),
							'default'   => '#fa430b',
							'output'    => array(
								'background-color' => '.meta_deko::after,h3#reply-title:after,.tptn_after_thumb::before,.cat_nr,.ribbon_inv,.tmnf_rating>div,.review-total-only.small-thumb',
								'color' => '.current-cat>a,a.active,.meta_categ_alt,.meta_categ_alt a,.tmnf_icon',
								'border-color' => '',
								'border-left-color' => '#footer .sidebar_item h5',
							)
						),
						
						array(
							'id'        => 'superblog-text-color-dekoline',
							'type'      => 'color',
							'title'     => esc_html__('"Read More" Buttons: Text Color','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '.tptn_after_thumb::before,.cat_nr,.ribbon_inv,.submit.ribbon_inv,#footer .ribbon_inv,#flyoff .cat_nr,.ribbon_inv,.tmnf_rating>div,.review-total-only.small-thumb',
							)
						),
						
						array(
							'id'        => 'superblog-color-elements',
							'type'      => 'color',
							'title'     => esc_html__('Elements Background Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom background color for main buttons, special sections etc.','superblog'),
							'default'   => '#fa430b',
							'output'    => array(
								'background-color' => 'a.searchSubmit,.sticky:after,.ribbon,.post_pagination_inn,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button.alt,.woocommerce button.button,input#place_order,.woocommerce input.button,.woocommerce a.button.alt,li.current a,.page-numbers.current,a.mainbutton,#submit,#comments .navigation a,.contact-form .submit,.wpcf7-submit,#woo-inn ul li span.current,.owl-nav>div',
								'color' => '.meta_more a',
                                'border-color' => 'input.button,button.submit,.entry blockquote,li span.current,.meta_more a',
							)
						),
						
						array(
							'id'        => 'superblog-text-elements',
							'type'      => 'color',
							'title'     => esc_html__('Elements Links/Texts - Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom text color for main buttons, special sections etc.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => 'a.searchSubmit,.sticky:after,.ribbon,.ribbon a,.ribbon p,p.ribbon,#footer .ribbon,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button.alt, .woocommerce button.button,.woocommerce a.button.alt,input#place_order,.woocommerce input.button,a.mainbutton,#submit,#comments .navigation a,.tagssingle a,.wpcf7-submit,.page-numbers.current,.format-quote .item_inn p,.format-quote blockquote,.quuote_author,#post_pages a,.owl-nav>div,#woo-inn ul li span.current',
							
								'background-color' => '.color_slider .owl-nav>div:after',
							)
						),
						
						array(
							'id'        => 'superblog-hover-color-elements',
							'type'      => 'color',
							'title'     => esc_html__('Elements Background Hover Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom background color for main buttons, special sections etc.','superblog'),
							'default'   => '#f45a18',
							'output'    => array(
								'background-color' => 'a.searchSubmit:hover,.ribbon:hover,a.mainbutton:hover,.entry a.ribbon:hover,#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.owl-nav>div:hover,.meta_more a:hover,.owl-nav>div:hover,.ribbon_inv:hover',
								'border-color' => 'input.button:hover,button.submit:hover',
							)
						),
						
						array(
							'id'        => 'superblog-hover-text-elements',
							'type'      => 'color',
							'title'     => esc_html__('Elements Links/Texts - Hover Color','superblog'),
							'subtitle'  => esc_html__('Pick a custom text color for main buttons, special sections etc.','superblog'),
							'default'   => '#fff',
							'output'    => array(
								'color' => '.ribbon:hover,.ribbon:hover a,.ribbon:hover a,.meta.ribbon:hover a,.entry a.ribbon:hover,a.mainbutton:hover,#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.owl-nav>div:hover,.owl-nav>div:hover:before,.mc4wp-form input[type="submit"]:hover,.meta_more a:hover.owl-nav>div:hover,.meta_more a:hover,.ribbon_inv:hover',
								'background-color' => '.owl-nav>div:hover:after',
							),
						),
						


					// section end
                    )
                );
				// other styling THE END









                $this->sections[] = array(
                    'type' => 'divide',
                );	



                
                $this->sections[] = array(
                    'title'  => esc_html__( 'Post Settings','superblog' ),
                    'icon'   => 'el el-edit',
                    'fields' => array( // header end					

						
                        array(
                            'id'       => 'tmnf-post-meta-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Disable "Meta" sections','superblog' ),
                            'subtitle' => esc_html__( 'Tick to disable post "information" - date, category etc.','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),
						
						array(
                            'id'       => 'tmnf-post-nextprev-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Next/Previous Post Section','superblog' ),
                            'subtitle' => esc_html__( 'Tick to disable Next/Previous section in a single post page.','superblog' ),
                            'default'  => '1'// 1 = on | 0 = off
                        ),
						
						array(
                            'id'       => 'tmnf-post-likes-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Tags Section','superblog' ),
                            'subtitle' => esc_html__( 'Tick to disable likes/tags section in a single post page.','superblog' ),
                            'default'  => '1'// 1 = on | 0 = off
                        ),
						
						array(
                            'id'       => 'tmnf-post-related-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Related Posts Section','superblog' ),
                            'subtitle' => esc_html__( 'Tick to disable related section in a single post page.','superblog' ),
                            'default'  => '1'// 1 = on | 0 = off
                        ),
						
					
					
					// section end
                    )
                );
				// post settings THE END





                
          $this->sections[] = array(
                    'title'  => esc_html__( 'Social Networks','superblog'),
                    'icon'   => 'el el-share',
                    'fields' => array( // header end
				
					

						
						array(
                            'id'       => 'tmnf-social-top-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Social Networks section in the header','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),
				
					

						
						array(
                            'id'       => 'tmnf-social-bottom-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Social Networks section in the footer','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),

                        array(
                            'id'       => 'tmnf-social-rss',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Rss Feed','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
                        array(
                            'id'       => 'tmnf-social-facebook',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Facebook','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-twitter',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Twitter','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-pinterest',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Pinterest','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-instagram',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Instagram','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-youtube',
                            'type'     => 'text',
                            'title'    => esc_html__( 'YouTube','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-vimeo',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Vimeo','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-tumblr',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Tumblr','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-500',
                            'type'     => 'text',
                            'title'    => esc_html__( '500px','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-flickr',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Flickr','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-linkedin',
                            'type'     => 'text',
                            'title'    => esc_html__( 'LinkedIn','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-tripadvisor',
                            'type'     => 'text',
                            'title'    => esc_html__( 'TripAdvisor','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						
                        array(
                            'id'       => 'tmnf-social-foursquare',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Foursquare','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-dribbble',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Dribbble','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-skype',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Skype','superblog'),
                            'subtitle' => esc_html__( 'Enter skype URL','superblog'),
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-stumbleupon',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Stumbleupon','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-github',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Github','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
												
                        array(
                            'id'       => 'tmnf-social-soundcloud',
                            'type'     => 'text',
                            'title'    => esc_html__( 'SoundCloud','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
												
                        array(
                            'id'       => 'tmnf-social-spotify',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Spotify','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-xing',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Xing','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-whatsapp',
                            'type'     => 'text',
                            'title'    => esc_html__( 'WhatsApp','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-vk',
                            'type'     => 'text',
                            'title'    => esc_html__( 'VK','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
												
                        array(
                            'id'       => 'tmnf-social-snapchat',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Snapchat','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                        ),
						
						

					// section end
                    )
                );
				// social networks THE END
				
				$this->sections[] = array(
                    'title'  => esc_html__( 'Static Ads','superblog'),
                    'icon'   => 'el el-website',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(


						array(
                            'id'       => 'tmnf-headad-script',
                            'type'     => 'textarea',
                            'title'    => esc_html__( 'Header Script Code','superblog'),
                            'desc'     => esc_html__( 'Put your code here','superblog'),
							'default'  => '',
						),

                        array(
                            'id'       => 'tmnf-headad-image',
                            'type'     => 'media',
							'default'  => '',
							'readonly' => false,
                            'preview'  => true,
							'url'      => true,
                            'title'    => esc_html__( 'Header Ad - image','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL of your ad image (banner)','superblog'),
                        ),
						
						
                        array(
                            'id'       => 'tmnf-headad-target',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Header Ad - target URL','superblog'),
                            'subtitle' => esc_html__( 'Enter full URL','superblog'),
                            'validate' => 'url',
                            //                        'text_hint' => array(
                            //                            'title'     => '',
                            //                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
                            //                        )
                        ),
				
					// section end
                    )
                );
				// static ads THE END
				
				
				
				$this->sections[] = array(
                    'title'  => esc_html__( 'Dark Mode Styling','superblog'),
                    'icon'   => 'el el-adjust',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(
						
						array(
							'id'   => 'tmnf-info-darkmode',
							'type' => 'info',
							'title' => esc_html__('Setup "Main Logo for Transparent Header" in the admin panel > Header Styling section. It will be used in Dark Mode as the main logo.','superblog'),
        					'style' => 'critical',
						),
						
						array(
                            'id'       => 'tmnf-darkmode-dis',
                            'type'     => 'checkbox',
                            'title'    => esc_html__( 'Enable Dark Mode','superblog' ),
                            'default'  => '0'// 1 = on | 0 = off
                        ),
					
						array(
                            'id'       => 'superblog-darkmode-bg',
                            'type'     => 'background',
                            'title'    => esc_html__( 'Body Background','superblog' ),
                            'output'   => array('body.dark-mode,body.dark-mode .wrapper_inn,body.dark-mode .postbar,body.dark-mode .headad' ),
                            'default'     => array(
                                'background-color'       => '#333',
                            ),
                        ),
					
						
						array(
							'id'       => 'superblog-darkmode-bg-ghost',
							'type'      => 'color',
                            'title'    => esc_html__( 'Ghost Body Background','superblog' ),
                            'subtitle' => esc_html__( 'Choose similar bg color to Dark Mode Background color','superblog'),
							'default'   => '#3a3a3a',
							'output'    => array(
								'background-color' => 'body.dark-mode #header,body.dark-mode .header_centered .will_stick,body.dark-mode .header_centered_2 .will_stick,body.dark-mode .will_stick.scrollDown,body.dark-mode .ghost,body.dark-mode .ghost,body.dark-mode .sidebar_item,body.dark-mode textarea,body.dark-mode input,body.dark-mode select,body.dark-mode .tmnf_special_bg,body.dark-mode #flyoff,body.dark-mode .content_inn .mc4wp-form,body.dark-mode #curtain,body.dark-mode .tmnf_posttag a,body.dark-mode .item_big:before',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-borders',
							'type'      => 'color',
                            'title'    => esc_html__( 'Borders Color','superblog' ),
							'default'   => '#444',
							'output'    => array(
								'border-color' => 'body.dark-mode .p-border,body.dark-mode .sidebar_item,body.dark-mode .header_row,body.dark-mode .sidebar_item h5,body.dark-mode .sidebar_item li,body.dark-mode .sidebar_item ul.menu li,body.dark-mode .tagcloud a,body.dark-mode .page-numbers,body.dark-mode input,body.dark-mode textarea,body.dark-mode select,body.dark-mode li.comment,body.dark-mode .tmnf_posttag a',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-text',
							'type'      => 'color',
                            'title'    => esc_html__( 'Text Color','superblog' ),
							'default'   => '#ddd',
							'output'    => array(
								'color' => 'body.dark-mode,body.dark-mode p,body.dark-mode input,body.dark-mode textarea,body.dark-mode select,body.dark-mode #flyoff,body.dark-mode #flyoff p,body.dark-mode #flyoff span,body.dark-mode .content_inn .mc4wp-form,body.dark-mode .tmnf_special_bg,body.dark-mode .tmnf_special_bg a,body.dark-mode .tmnf_special_bg p',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-headings',
							'type'      => 'color',
                            'title'    => esc_html__( 'Headings Color','superblog' ),
							'default'   => '#aaa',
							'output'    => array(
								'color' => 'body.dark-mode h1,body.dark-mode h2,body.dark-mode h3,body.dark-mode h4,body.dark-mode h5,body.dark-mode h6,body.dark-mode #flyoff h5,body.dark-mode h3#reply-title',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-links',
							'type'      => 'color',
                            'title'    => esc_html__( 'Links Color','superblog' ),
							'default'   => '#aaa',
							'output'    => array(
								'color' => 'body.dark-mode a:not(.readmore),body.dark-mode #header h1 a,body.dark-mode #header ul.social-menu li a,body.dark-mode #flyoff a',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-accent',
							'type'      => 'color',
                            'title'    => esc_html__( 'Accent: Background Color','superblog' ),
							'default'   => '#bafcdc',
							'output'    => array(
								'background-color' => 'body.dark-mode .ribbon,body.dark-mode .ribbon_inv',
								'color' => 'body.dark-mode .meta,body.dark-mode .meta:not(.meta_more):not(.meta_categ) a',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-accent-hover',
							'type'      => 'color',
                            'title'    => esc_html__( 'Accent: Hover Background Color','superblog' ),
							'default'   => '#e95e2a',
							'output'    => array(
								'background-color' => 'body.dark-mode .ribbon:hover,body.dark-mode .ribbon a:hover,body.dark-mode a.ribbon:hover,body.dark-mode .ribbon_inv:hover',
							)
						),
					
						
						array(
							'id'       => 'superblog-darkmode-accent-text',
							'type'      => 'color',
                            'title'    => esc_html__( 'Accent: Text Color','superblog' ),
							'default'   => '#294743',
							'output'    => array(
								'color' => 'body.dark-mode .ribbon,body.dark-mode .ribbon a,body.dark-mode a.ribbon,body.dark-mode .ribbon_inv',
							)
						),
					
					
					
					
					// section end
                    )
                );
				// static ads THE END
				

                $this->sections[] = array(
                    'type' => 'divide',
                );		

                

                $this->sections[] = array(
                    'title'  => esc_html__( 'Import / Export','superblog' ),
                    'desc'   => esc_html__( 'Import and Export your Redux Framework settings from file, text or URL.','superblog' ),
                    'icon'   => 'el el-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'opt-import-export',
                            'type'       => 'import_export',
                            'title'      => esc_html__( 'Import/Export','superblog'),
                            'subtitle'   => esc_html__( 'Save and restore your Redux options','superblog'),
                            'full_width' => false,
                        ),
                    ),
                );


            }
			
			

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => esc_html__( 'Theme Information 1','superblog' ),
                    'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','superblog' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => esc_html__( 'Theme Information 2','superblog' ),
                    'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','superblog' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>','superblog' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'themnific_redux',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => esc_html__( 'SuperBlog - admin panel','superblog' ),
                    'page_title'           => esc_html__( 'SuperBlog admin panel','superblog' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => false,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
					
					'forced_dev_mode_off' => false,
					
                    // Show the time the page took to load, etc
                    'update_notice'        => false,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => 'themnific-options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'el el-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

                // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.



                $this->args['admin_bar_links'][] = array(
                    //'id'    => 'redux-support',
                    'href'   => 'http://themestate.com/demo/superblog/',
					'target'   => '_blank',
                    'title' => esc_html__( 'Documentation', 'superblog' ),
                );

                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => 'http://themestate.com/demo/superblog/',
					'target'   => '_blank',
                    'title' => esc_html__( 'Documentation', 'superblog' ),
                    'icon'  => 'el el-wrench-alt'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                
                // Add content after the form.
                $this->args['footer_text'] = esc_html__( 'Dannci & Themnific','superblog' );
            }

        }

        global $reduxConfig;
        $reduxConfig = new superblog_redux_config();
    } else {
    }



// TMNF admin panel styling	
function superblog__add_css() {
    wp_register_style(
        'redux-tmnf-css',
        get_template_directory_uri() .'/redux-framework/assets/redux-themnific.css',
        array( 'redux-admin-css' ),
        time(),
        'all'
    ); 
    wp_enqueue_style('redux-tmnf-css');
}
add_action( 'redux/page/themnific_redux/enqueue', 'superblog__add_css' );


// remove redux notices
function superblog_remove_redux_notices() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'superblog_remove_redux_notices');