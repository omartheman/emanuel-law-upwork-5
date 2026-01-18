<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Portfolio', 'monolit'),
    'id'         => 'portfolio-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-briefcase',
    'fields' => array(

        array(
            'id'       => 'folio_fullwidth_nav_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Fullwidth Navigation Menu', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),

        array(
            'id'       => 'show_folio_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Portfolio Header', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
                'id' => 'folio_home_text',
                'type' => 'text',
                'title' => esc_html__('Portfolio Heading Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => 'Our <strong> portfolio </strong>'
            ),
        array(
                'id' => 'folio_home_text_intro',
                'type' => 'textarea',
                'title' => esc_html__('Portfolio Intro Text', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                // 'desc' => esc_html__('', 'monolit'),
                'default' => ''
            ),
        array(
                'id' => 'folio_header_video',
                'type' => 'text',
                'title' => esc_html__('Portfolio Header Video', 'monolit'),
                // 'subtitle' => esc_html__('', 'monolit'),
                'desc' => esc_html__('Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit'),
                'default' => ''
            ),
        array(
            'id' => 'folio_header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Portfolio Header Image', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            // 'desc' => esc_html__('Upload your blog header image', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/17.jpg'),
        ),
        array(
            'id'       => 'show_folio_breadcrumbs',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Breadcrumbs', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),

        array(
            'id'       => 'show_folio_footer_content',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Content Footer', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),

        array(
            'id' => 'folio_style',
            'type' => 'select',
            'title' => esc_html__('Portfolio Layout', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array(
                            'horizontal' => 'Horizontal',
                            'horizontal_boxed' => 'Horizontal Boxed',
                            'vertical' => 'Vertical', 
                            'vertical_fullscreen' => 'Vertical Fullscreen', 
                            'parallax' => 'Parallax', 
                            //'gallery_masonry' => 'Gallery Masonry', 
                            //'gallery_grid' => 'Gallery Grid',
             ), //Must provide key => value pairs for select options
            'default' => 'parallax'
        ),
        array(
            'id' => 'folio_column',
            'type' => 'select',
            'title' => esc_html__('Portfolio Columns', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => esc_html__('Vertical columns for Horizontal layout', 'monolit'),
            'options' => array('five' => 'Five Columns','four' => 'Four Columns', 'three' => 'Three Columns','two' => 'Two Columns', 'one' => 'One Column'), //Must provide key => value pairs for select options
            'default' => 'two'
        ),
        array(
            'id'       => 'folio_show_filter',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Filter', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'folio_show_counter',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Counter', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'folio_posts_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Posts per page', 'monolit' ),
            'subtitle' => esc_html__( 'Number of post to show per page, -1 to show all posts.', 'monolit' ),
            'default'  => 10,
        ),
        array(
            'id' => 'folio_filter_orderby',
            'type' => 'select',
            'title' => esc_html__('Order Filter By', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array(
                            'id' => esc_html__( 'ID', 'monolit' ), 
                            'count' => esc_html__( 'Count', 'monolit' ),
                            'name' => esc_html__( 'Name', 'monolit' ), 
                            'slug' => esc_html__( 'Slug', 'monolit' ),
                            'none' => esc_html__( 'None', 'monolit' )
                        ), //Must provide key => value pairs for select options
            'default' => 'name'
        ),
        array(
            'id' => 'folio_filter_order',
            'type' => 'select',
            'title' => esc_html__('Order Filter', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array(
                            'ASC' => esc_html__( 'Ascending', 'monolit' ), 
                            'DESC' => esc_html__( 'Descending', 'monolit' ),
                        ), //Must provide key => value pairs for select options
            'default' => 'ASC'
        ),
        array(
            'id' => 'folio_archive_orderby',
            'type' => 'select',
            'title' => esc_html__('Order Portfolio By', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
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
            'id' => 'folio_archive_order',
            'type' => 'select',
            'title' => esc_html__('Order Portfolio', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array(
                            'DESC' => esc_html__( 'Descending', 'monolit' ),
                            'ASC' => esc_html__( 'Ascending', 'monolit' ), 
                            
                        ), //Must provide key => value pairs for select options
            'default' => 'DESC'
        ),
        array(
            'id' => 'folio_show_info_first',
            'type' => 'select',
            'title' => esc_html__('Show Info', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array(
                            'show_on_hover' => esc_html__( 'Show On Hover', 'monolit' ),
                            'show' => esc_html__( 'Show', 'monolit' ), 
                            'hide' => esc_html__( 'Hide', 'monolit' ), 
                            
                        ), //Must provide key => value pairs for select options
            'default' => 'show_on_hover'
        ),
        
        array(
            'id' => 'folio_pad',
            'type' => 'select',
            'title' => esc_html__('Spacing', 'monolit'),
            'subtitle' => esc_html__('The space between portfolio grid items.', 'monolit'),
            'desc' => '',
            'options' => array(
                            'small' => esc_html__('Small','monolit'), 
                            'big' =>  esc_html__('Big','monolit'),
                            'none' =>  esc_html__('None','monolit'),
                        ), //Must provide key => value pairs for select options
            'default' => 'small'
        ),
        array(
            'id'       => 'folio_enable_gallery',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Image Gallery on Portfolio Grid', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id'       => 'folio_disable_overlay',
            'type'     => 'switch',
            'title'    => esc_html__( 'Disbale Image Overlay Effect', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
    ),
) );
