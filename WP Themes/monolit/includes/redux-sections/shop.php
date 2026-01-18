<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Shop', 'monolit'),
    'id'         => 'shop-settings',
    'subsection' => false,
    'icon'       => 'el-icon-shopping-cart',
    'fields' => array(
        array(
            'id'       => 'shop_fullwidth_nav_menu',
            'type'     => 'switch',
            'on'=> esc_html__('Yes', 'monolit'),
            'off'=> esc_html__('No', 'monolit'),
            'title'    => esc_html__( 'Fullwidth Navigation Menu', 'monolit' ),
            'default'  => false,
        ),


        array(
            'id'       => 'show_shop_header',
            'type'     => 'switch',
            'on'=> esc_html__('Yes', 'monolit'),
            'off'=> esc_html__('No', 'monolit'),
            'title'    => esc_html__( 'Show Shop Header', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id' => 'shop_header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Shop Header Image', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/10.jpg'),
        ),

        array(
            'id'       => 'shop_breadcrumbs',
            'type'     => 'switch',
            'on'=> esc_html__('Yes', 'monolit'),
            'off'=> esc_html__('No', 'monolit'),
            'title'    => esc_html__( 'Show Breadcrumbs', 'monolit' ),
            'default'  => true,
        ),

        array(
            'id'       => 'shop_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Shop Sidebar', 'monolit' ),

            'options'  => array(
                'fullwidth' => array(
                    'alt' => 'No Sidebar',
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
            'id' => 'shop-sidebar-width',
            'type' => 'select',
            'title' => esc_html__('Sidebar Width', 'monolit'),
            'subtitle' => esc_html__( 'Based on Bootstrap 12 columns.', 'monolit' ),
            'options' => array(
                            '2' => esc_html__('2 Columns', 'monolit'),
                            '3' => esc_html__('3 Columns', 'monolit'),
                            '4' => esc_html__('4 Columns', 'monolit'),
                            '5' => esc_html__('5 Columns', 'monolit'),
                            '6' => esc_html__('6 Columns', 'monolit'),
             ), //Must provide key => value pairs for select options
            'default' => '4'
        ),


        array(
            'id'       => 'shop_posts_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Posts per page', 'monolit' ),
            'subtitle' => esc_html__( 'Number of post to show per page, -1 to show all posts.', 'monolit' ),
            'default'  => 12,
        ),
        // array(
        //     'id'       => 'show_image_large_popup',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show image popup button', 'monolit' ),
        //     'subtitle' => esc_html__( 'Set this to On to show image popup button on product list view.', 'monolit' ),
        //     'default'  => true,
        // ),
        

        array(
            'id' => 'shop_columns',
            'type' => 'select',
            'title' => esc_html__('Desktop Columns', 'monolit'),
            'desc' => esc_html__('Number of products per row on desktop view.','monolit'),
            'options' => array(
                            'one' => esc_html__('One column', 'monolit'),
                            'two' => esc_html__('Two columns', 'monolit'),
                            'three' => esc_html__('Three columns', 'monolit'),
                            'four' => esc_html__('Four columns', 'monolit'),
                            'five' => esc_html__('Five columns', 'monolit'),
                            'six' => esc_html__('Six columns', 'monolit'),
                            
                        ),
            'default' => 'three'
        ),


        array(
            'id' => 'shop_columns_tablet',
            'type' => 'select',
            'title' => esc_html__('Horizontal Tablet Columns', 'monolit'),
            'desc' => esc_html__('Number of products per row on tablet horizontal view.','monolit'),
            'options' => array(
                            'one' => esc_html__('One column', 'monolit'),
                            'two' => esc_html__('Two columns', 'monolit'),
                            'three' => esc_html__('Three columns', 'monolit'),
                            'four' => esc_html__('Four columns', 'monolit'),
                            'five' => esc_html__('Five columns', 'monolit'),
                            'six' => esc_html__('Six columns', 'monolit'),
                            
                        ),
            'default' => 'three'
        ),
        

        // array(
        //     'id'       => 'shop_show_header_mini_cart',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show shopping cart on header?', 'monolit' ),
        //     'default'  => true,
        // ),

        
        // array(
        //     'id' => 'shop_layout',
        //     'type' => 'select',
        //     'title' => esc_html__('Shop Layout', 'monolit'),
        //     'options' => array(
        //                     'grid_layout' => esc_html__('Grid Layout', 'monolit'),
        //                     'list_layout' => esc_html__('List Layout', 'monolit'),
        //                 ),
        //     'default' => 'grid_layout'
        // ),

        // array(
        //     'id'       => 'shop_show_layout_switcher',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show layout switch?', 'monolit' ),
        //     'default'  => true,
        // ),

        // array(
        //     'id'       => 'shop_show_product_list_excerpt',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show product excerpt?', 'monolit' ),
        //     'default'  => true,
        // ),
        
    ),
) );
