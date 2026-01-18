<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('404 Page', 'monolit'),
    'id'         => '404-intro-text-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'       => 'fourorfour_fullwidth_nav_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Fullwidth Navigation Menu', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id' => 'bg404',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('404 Page Background Image', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('This image will be used for background image in 404 page.', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/2.jpg'),
        ),
        array(
            'id' => '404_intro',
            'type' => 'editor',
            'title' => esc_html__('404 Page Message', 'monolit'),
            'subtitle' => '',
            'desc' => '',
            
            'default' => '<h2>Page not found</h2>'
        ),
        array(
            'id' => 'back_home_link',
            'type' => 'text',
            'title' => esc_html__('Back Home Link', 'monolit'),
            // 'desc' => esc_html__('', 'monolit'),
            'default' => esc_url( home_url('/' ) )
        ),
        array(
            'id'       => 'fourorfour_footer_content',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Content Footer', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        
    ),
) );

