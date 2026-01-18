<?php
/* banner-php */
// -> START General Settings

Redux::setSection( $opt_name, array(
    'title' => esc_html__('General', 'monolit'),
    'id'         => 'general-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-cogs',
    'fields' => array(
        array(
            'id' => 'favicon',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Custom Favicon', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Upload your Favicon.', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/favicon.ico'),
        ),
        array(
            'id' => 'logo_first',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Your Logo', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Upload your logo.', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/logo.png'),
        ),
        array(
            'id' => 'logo_size_width',
            'type' => 'text',
            'title' => esc_html__('Logo Size Width', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => esc_html__('', 'monolit'),
            'default' => '123'
        ),
        array(
            'id' => 'logo_size_height',
            'type' => 'text',
            'title' => esc_html__('Logo Size Height', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => esc_html__('', 'monolit'),
            'default' => '50'
        ),
        array(
            'id' => 'logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => esc_html__('', 'monolit'),
            'default' => ''
        ),
        array(
            'id' => 'slogan',
            'type' => 'text',
            'title' => esc_html__('Slogan (Sub Logo Text)', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            // 'desc' => esc_html__('', 'monolit'),
            'default' => ''
        ),
        

        array(
            'id'=>'dynamic_menus',
            'type' => 'multi_text',
            'title' => esc_html__('Multi Menu Locations', 'monolit'),
            // 'validate' => 'color',
            'default'=> array(),
            'desc' => wp_kses(__('These values will display on <strong>Appearance</strong> &gt; <strong>Menus</strong> and <strong>Scroll Navigation Menu</strong> on page, post or portfolio setting.', 'monolit'),array('strong'=>array(),'p'=>array()) ),
            // 'desc' => esc_html__('This is the description field, again good for additional info.', 'monolit')
        ),

        array(
            'id' => 'show_loader',
            'type' => 'switch',
            'title' => esc_html__('Show animation loadder', 'monolit'),
            'desc' => esc_html__('Show animation loader', 'monolit'),
            // 'desc' => esc_html__('','monolit'),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => true
        ),
        array(
            'id' => 'show_submenu_mobile',
            'type' => 'switch',
            'title' => esc_html__('Show Submenu on Mobile', 'monolit'),
            'desc' => esc_html__('Set this option to On to display submenu items on mobile devices instead of hovering its parent.', 'monolit'),
            // 'desc' => esc_html__('','monolit' ),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => false
        ),
        array(
            'id' => 'disable_shuffle_script',
            'type' => 'switch',
            'title' => esc_html__('Disable Shuffle Text Script', 'monolit'),
            'desc' => esc_html__('When disabled shuffling text effect on the left title and scroll top text is off.', 'monolit'),
            // 'desc' => esc_html__('','monolit' ),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => false
        ),
        array(
            'id' => 'disable_parallax_effect',
            'type' => 'switch',
            'title' => esc_html__('Disable Parallax Effect', 'monolit'),
            // 'subtitle' => esc_html__('When disabled', 'monolit'),
            // 'desc' => esc_html__('','monolit' ),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => false
        ),
        array(
            'id' => 'gmap_api_key',
            'type' => 'text',
            // 'url' => true,
            'title' => esc_html__('Google Map API Key', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get a key</a>.',
            // 'default' => '',
        ),
        array(
            'id' => 'enable_image_click',
            'type' => 'switch',
            'on' => esc_html__('Yes', 'monolit'),
            'off' => esc_html__('No', 'monolit'),
            'title' => esc_html__('Enable Image Click', 'monolit'),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => false
        ),
    ),
) );