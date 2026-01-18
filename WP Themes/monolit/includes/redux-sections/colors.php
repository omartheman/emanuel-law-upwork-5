<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Colors', 'monolit'),
    'id'         => 'styling-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-magic',
    'fields' => array(
        array(
            'id' => 'override-preset',
            'type' => 'switch',
            'title' => esc_html__('Use Custom Color', 'monolit'),
            'desc' => wp_kses(__('Set this to <b>On</b> if you want to use color variants bellow.', 'monolit'), array('b'=>array(),'strong'=>array(),'p'=>array()) ),
            'desc' => '',
            'default' => false
        ),
        array(
            'id' => 'main-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Main BG - Loading Background Color ', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Main Page Background Color (default: #1b1b1b - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#1b1b1b',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'navigation-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Top Naivgation BG Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Top Navigation Background Color (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
            // 'transparent'=>true
        ),
        array(
            'id' => 'submenu-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Submenu Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Submenu Background Color (default: #000 - 0.91).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 0.91
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'mobile-submenu-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Submenu Background Color - Mobile View', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Submenu Background Color on mobile view (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'social-share-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Socials Share Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Background Color for socials share button on the top navigation bar (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'footer-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Content Footer Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Footer Background Color (default: #1b1b1b - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#1b1b1b',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'left-footer-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Left Bar Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Left Bar Background Color (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'white-sec-bg-color',
            'type' => 'color',
            'title' => esc_html__('White Section Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('White Section Background Color (default: #fff).', 'monolit'),
            'default'   => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'dark-sec-bg-color',
            'type' => 'color',
            'title' => esc_html__('Dark Section Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Dark Section Background Color (default: #1b1b1b).', 'monolit'),
            'default'   => '#1b1b1b',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'overlay-bg-color',
            'type' => 'color_rgba',
            'title' => esc_html__('Overlay Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Overlay Background Color, which cover parallax background image (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 1
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'folio-overlay-bg-color',
            'type' => 'color_gradient',
            'title' => esc_html__('Portfolio Overlay Background Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Portfolio Overlay Background Color, which cover parallax background image (default: #000 - 1).', 'monolit'),
            'default'   => array(
                'from'     => 'transparent',
                'to'     => '#000'
            ),
            // 'validate' => 'color',
            //'mode'=>'background-color',
        ),

        
        array(
            'id' => 'footer-text-color',
            'type' => 'color',
            'title' => esc_html__('Footer Text Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Footer Text Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'footer-link-text-color',
            'type' => 'color',
            'title' => esc_html__('Footer Link Text Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Footer Link Text Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'footer-title-text-color',
            'type' => 'color',
            'title' => esc_html__('Footer Text Title Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Footer Text Title Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'footer-copyright-color',
            'type' => 'color',
            'title' => esc_html__('Footer Copyright Text Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Footer Copyright Text Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        
        array(
            'id' => 'left-social-color',
            'type' => 'color',
            'title' => esc_html__('Left Socials Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Left Socials Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id'       => 'main-nav-menu-color',
            'type'     => 'link_color',
            'title'    => esc_html__('Main Menu Color', 'monolit'),
            'default'  => array(
                'regular'  => '#ffffff', 
                'hover'    => '#eaeaea', 
                //'active'   => '#ffffff',   
            ),
            'active' => false,
            'visited' => false,
        ),
        array(
            'id' => 'main-active-menu-bg-color',
            'type' => 'color',
            'title' => esc_html__('Current Menu Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Current Menu Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        

        array(
            'id'       => 'main-nav-submenu-color',
            'type'     => 'link_color',
            'title'    => esc_html__('Sub Menu Color', 'monolit'),
            'default'  => array(
                'regular'  => '#ffffff', 
                'hover'    => '#eaeaea', 
                //'active'   => '#ffffff',   
            ),
            'active' => false,
            'visited' => false,
        ),

        array(
            'id' => 'sub-active-menu-bg-color',
            'type' => 'color',
            'title' => esc_html__('Sub Menu Current Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Sub Menu Current Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),

        array(
            'id' => 'top-socials-color',
            'type' => 'color',
            'title' => esc_html__('Top Social Share Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Top Social Share Color (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),
        array(
            'id' => 'dark-bg-text-color',
            'type' => 'color',
            'title' => esc_html__('Dark Background Text Color', 'monolit'),
            //'compiler'      => true,
            //'compiler'=> array('.l-line span,.overlay,nav li a:before , nav li a:after,.nav-button span,.section-title h3:before,.services-info:before , .services-info:after,.section-separator,.team-box:before , .team-box:after,.team-box .overlay,.hide-column:before , .hide-column:after,.filter-button ul li,.gallery-filters  a:before,.grid-item-holder:before,.fullwidth-slider-holder .customNavigation a:before,.resume-head:before,.show-hidden-info:before , .show-hidden-info:after,.footer-decor:before , .footer-decor:after,.selectMe:before,.inline-facts-holder:before,.ajaxPageSwitchBacklink:before'),
            'desc' => esc_html__('Set text color for Dark background section, with "dark-bg" extraclass (default: #fff).', 'monolit'),
            'default' => '#fff',
            'validate' => 'color',
            //'mode'=>'background-color',
        ),

    ),
) );