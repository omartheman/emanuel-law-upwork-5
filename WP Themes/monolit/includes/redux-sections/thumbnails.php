<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Media', 'monolit'),
    'id'         => 'thumbnail_images',
    'subsection' => false,
    'desc'       => wp_kses(__( '<p>These settings affect the display and dimensions of images in your pages.</p>
        <p><em> Enter 9999 as Width value and uncheck Hard Crop to make your thumbnail dynamic width.</em></p>
        <p><em> Enter 9999 as Height value and uncheck Hard Crop to make your thumbnail dynamic height.</em></p>
        <p><em> Enter 9999 as Width and Height values to use full size image.</em></p>
<p>After changing these settings you may need to <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">regenerate your thumbnails</a>.</p>', 'monolit' ), array('p'=>array(),'a'=>array('class'=>array(),'href'=>array(),'target'=>array(),),'strong'=>array(),'em'=>array(),) ),
    'icon'       => 'el-icon-picture',
    'fields' => array(
        array(
            'id' => 'enable_custom_sizes',
            'type' => 'switch',
            'on' => 'Yes',
            'off' => 'No',
            'title' => esc_html__('Enable Custom Image Sizes', 'monolit'),
            // 'subtitle' => esc_html__('Show Constellation', 'monolit'),
            'default' => false
        ), 
        array(
            'id'       => 'fullscreen_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Fullscreen Thumbnail Size', 'monolit'),
            'desc' => esc_html__('For Home Slider, Slideshow, Image pages and fullscreen slider elements.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //1356,581,1
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'horizontal_slider_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Horizontal Thumbnail', 'monolit'),
            // 'subtitle' => esc_html__('You should enter 9999 as Width value and uncheck Hard Crop to make your thumbnail dynamic width.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //9999,658,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'horizontal_twover_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Horizontal Two Vertical Columns Thumbnail', 'monolit'),
            // 'subtitle' => esc_html__('You should enter 9999 as Width value and uncheck Hard Crop to make your thumbnail dynamic width.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //9999,329,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'horizontal_threever_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Horizontal Three Vertical Columns Thumbnail', 'monolit'),
            // 'subtitle' => esc_html__('You should enter 9999 as Width value and uncheck Hard Crop to make your thumbnail dynamic width.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //9999,219,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'galmasonry_thumbnail_size_one',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Vertical Size One', 'monolit'),
            'desc' => esc_html__('You should enter 9999 as Height value and uncheck Hard Crop to make your thumbnail dynamic height.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //390,9999,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),
        array(
            'id'       => 'galmasonry_thumbnail_size_two',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Vertical Size Two', 'monolit'),
            'desc' => esc_html__('You should enter 9999 as Height value and uncheck Hard Crop to make your thumbnail dynamic height.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //784,9999,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'galmasonry_thumbnail_size_three',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Vertical Size Three', 'monolit'),
            'desc' => esc_html__('You should enter 9999 as Height value and uncheck Hard Crop to make your thumbnail dynamic height.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //1178,9999,0
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'fopar_thumbnail_size_one',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Portfolio Parallax Size', 'monolit'),
            // 'subtitle' => esc_html__('Allow your to choose width, height, and crop thumbnail.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //678,437,1
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'team_member2_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Team Member Parallax Thumbnail', 'monolit'),
            // 'subtitle' => esc_html__('Allow your to choose width, height, and crop thumbnail.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //376,564,1
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

        array(
            'id'       => 'service_grid',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Service Grid Thumbnail', 'monolit'),
            // 'subtitle' => esc_html__('Allow your to choose width, height, and crop thumbnail.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '592', //376,564,1
                'height'  => '395',
                'hard_crop'  => 1
            ),
        ),


        array(
            'id'       => 'service_bg_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Service Background Thumbnail', 'monolit'),
            'desc' => esc_html__('You should enter 9999 as Height value and uncheck Hard Crop to make your thumbnail dynamic height.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //572,369,1
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),
        

        array(
            'id'       => 'blog_image_thumb',
            'type'     => 'thumbnail_size',
            // 'units'    => array('em','px','%'),
            'title' => esc_html__('Blog Post Thumbnail', 'monolit'),
            'desc' => esc_html__('Allow your to choose width, height, and crop thumbnail.', 'monolit'),
            // 'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'monolit'),
            'default'  => array(
                'width'   => '9999', //862,575,1
                'height'  => '9999',
                'hard_crop'  => 1
            ),
        ),

    ),
) );

