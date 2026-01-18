<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Blog Single', 'monolit'),
    'id'         => 'blog-single-optons',
    'subsection' => true,
    'fields' => array(

        array(
            'id'       => 'show_blog_header_single',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Single Post Header', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_featured_single',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Featured Image on single post page', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_author_single',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Block on single post page', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_tags_single',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags meta on single post page', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id' => 'blog_share_names',
            'type' => 'text',
            'title' => esc_html__('Share Names', 'monolit'),
            'desc' => esc_html__( 'Enter your social share names separated by a comma. List bellow are available name: facebook,twitter,linkedin,in1,tumblr,digg,googleplus,reddit,pinterest,posterous,email,vk', 'monolit' ),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => "facebook,pinterest,googleplus,twitter,linkedin",
        ),

        array(
            'id'       => 'blog_single_navigation',
            'type'     => 'switch',
            'on'        => esc_html__('Yes','monolit'),
            'off'       => esc_html__('No','monolit'),
            'title'    => esc_html__( 'Show posts navigation', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id'        => 'blog_single_nav_same_term',
            'type'      => 'switch',
            'on'        => esc_html__('Yes','monolit'),
            'off'       => esc_html__('No','monolit'),
            'title'     => esc_html__( 'Next/Prev posts should be in same category', 'monolit' ),
            'default'  => false,
        ),


        array(
            'id' => 'blog_list_link',
            'type' => 'text',
            'title' => esc_html__('Blog List Link', 'monolit'),
            'desc' => esc_html__('Link for blog list icon on single blog post page.', 'monolit'),
            'default' => esc_url( home_url('/blog/' ) )
        ),







        // array(
        //     'id' => 'blog-single-width',
        //     'type' => 'select',
        //     'title' => esc_html__('Blog Single Width', 'monolit'),
        //     'options' => array(
        //                     'blog-normal' => esc_html__('Boxed', 'monolit'),
        //                     'blog-wide' => esc_html__('Wide', 'monolit'),
        //                     'blog-fullwidth' => esc_html__('Fullwidth', 'monolit'),
        //      ), //Must provide key => value pairs for select options
        //     'default' => 'blog-normal'
        // ),
        
        // array(
        //     'id' => 'blog-single-sidebar-width',
        //     'type' => 'select',
        //     'title' => esc_html__('Single Sidebar Width', 'monolit'),
        //     'subtitle' => esc_html__( 'Based on Bootstrap 12 columns.', 'monolit' ),
        //     'options' => array(
        //                     '2' => esc_html__('2 Columns', 'monolit'),
        //                     '3' => esc_html__('3 Columns', 'monolit'),
        //                     '4' => esc_html__('4 Columns', 'monolit'),
        //                     '5' => esc_html__('5 Columns', 'monolit'),
        //                     '6' => esc_html__('6 Columns', 'monolit'),
        //      ), //Must provide key => value pairs for select options
        //     'default' => '4'
        // ),

        // array(
        //     'id'       => 'blog_single_title',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Title', 'monolit' ),
        //     'default'  => false,
        // ),
        // array(
        //     'id'       => 'blog_featured_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Featured image', 'monolit' ),
        //     'default'  => true,
        // ),
        
        // array(
        //     'id'       => 'blog_date_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Date', 'monolit' ),
        //     'default'  => true,
        // ),
        // array(
        //     'id'       => 'blog_author_meta',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Author', 'monolit' ),
        //     'default'  => true,
        // ),
        // array(
        //     'id'       => 'blog_cats_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Categories', 'monolit' ),
        //     'default'  => true,
        // ),
        // array(
        //     'id'       => 'blog_comments_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Comments', 'monolit' ),
        //     'default'  => true,
        // ),
        // array(
        //     'id'       => 'blog_tags_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Tags', 'monolit' ),
        //     'default'  => true,
        // ),

        // array(
        //     'id'       => 'blog_author_single',
        //     'type'     => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'    => esc_html__( 'Show Author Block', 'monolit' ),
        //     'default'  => true,
        // ),

        // array(
        //     'id'        => 'blog_show_share',
        //     'type'      => 'switch',
        //     'on'        => esc_html__('Yes','monolit'),
        //     'off'       => esc_html__('No','monolit'),
        //     'title'     => esc_html__( 'Show Share Post', 'monolit' ),
        //     'default'  => true,
        // ),



        
        



          
    ),
));
