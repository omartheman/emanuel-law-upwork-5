<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Members', 'monolit'),
    'id'         => 'member-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-group',
    'fields' => array(
        array(
            'id'       => 'member_fullwidth_nav_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Fullwidth Navigation Menu', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id'       => 'show_member_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Header', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
                'id' => 'member_home_text',
                'type' => 'text',
                'title' => esc_html__('Member Heading Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => 'Our <strong> Team</strong>'
            ),
        array(
                'id' => 'member_home_text_intro',
                'type' => 'textarea',
                'title' => esc_html__('Member Intro Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => ''
            ),
        array(
                'id' => 'member_header_video',
                'type' => 'text',
                'title' => esc_html__('Header Background Video', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                'desc' => esc_html__('Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit'),
                'default' => ''
            ),
        array(
            'id' => 'member_header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Header Background Image', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            // 'desc' => esc_html__('Upload your team header image', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/10.jpg'),
        ),
        array(
            'id'       => 'show_member_breadcrumbs',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Breadcrumbs', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),

        array(
            'id' => 'member_first_side',
            'type' => 'select',
            'title' => esc_html__('First Member Content Side', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array('left' => 'Left', 'right' => 'Right'), //Must provide key => value pairs for select options
            'default' => 'left'
        ),
        array(
            'id'       => 'member_parallax_value',
            'type'     => 'text',
            'title'    => esc_html__( 'Parallax Dimension', 'monolit' ),
            'desc' => esc_html__( 'Pixel number. Which we are telling the browser is to move Member Photo down every time we scroll down 100% of the viewport height and move Member Photo up every time we scroll up 100% of the viewport height. Ex: 150  or -150 for reverse direction.', 'monolit' ),
            'default'  => '150',
        ),


        array(
            'id'       => 'member_read_more',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Read more', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),


        array(
                'id'       => 'member_layout',
                'type'     => 'image_select',
                //'compiler' => true,
                'title'    => esc_html__( 'Member Sidebar Layout', 'monolit' ),
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
                'default'  => 'fullwidth'
            ),

        array(
            'id'       => 'member_posts_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Posts per page', 'monolit' ),
            'subtitle' => esc_html__( 'Number of post to show per page, -1 to show all posts.', 'monolit' ),
            'default'  => 3,
        ),
        array(
            'id' => 'member_archive_orderby',
            'type' => 'select',
            'title' => esc_html__('Order Members By', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => '',
            'options' => array(
                            'none' => esc_html__( 'None', 'monolit' ), 
                            'ID' => esc_html__( 'Post ID', 'monolit' ), 
                            'author' => esc_html__( 'Post Author', 'monolit' ),
                            'title' => esc_html__( 'Post title', 'monolit' ), 
                            'name' => esc_html__( 'Post name (post slug)', 'monolit' ),
                            'date' => esc_html__( 'Created Date', 'monolit' ),
                            'modified' => esc_html__( 'Last modified date', 'monolit' ),
                            'parent' => esc_html__( 'Post Parent id', 'monolit' ),
                            'rand' => esc_html__( 'Random', 'monolit' ),
                        ), //Must provide key => value pairs for select options
            'default' => 'date'
        ),
        array(
            'id' => 'member_archive_order',
            'type' => 'select',
            'title' => esc_html__('Order Members', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => '',
            'options' => array(
                            'DESC' => esc_html__( 'Descending', 'monolit' ),
                            'ASC' => esc_html__( 'Ascending', 'monolit' ), 
                            
                        ), //Must provide key => value pairs for select options
            'default' => 'DESC'
        ),

        array(
            'id' => 'member_list_link',
            'type' => 'text',
            'title' => esc_html__('Member List Link', 'monolit'),
            'desc' => esc_html__('Link for member list icon on single member page. Default: your_domain.com/?post_type=monolit_member or your_domain.com/monolit_member/', 'monolit'),
            'default' => ''
        ),

    ),
) );