<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Blog', 'monolit'),
    'id'         => 'blog-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'blog_fullwidth_nav_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Fullwidth Navigation Menu', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id' => 'blog_style',
            'type' => 'select',
            'title' => esc_html__('Blog Style', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            //'desc' => '',
            'options' => array('normal' => 'Normal', 'parallax' => 'Parallax'), //Must provide key => value pairs for select options
            'default' => 'normal'
        ),
        array(
            'id'       => 'show_blog_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Blog Header', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
                'id' => 'blog_home_text',
                'type' => 'text',
                'title' => esc_html__('Blog Heading Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => 'Our last <strong> News</strong>'
            ),
        array(
                'id' => 'blog_home_text_intro',
                'type' => 'textarea',
                'title' => esc_html__('Blog Intro Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => ''
            ),
        array(
                'id' => 'blog_header_video',
                'type' => 'text',
                'title' => esc_html__('Blog Header Video', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                'desc' => esc_html__('Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit'),
                'default' => ''
            ),
        array(
            'id' => 'blog_header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Blog Header Image', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Upload your blog header image', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/10.jpg'),
        ),
        array(
            'id'       => 'show_blog_breadcrumbs',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Breadcrumbs', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
                'id'       => 'blog_layout',
                'type'     => 'image_select',
                //'compiler' => true,
                'title'    => esc_html__( 'Blog Sidebar Layout', 'monolit' ),
                'desc' => esc_html__( 'Select main content and sidebar layout. The option 4 is default layout with right parallax image for Monolit theme.', 'monolit' ),
                'options'  => array(
                    'fullwidth' => array(
                        'alt' => 'Fullwidth',
                        'img' => get_template_directory_uri() . '/assets/redux/1col.png'
                    ),
                    'left_sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/assets/redux/2cl.png'
                    ),
                    'right_sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/assets/redux/2cr.png'
                    ),
                    
                ),
                'default'  => 'right_sidebar'
            ),

        array(
            'id'       => 'blog_author',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author meta', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Date meta', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories meta', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags meta', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        
        array(
            'id'       => 'blog_comments',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comments meta', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
       
        

    ),
) );