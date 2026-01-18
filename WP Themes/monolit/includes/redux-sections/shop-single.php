<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Product Page', 'monolit'),
    'id'         => 'product-page-settings',
    'subsection' => true,
    'fields' => array(
        // array(
        //     'id' => 'shop-single-image-width',
        //     'type' => 'select',
        //     'title' => esc_html__('Images column width', 'monolit'),
        //     'options' => array(
        //                     '1' => esc_html__('1 Column', 'monolit'),
        //                     '2' => esc_html__('2 Columns', 'monolit'),
        //                     '3' => esc_html__('3 Columns', 'monolit'),
        //                     '4' => esc_html__('4 Columns', 'monolit'),
        //                     '5' => esc_html__('5 Columns', 'monolit'),
        //                     '6' => esc_html__('6 Columns', 'monolit'),
        //                     ), 
        //     'default' => '4'
        // ),

        // array(
        //     'id' => 'single_thumbnails_columns',
        //     'type' => 'select',
        //     'title' => esc_html__('Thumbnails Columns', 'monolit'),
        //     'options' => array('1' => 'One Column', '2' => 'Two Columns','3' => 'Three Columns', '4' => 'Four Columns', '5' => 'Five Columns', '6' => 'Six Columns'), 
        //     'default' => '4'
        // ),

        array(
            'id'       => 'shop_single_navigation',
            'type'     => 'switch',
            'on'        => esc_html__('Yes','monolit'),
            'off'       => esc_html__('No','monolit'),
            'title'    => esc_html__( 'Show Next/Prev products navigation', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'        => 'shop_single_nav_same_term',
            'type'      => 'switch',
            'on'        => esc_html__('Yes','monolit'),
            'off'       => esc_html__('No','monolit'),
            'title'     => esc_html__( 'Next/Prev products should be in same category', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id' => 'shop_list_link',
            'type' => 'text',
            'title' => esc_html__('Shop List Link', 'monolit'),
            'desc' => esc_html__('Link for shop list icon on single product page.', 'monolit'),
            'default' => esc_url( home_url('/shop/' ) )
        ),



        // array(
        //     'id'       => 'show_single_related',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show Related Products', 'monolit' ),
        //     'subtitle' => esc_html__( 'Set this to Yes to show related products on single product page.', 'monolit' ),
        //     'default'  => true,
        // ),
        array(
            'id' => 'single_related_count',
            'type' => 'text',
            'title' => esc_html__('Related Products Count', 'monolit'),
            'desc' => esc_html__('Set number of related products to show ( -1 for all).','monolit'),
            
            'default' => '3'
        ),
        // array(
        //     'id' => 'single_related_columns',
        //     'type' => 'select',
        //     'title' => esc_html__('Related Columns Grid', 'monolit'),
        //     'options' => array(
        //                     '12' => esc_html__('1 Column', 'monolit'),
        //                     '6' => esc_html__('2 Columns', 'monolit'),
        //                     '4' => esc_html__('3 Columns', 'monolit'),
        //                     '3' => esc_html__('4 Columns', 'monolit'),
                            
        //                     '2' => esc_html__('6 Columns', 'monolit'),
        //                 ),
        //     'default' => '4'
        // ),

        // array(
        //     'id'       => 'show_single_up_sells',
        //     'type'     => 'switch',
        //     'on'=> esc_html__('Yes', 'monolit'),
        //     'off'=> esc_html__('No', 'monolit'),
        //     'title'    => esc_html__( 'Show Up Sells', 'monolit' ),
            
        //     'default'  => true,
        // ),
        array(
            'id' => 'single_up_sells_count',
            'type' => 'text',
            'title' => esc_html__('Up-Sells Count', 'monolit'),
            'desc' => esc_html__('Set number of up-sells products to show ( -1 for all).','monolit'),
            
            'default' => '-1'
        ),
        // array(
        //     'id' => 'single_up_sells_columns',
        //     'type' => 'select',
        //     'title' => esc_html__('Up-Sells Columns Grid', 'monolit'),
        //     'options' => array(
        //                     '12' => esc_html__('1 Column', 'monolit'),
        //                     '6' => esc_html__('2 Columns', 'monolit'),
        //                     '4' => esc_html__('3 Columns', 'monolit'),
        //                     '3' => esc_html__('4 Columns', 'monolit'),
                            
        //                     '2' => esc_html__('6 Columns', 'monolit'),
        //                 ),
        //     'default' => '4'
        // ),

    ),
) );