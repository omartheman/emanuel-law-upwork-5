<?php
/* banner-php */

/**
 * Monolit only works in WordPress 5.0 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.0', '<' ) ) {
    require get_template_directory() . '/includes/back-compat.php';
    return;
}

if ( file_exists(get_template_directory() . '/includes/redux-configs.php')) {
    require_once get_template_directory() . '/includes/redux-configs.php';
}

if(!isset($monolit_options)) $monolit_options = get_option( 'monolit_options', array() ); 


if (!function_exists('monolit_setup_theme')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     *
     */

    function monolit_setup_theme() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'monolit', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        
        add_theme_support('post-thumbnails');

        monolit_get_thumbnail_sizes();

        // Set the default content width.
        $GLOBALS['content_width'] = apply_filters( 'monolit_content_width', 806 );  
        

        // This theme uses wp_nav_menu() in one location.
        register_nav_menu('primary', esc_html__('Primary Menu (Main Navigation)', 'monolit'));
        register_nav_menu('onepage', esc_html__('One Page Menu (with Scrolling Effect)', 'monolit'));
        
        // This theme uses its own gallery styles.
        $dynamic_menus = monolit_get_option('dynamic_menus', array());
        $dynamic_menus = array_filter($dynamic_menus);
        if ( !empty($dynamic_menus)) {
            foreach ((array)$dynamic_menus as $key => $location) {
                register_nav_menu(sanitize_title($location), $location);
            }
        }
        
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ) );

        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', array(
            'width'       => 134,
            'height'      => 50,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' ),

        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // from version 2.0
        add_theme_support( 'woocommerce' );
        // add_theme_support( 'wc-product-gallery-zoom' );
        //add_theme_support( 'wc-product-gallery-lightbox' );
        //add_theme_support( 'wc-product-gallery-slider' );

        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => esc_attr_x( '300', 'WooCommerce thumbnail width', 'monolit' ),
            'single_image_width'    => esc_attr_x( '500', 'WooCommerce single image width', 'monolit' ),

            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        ) );
        add_theme_support( 'wc-product-gallery-zoom' );
        // add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        
        add_filter('use_default_gallery_style', '__return_false');

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, and column width.
         */
        add_editor_style( array( 'assets/css/editor-style.css', monolit_fonts_url() ) );

        // deactivate new block editor
        remove_theme_support( 'widgets-block-editor' );
    }
}
add_action('after_setup_theme', 'monolit_setup_theme');

if(!function_exists('monolit_get_thumbnail_sizes')){
    function monolit_get_thumbnail_sizes(){
        // options default must have these values
        if( false == monolit_get_option('enable_custom_sizes') ) return;
        $option_sizes = array(
            'monolitfuls-thumb'=>'fullscreen_thumb',
            'monolithoz-thumb'=>'horizontal_slider_thumb',
            'monolithoztwover-thumb'=>'horizontal_twover_thumb',
            'monolithozthreever-thumb'=>'horizontal_threever_thumb',
            'monolitfolio-parallax'=>'fopar_thumbnail_size_one',
            
            'monolitmasonry-size-one'=>'galmasonry_thumbnail_size_one',
            'monolitmasonry-size-two'=>'galmasonry_thumbnail_size_two',
            'monolitmasonry-size-three'=>'galmasonry_thumbnail_size_three',

            'monolitmember2-thumb'=>'team_member2_thumb',
            'monolit-service-thumb'=>'service_bg_thumb',
            'monolitblog-thumb'=>'blog_image_thumb',
            'monolit-service'=>'service_grid',
            
            
        );

        foreach ($option_sizes as $name => $opt) {
            $option_size = monolit_get_option($opt);
            if($option_size !== false && is_array($option_size)){
                $size_val = array(
                    'width' => (isset($option_size['width']) && !empty($option_size['width']) )? (int)$option_size['width'] : (int)'9999',
                    'height' => (isset($option_size['height']) && !empty($option_size['height']) )? (int)$option_size['height'] : (int)'9999',
                    'hard_crop' => (isset($option_size['hard_crop']) && !empty($option_size['hard_crop']) )? (bool)$option_size['hard_crop'] : (bool)'0',
                );

                add_image_size( $name, $size_val['width'], $size_val['height'], $size_val['hard_crop'] );
            }
        }

        add_image_size('monolit-carousel', esc_html_x('374', 'carousel slider width','monolit' ), esc_html_x('623', 'carousel slider height', 'monolit' ), true );
        add_image_size('monolitfolio-carousel', esc_html_x('1183', 'portfolio slider width','monolit' ), esc_html_x('763', 'portfolio slider height', 'monolit' ), true );

    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function monolit_content_width() {

    $content_width = $GLOBALS['content_width'];


    // Check if is single post and there is no sidebar.
    if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
        $content_width = 1040;
    }

    /**
     * Filter monolit content width of the theme.
     *
     *
     * @param int $content_width Content width in pixels.
     */
    $GLOBALS['content_width'] = apply_filters( 'monolit_content_width_templ', $content_width );
}
add_action( 'template_redirect', 'monolit_content_width', 0 );


/**
 * Register widget area.
 *
 *
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function monolit_register_sidebars() {
    
    register_sidebar(
        array(
            'name' => esc_html__('Main Sidebar', 'monolit'), 
            'id' => 'sidebar-1', 
            'description' => esc_html__('Appears in the sidebar section of the site.', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3>', 
            'after_title' => '</h3><div class="clearfix"></div>',
        )
    );
    
    register_sidebar(
        array(
            'name' => esc_html__('Page Sidebar', 'monolit'), 
            'id' => 'sidebar-2', 
            'description' => esc_html__('Appears in the sidebar section of the page template.', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="widget cth %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3>', 
            'after_title' => '</h3><div class="clearfix"></div>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Shop Sidebar', 'monolit'), 
            'id' => 'sidebar-shop', 
            'description' => esc_html__('Appears in the sidebar section of shop pages.', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="widget shop-widget cth %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3>', 
            'after_title' => '</h3><div class="clearfix"></div>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Member Sidebar', 'monolit'), 
            'id' => 'sidebar-3', 
            'description' => esc_html__('Appears in the sidebar section of team member pages', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="widget cth %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3>', 
            'after_title' => '</h3><div class="clearfix"></div>',
        )
    );



    register_sidebar(
        array(
            'name' => esc_html__('Social Share', 'monolit'), 
            'id' => 'social_share_widget', 
            'description' => esc_html__('Widget area for Share menu. To use this area you must leave Share Names field on Monolit Options &gt; Social Share Settings empty', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer Columns Widget', 'monolit'), 
            'id' => 'footer_columns_widget', 
            'description' => esc_html__('Appears above the footer copyright content.', 'monolit'), 
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s ' . monolit_slbd_count_widgets('footer_columns_widget') . '">', 
            'after_widget' => '</div>', 
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'monolit_register_sidebars');

if(!function_exists('monolit_slbd_count_widgets')){
   /**
     * Count number of widgets in a sidebar
     * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
     */
    function monolit_slbd_count_widgets($sidebar_id) {
        
        // If loading from front page, consult $_wp_sidebars_widgets rather than options
        // to see if wp_convert_widget_settings() has made manipulations in memory.
        global $_wp_sidebars_widgets;
        if (empty($_wp_sidebars_widgets)):
            $_wp_sidebars_widgets = get_option('sidebars_widgets', array());
        endif;
        
        $sidebars_widgets_count = $_wp_sidebars_widgets;
        
        if (isset($sidebars_widgets_count[$sidebar_id])):
            $widget_count = count($sidebars_widgets_count[$sidebar_id]);
            $widget_classes = 'widget-count-' . count($sidebars_widgets_count[$sidebar_id]);
            if ($widget_count % 6 == 0 && $widget_count >= 6):
                
                // Six widgets er row if there are exactly four or more than six
                $widget_classes.= ' col-md-2';
            elseif ($widget_count % 4 == 0 && $widget_count >= 4):
                
                // Four widgets er row if there are exactly four or more than six
                $widget_classes.= ' col-md-3';
            elseif ($widget_count % 3 == 0 && $widget_count >= 3):
                
                // Three widgets per row if there's three or more widgets
                $widget_classes.= ' col-md-4';
            elseif (2 == $widget_count):
                
                // Otherwise show two widgets per row
                $widget_classes.= ' col-md-6';
            elseif (1 == $widget_count):
                
                // Otherwise show two widgets per row
                $widget_classes.= ' col-md-12';
            endif;
            
            return $widget_classes;
        endif;
    } 
}

/**
 * Register custom fonts.
 */
function monolit_fonts_url() {
    $fonts_url = '';
    $font_families     = array();

    if ( 'off' !== esc_html_x( 'on', 'Roboto font: on or off', 'monolit' ) ) {
        $font_families[] = 'Roboto:400,300,200,100,400italic,700,900';
    }

    if ( 'off' !== esc_html_x( 'on', 'Muli font: on or off', 'monolit' ) ) {
        $font_families[] = 'Muli';
    }

    if ( $font_families ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,vietnamese,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles.
 *
 *
 */

if (!function_exists('monolit_scripts_styles')) {
    function monolit_scripts_styles() {
       
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script("monolit-js-plugins", get_template_directory_uri() . "/assets/js/plugins.js", array('jquery'), null, true);
        wp_enqueue_script("monolit-scripts", get_template_directory_uri() . "/assets/js/scripts.js", array('imagesloaded'), null, true);
        wp_localize_script( 'monolit-scripts', '_monolit', array(
            'shuffle_off' => monolit_get_option('disable_shuffle_script'),
            'parallax_off' => monolit_get_option('disable_parallax_effect'),
            'enable_image_click' => monolit_global_var('enable_image_click')
        ) );
        
        //wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css',);
        wp_enqueue_style('monolit-css-plugins', get_template_directory_uri() . '/assets/css/plugins.css', array(), null );
        wp_enqueue_style('monolit-fonts', monolit_fonts_url(), array(), null );
        wp_enqueue_style('monolit-style', get_stylesheet_uri(), array(), null);
        wp_enqueue_style('monolit-custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), null);
        if ( monolit_get_option('override-preset') ) {
            $inline_style = monolit_overridestyle();
            if (!empty($inline_style)) {
                wp_add_inline_style('monolit-custom-style', $inline_style);
            }
        }
        
        $inline_custom_style = trim( monolit_get_option('custom-css') );
        $medium_css = trim( monolit_get_option('custom-css-medium') );
        if( !empty( $medium_css ) ){
            $inline_custom_style .= '@media only screen and  (max-width: 1036px){'.$medium_css.'}';
        }
        $tablet_css = trim( monolit_get_option('custom-css-tablet') );
        if( !empty( $tablet_css ) ){
            $inline_custom_style .= '@media only screen and  (max-width: 768px){'.$tablet_css.'}';
        }
        $mobile_css = trim( monolit_get_option('custom-css-mobile') );
        if( !empty( $mobile_css ) ){
            $inline_custom_style .= '@media only screen and  (max-width: 640px){'.$mobile_css.'}';
        }
        
        if (!empty($inline_custom_style)) {
            wp_add_inline_style('monolit-custom-style', monolit_stripWhitespace($inline_custom_style) );
        }
    }
}
add_action('wp_enqueue_scripts', 'monolit_scripts_styles');


/**
 * Modify menu link class attribute
 *
 *
 */
add_filter('nav_menu_css_class', 'monolit_nav_menu_css_class_func', 10, 2);

$monolit_menu_link_class = array();

function monolit_nav_menu_css_class_func($classes, $item) {
    global $monolit_menu_link_class;
    $monolit_menu_link_class = array();
    $external_menu = array_search("external", $classes);
    if ($external_menu !== false) {
        $monolit_menu_link_class[] = 'external';
    }
    //scroll menu for multipage menu
    $menu_scroll_link_menu = array_search("menu-scroll-link", $classes);
    if ($menu_scroll_link_menu !== false) {
        $monolit_menu_link_class[] = 'menu-scroll-link';
    }
    $current_menu = array_search("current-menu-item", $classes);
    if ($current_menu !== false) {
        $monolit_menu_link_class[] = 'act-link';
    }
    $current_menu_ancestor = array_search("current-menu-ancestor", $classes);
    if ($current_menu_ancestor !== false) {
        $monolit_menu_link_class[] = 'ancestor-act-link';
    }
    $current_menu_parent = array_search("current-menu-parent", $classes);
    if ($current_menu_parent !== false) {
        $monolit_menu_link_class[] = 'parent-act-link';
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'monolit_nav_menu_link_attributes_func', 10, 3);

function monolit_nav_menu_link_attributes_func($atts, $item, $args) {
    global $monolit_menu_link_class;
    if (!empty($monolit_menu_link_class)) {
        $atts['class'] = implode(" ", $monolit_menu_link_class);
    }
    
    return $atts;
}


if(!function_exists('monolit_breadcrumbs')){
    function monolit_breadcrumbs() {
               
        // Settings
        $separator          = esc_html__('/','monolit');//'&gt;';
        $breadcrums_id      = 'breadcrumb';
        $breadcrums_class   = 'main-breadcrumb creat-list';
        $home_title         = esc_html__('Home','monolit');
        $blog_title         = esc_html__('Blog','monolit');
         
        // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
        // $custom_taxonomy    = 'product_cat,portfolio_cat,cth_speaker';
        $custom_taxonomy    = '';

        $custom_post_types = array(
                                'portfolio' => esc_html_x('Portfolio','portfolio archive in breadcrumb','monolit'),
                                'product' => esc_html_x('Products','product archive in breadcrumb','monolit'),
                                'monolit_member' => esc_html_x('Team','Team archive in breadcrumb','monolit'),
                            );
          
        // Get the query & post information
        global $post,$wp_query;
          
        // Do not display on the homepage
        if ( !is_front_page() ) {
          
            // Build the breadcrums
            echo '<ul id="' . esc_attr($breadcrums_id ) . '" class="' . esc_attr($breadcrums_class ) . '">';
              
            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url(null,'/') ) . '" title="' . esc_attr($home_title ) . '">' . esc_attr($home_title ) . '</a></li>';

            if(is_home()){
                // Blog page
                echo '<li class="item-current item-blog"><strong class="bread-current item-blog">' . esc_attr($blog_title ) . '</strong></li>';
            }
              
            if ( is_archive() && !is_tax() ) {

                // If post is a custom post type
                $post_type = get_post_type();

                if($post_type && array_key_exists($post_type, $custom_post_types)){
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><strong class="bread-current bread-archive">' . $custom_post_types[$post_type] . '</strong></li>';
                }else{
                     echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . get_the_archive_title() . '</strong></li>';
                }
                 
            } else if ( is_archive() && is_tax() ) {
                 
                // If post is a custom post type
                $post_type = get_post_type();
                 
                // If it is a custom post type display name and link
                if($post_type && $post_type != 'post') {
                     
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);
                 
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive ) . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                 
                }
                 
                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
                 
            } else if ( is_single() ) {
                
                // If post is a custom post type
                $post_type = get_post_type();
                $last_category = '';
                // If it is a custom post type (not support custom taxonomy) display name and link
                if( !in_array( $post_type, array('post','portfolios') ) ) {
                     
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);

                    if(array_key_exists($post_type, $custom_post_types)){
                        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive ) . '" title="' . $custom_post_types[$post_type] . '">' . $custom_post_types[$post_type] . '</a></li>';
                    }else{
                        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive ) . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                    }
                    
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . get_the_title() . '</strong></li>';
                }elseif($post_type == 'post'){
                    // Get post category info
                    $category = get_the_category();
                     
                    // Get last category post is in
                    
                    if($category){
                        $last_cateogries = array_values($category);
                        $last_category = end($last_cateogries);
                     
                        // Get parent any categories and create array
                        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                        $cat_parents = explode(',',$get_cat_parents);
                         
                        // Loop through parent categories and store in variable $cat_display
                        $cat_display = '';
                        foreach($cat_parents as $parents) {
                            $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                            
                        }
                    }
                    
                    if(!empty($last_category)) {
                        echo wp_kses_post($cat_display );
                        echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . get_the_title() . '</strong></li>';
                         
                    // Else if post is in a custom taxonomy
                    }
                }
                    
                     
                // If it's a custom post type within a custom taxonomy
                if(empty($last_category) && !empty($custom_taxonomy)) {
                    $custom_taxonomy_arr = explode(",", $custom_taxonomy) ;
                    foreach ($custom_taxonomy_arr as $key => $custom_taxonomy_val) {
                        $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy_val );
                        if($taxonomy_terms && !($taxonomy_terms instanceof WP_Error) ){
                            $cat_id         = $taxonomy_terms[0]->term_id;
                            $cat_nicename   = $taxonomy_terms[0]->slug;
                            $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy_val);
                            $cat_name       = $taxonomy_terms[0]->name;

                            if(!empty($cat_id)) {
                         
                                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . esc_url($cat_link ) . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                                
                                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . get_the_title() . '</strong></li>';
                             
                            }
                        }

                     } 
                    
                  
                }
                 
                
                 
            } else if ( is_category() ) {
                  
                // Category page
                echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';
                  
            } else if ( is_page() ) {
                  
                // Standard page
                if( $post->post_parent ){

                    $parents = '';
                      
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                      
                    // Get parents in the right order
                    $anc = array_reverse($anc);
                      
                    // Parent page loop
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . esc_url(get_permalink($ancestor) ) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . get_the_title($ancestor) . '</a></li>';
                        
                    }
                      
                    // Display parent pages
                    echo wp_kses_post($parents );
                      
                    // Current page
                    echo '<li class="item-current item-page item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . get_the_title() . '</strong></li>';
                      
                } else {
                      
                    // Just display current page if not parents
                    echo '<li class="item-current item-page item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . get_the_title() . '</strong></li>';
                      
                }
                  
            } else if ( is_tag() ) {
                  
                // Tag page
                  
                // Get tag information
                $term_id = get_query_var('tag_id');
                $taxonomy = 'post_tag';
                $args ='include=' . $term_id;
                $terms = get_terms( $taxonomy, $args );
                  
                // Display the tag name
                echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';
              
            } elseif ( is_day() ) {
                  
                // Day archive
                  
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','monolit').'</a></li>';
                
                  
                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','monolit').'</a></li>';
                
                  
                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') .  esc_html__(' Archives','monolit').'</strong></li>';
                  
            } else if ( is_month() ) {
                  
                // Month Archive
                  
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','monolit').'</a></li>';
                
                  
                // Month display
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','monolit').'</strong></li>';
                  
            } else if ( is_year() ) {
                  
                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','monolit').'</strong></li>';
                  
            } else if ( is_author() ) {
                  
                // Auhor archive
                  
                // Get the author information
                global $author;
                $userdata = get_userdata( $author );
                  
                // Display author name
                echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' .  esc_html__(' Author: ','monolit') . $userdata->display_name . '</strong></li>';
              
            } else if ( get_query_var('paged') ) {
                  
                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><a href="#" class="bread-current bread-current-' . get_query_var('paged') . '" title="'.esc_html__('Page','monolit') . get_query_var('paged') . '">'.esc_html__('Page','monolit') . ' ' . get_query_var('paged') . '</a></li>';
                  
            } else if ( is_search() ) {
              
                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="'.esc_html__('Search results for: ','monolit') . get_search_query() . '">'.esc_html__('Search results for: ','monolit') . get_search_query() . '</strong></li>';
              
            } elseif ( is_404() ) {
                  
                // 404 page
                echo '<li>' . esc_html__('Error 404','monolit') . '</li>';
            }
          
            echo '</ul>';
              
        }
          
    }
}


/**
 * Left page fixed title
 *
 *
 */
if (!function_exists('monolit_dynamic_title')) {
    function monolit_dynamic_title() {
        
        // Get the query & post information
        global $post, $wp_query;
        
        if (!is_home()) {
            if (is_archive() && !is_tax()) {
                if (is_post_type_archive('portfolio')) {
                    esc_html_e('Our Portfolio', 'monolit');
                } 
                else {
                    if( monolit_is_woocommerce_activated() ){
                        if(is_shop()) echo get_the_title( wc_get_page_id( 'shop' ) );
                    }else{
                        echo get_the_archive_title();
                    }
                    
                }
            } 
            else if (is_archive() && is_tax()) {
                
                // If post is a custom post type
                $post_type = get_post_type();
                
                // If it is a custom post type display name and link
                if ($post_type && $post_type == 'portfolio') {
                    $term = $wp_query->get_queried_object();
                    echo esc_attr($term->name);
                } 
                elseif ($post_type && $post_type != 'post') {
                    
                    $post_type_object = get_post_type_object($post_type);
                    
                    echo esc_attr($post_type_object->labels->name);
                }
            } 
            else if (is_single()) {
                echo get_the_title();
            } 
            else if (is_category()) {
            } 
            else if (is_page()) {
                echo get_the_title();
            } 
            else if (is_search()) {
                echo esc_html__('Search Blog', 'monolit');
            } 
            elseif (is_404()) {
                echo esc_html__('Page not found', 'monolit');
            }
        } 
        else {
            echo monolit_get_option('blog_home_text');
        }
    }
}

/**
 * Theme pagination
 *
 *
 */
if (!function_exists('monolit_pagination')) {
    function monolit_pagination($prev = 'Prev', $next = 'Next', $pages = '', $sec_wrap = false) {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        $pagination = array('base' => str_replace(999999999, '%#%', get_pagenum_link(999999999)), 'format' => '', 'current' => max(1, get_query_var('paged')), 'total' => $pages, 'prev_text' => $prev, 'next_text' => $next, 'type' => 'plain', 'end_size' => 3, 'mid_size' => 3);
        $return = paginate_links($pagination);
        $return = str_replace(array('page-numbers', 'next', 'prev', 'current'), array('blog-page transition', 'nextposts-link', 'prevposts-link', 'current-page'), $return);
        if (!empty($return)) {
            if ($sec_wrap) echo '<section class="custom_folio_pagi">';
            echo '<div class="clearfix"></div><div class="pagination-blog">' . $return . '</div>';
            if ($sec_wrap) echo '</section>';
        }
    }
}

/**
 * Theme portfolio pagination
 *
 *
 */
if (!function_exists('monolit_portfolio_pagination')) {
    function monolit_portfolio_pagination($prev = 'Prev', $next = 'Next', $pages = '', $sec_wrap = false) {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        $pagination = array('base' => str_replace(999999999, '%#%', get_pagenum_link(999999999)), 'format' => '', 'current' => max(1, get_query_var('paged')), 'total' => $pages, 'prev_text' => $prev, 'next_text' => $next, 'type' => 'plain', 'end_size' => 3, 'mid_size' => 3);
        $return = paginate_links($pagination);
        $return = str_replace(array('page-numbers', 'next', 'prev', 'current'), array('blog-page transition', 'nextposts-link', 'prevposts-link', 'current-page'), $return);
        if (!empty($return)) {
            if ($sec_wrap) echo '<section class="custom_folio_pagi">';
            echo '<div class="content no-bg-con portfolio-pagination"><div class="container"><div class="pagination-blog">' . $return . '</div></div></div>';
            if ($sec_wrap) echo '</section>';
        }
    }
}

/**
 * Theme content-nav pagination
 *
 *
 */
if (!function_exists('monolit_content_nav')) {
    function monolit_content_nav($prev = 'Prev', $next = 'Next', $pages = '', $sec_wrap = false) {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        $pagination = array('base' => str_replace(999999999, '%#%', get_pagenum_link(999999999)), 'format' => '', 'current' => max(1, get_query_var('paged')), 'total' => $pages, 'prev_next'=> true, 'prev_text' => $prev, 'next_text' => $next, 'type' => 'plain', 'end_size' => 3, 'mid_size' => 3);

        $return = paginate_links($pagination);
        $return = str_replace(array('page-numbers', 'next', 'prev', 'current'), array('blog-page transition', 'nextposts-link', 'prevposts-link', 'current-page'), $return);
        if (!empty($return)) {
            if ($sec_wrap) echo '<section class="custom_folio_pagi">';
            echo '<div class="content-nav pagination-blog portfolio-parallax-pagination">' . $return . '</div>';
            if ($sec_wrap) echo '</section>';
        }
        
    }
}

/**
 * Pagination for Portfolio page templates
 *
 *
 */
if (!function_exists('monolit_custom_pagination')) {
    function monolit_custom_pagination($pages = '', $range = 2, $current_query = '', $sec_wrap = false) {
        
        $showitems = ($range * 2) + 1;
        
        if ($current_query == '') {
            global $paged;
            if (empty($paged)) $paged = 1;
        } 
        else {
            $paged = $current_query->query_vars['paged'];
        }
        
        if ($pages == '') {
            if ($current_query == '') {
                global $wp_query;
                $pages = $wp_query->max_num_pages;
                if (!$pages) {
                    $pages = 1;
                }
            } 
            else {
                $pages = $current_query->max_num_pages;
            }
        }
        
        if (1 != $pages) {
            //echo '<div class="clearfix"></div>';
            if ($sec_wrap) echo '<section class="no-padding">';
            
            echo '<div class="content no-bg-con portfolio-pagination"><div class="container"><div class="pagination-blog">';
            
            if ($paged > 1) echo '<a href="' . get_pagenum_link($paged - 1) . '" class="prevposts-link transition"></a>';
            
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    if($paged == $i){
                        echo "<span class='current-page'>" . $i . "</span>";
                    }else{
                        echo "<a href='" . get_pagenum_link($i) . "' class='blog-page transition' >" . $i . "</a>";
                    }
                    
                }
            }
            
            if ($paged < $pages) echo '<a href="' . get_pagenum_link($paged + 1) . '" class="nextposts-link transition"></a>';
            
            echo "</div></div></div>\n";
            
            if ($sec_wrap) echo "</section>\n";
        }
    }
}

/**
 * Blog post nav
 *
 *
 */
if (!function_exists('monolit_post_nav')) {
    function monolit_post_nav() {
        global $post;

        if( false == monolit_get_option('blog_single_navigation') )
            return ;

        $in_same_term = monolit_get_option('blog_single_nav_same_term', false);
        
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post($in_same_term, '', true);
        $next = get_adjacent_post($in_same_term, '', false);
        if (!$next && !$previous) return;
?>
        <div class="blog-post-nav">
            <ul class="creat-list">
                <?php
                $prev_post = get_adjacent_post( $in_same_term, '', true);
                if ( is_a( $prev_post, 'WP_Post' ) ) :
                ?>
                    <li class="previous"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="lef-ar-nav" title="<?php echo esc_attr(get_the_title($prev_post->ID )); ?>"><?php echo esc_html_x('Previous post','Previous post link','monolit') ;?></a></li>
                <?php endif ?>
                <?php
                $next_post = get_adjacent_post( $in_same_term, '', false);
                if ( is_a( $next_post, 'WP_Post' ) ) :
                ?>
                    <li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="rig-ar-nav" title="<?php echo esc_attr(get_the_title($next_post->ID )); ?>"><?php echo esc_html_x('Next post','Next post link','monolit');?></a></li>
                <?php endif ?>

                
            </ul>
        <?php
        if ( monolit_get_option('blog_list_link') != '' ): ?>
            <div class="p-all">
                <a href="<?php echo esc_url( monolit_get_option('blog_list_link') ); ?>" ><i class="fa fa-th"></i></a>
            </div>
            <?php
        endif; ?>
        </div>
    <?php
    }
}

/**
 * Member post nav
 *
 *
 */
if (!function_exists('monolit_member_nav')) {
    function monolit_member_nav() {
        global $post;
        
        
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);
        if (!$next && !$previous) return;
?>
    <div class="content-nav member-content-nav">

        <ul>
            <?php
            $prev_post = get_adjacent_post( false, '', true);
            if ( is_a( $prev_post, 'WP_Post' ) ) :
            ?>
                <li class="previous"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="lef-ar-nav" title="<?php echo esc_attr(get_the_title($prev_post->ID )); ?>"><?php echo esc_html_x('Previous member','Member previous link','monolit') ;?></a></li>
            <?php endif ?>
            <?php
            $next_post = get_adjacent_post( false, '', false);
            if ( is_a( $next_post, 'WP_Post' ) ) :
            ?>
                <li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="rig-ar-nav" title="<?php echo esc_attr(get_the_title($next_post->ID )); ?>"><?php echo esc_html_x('Next member','Member next link','monolit');?></a></li>
            <?php endif ?>

        </ul>
        <?php
        if ( monolit_get_option('member_list_link') != ''): ?>
            <div class="p-all">
                <a href="<?php echo esc_url( monolit_get_option('member_list_link') ); ?>" ><i class="fa fa-th"></i></a>
            </div>
            <?php
        endif; ?>
    </div>
    <?php
    }
}




/**
 * Reorder comment field output
 *
 *
 */
function monolit_remove_comment_field($string) {
    
    return '';
}
add_filter( 'comment_form_field_comment', 'monolit_remove_comment_field' );

/**
 * Then add comment field after
 *
 *
 */
function monolit_add_comment_field_after() {
    //$commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    echo '<div class="clearfix"></div><div class="comment-form-comment control-group"><div class="controls"><textarea  placeholder="'.esc_html__('Your comment here...','monolit').'"  id="comment" cols="50" rows="8" name="comment"  '.$aria_req.'></textarea></div></div><div class="clearfix"></div>';
    
}
add_filter( 'comment_form_after_fields', 'monolit_add_comment_field_after' );
add_filter( 'comment_form_logged_in_after', 'monolit_add_comment_field_after' );

/**
 * Modify tag cloud format
 *
 *
 */
function monolit_custom_tag_cloud_widget($args) {
    $args['format'] = 'list';
     //ul with a class of wp-tag-cloud
    return $args;
}
add_filter('widget_tag_cloud_args', 'monolit_custom_tag_cloud_widget');
// add_filter( 'woocommerce_product_tag_cloud_widget_args','monolit_custom_tag_cloud_widget');

/**
 * Modify password form
 *
 * @since Monolit 2.3
 */
function monolit_password_form() {
    global $post;

    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '';
    if($post->post_type == 'portfolio'){
        $o .=    '<div class="content full-height protected_wrap">';
        $o .=       '<div class="hero-wrap">';
            $o .=       '<div class="bg"  data-bg="'.esc_url( monolit_global_var('bgpasspost', 'url', true) ).'"></div>';
            $o .=       '<div class="overlay"></div>';
            $o .=       '<div class="hero-wrap-item nFound-page-wrap">';

                if( monolit_get_option('passpost_title') ){
                    $o .= '<h2>'.get_the_title($post->ID).'</h2>';
                }
                $o .= wp_kses_post( monolit_get_option('passpost_intro') );
    }
                $o .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="postpass_form">';
                    $o .= '<p><strong>'.esc_html_x( "To view this post, enter the password below.",'postpass form', 'monolit' ) . '</strong></p>';
                    //$o .= '<label for="' . $label . '">' . esc_html__( "Password:" ) . ' </label>';
                    $o .= '<div class="passpost-input-wrapp"><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="passpost-input" placeholder="'.esc_html_x('Password','postpass form','monolit').'"></div>';
                    $o .= '<div class="clearfix"></div><div class="passpost-submit-wrapp"><button type="submit" class="btn trans-btn wt-btn transition passpost-submit" >' . esc_html__('Authenticate', 'monolit'). '</button></div>';
                $o .= '</form>';
    if($post->post_type == 'portfolio'){
            $o .=       '</div>';

            $o .= '</div>';//hero-wrap
        $o .= '</div>';
    }
        return $o;

}
add_filter( 'the_password_form', 'monolit_password_form' );

function monolit_protected_post_prepend(){
    return esc_html_x('%s', 'protected prepend','monolit');
}

add_filter('protected_title_format','monolit_protected_post_prepend' );

/**
 * Return attachment image link by using wp_get_attachment_image_src function
 *
 * @since Monolit 2.4
 */
function monolit_get_attachment_thumb_link( $id, $size = 'thumbnail', $icon = false ){
    $image_attributes = wp_get_attachment_image_src( $id, $size, $icon );
    if ( $image_attributes ) {
        return $image_attributes[0];
    }
    return '';
}

/**
 * Return strong title with -s-string-s- format
 *
 *
 */
if(!function_exists('monolit_content_filter')){
    function monolit_content_filter($content) {
        if(is_admin()){
            return $content;
        }
      
        return preg_replace('/-s-(.*)-s-/', '<strong>$1</strong>', $content);
    }
}
add_filter( 'the_content', 'monolit_content_filter' );

/**
 * Return strong title with -s-string-s- format
 *
 *
 */
if(!function_exists('monolit_title_filter')){
    function monolit_title_filter($title, $id = null) {
        if(is_admin()){
            return $title;
        }
        return preg_replace('/-s-(.*)-s-/', '<strong>$1</strong>', $title);
    }
}

add_filter( 'the_title', 'monolit_title_filter', 10, 2 );

/** 
 * Filter the parts of the document title. To replace -s-string-s- with string
 * 
 * @since 2.0.7 
 * 
 * @param array $title { 
 *     The document title parts. 
 * 
 *     @type string $title   Title of the viewed page. 
 *     @type string $page    Optional. Page number if paginated. 
 *     @type string $tagline Optional. Site description when on home page. 
 *     @type string $site    Optional. Site title when not on home page. 
 * } 
 */ 
if(!function_exists('monolit_document_title_parts')){
    function monolit_document_title_parts($title) {
        
        // $title['title'] = preg_replace('/-s-([^-]*)-s-/', '$1', $title['title']);
        $title['title'] = preg_replace('/-s-(.*)-s-/', '$1', $title['title']);

        return $title;
    }
}
add_filter( 'document_title_parts', 'monolit_document_title_parts' );

function monolit_disable_template_image_lazy_loading( $default, $tag_name, $context ) {
    return false;
    // if ( 'img' === $tag_name && 'wp_get_attachment_image' === $context ) {
      if ( 'img' === $tag_name  ) {
        // return 'eager';
        return false;
    }
    return $default;
}
// add_filter(
//     'wp_lazy_loading_enabled',
//     'monolit_disable_template_image_lazy_loading',
//     10,
//     3
// ); 

//Remove JQuery migrate
 
function monolit_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) { 
            // Check whether the script has any dependencies

            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
// add_action( 'wp_default_scripts', 'monolit_remove_jquery_migrate' );
/** 
 * Filter the body_class for global configuration
 * 
 * @since 2.0.7
 */ 
// Apply filter
add_filter('body_class', 'monolit_body_classes');
if(!function_exists('monolit_body_classes')){
    function monolit_body_classes($classes) {

        if(post_password_required()) $classes[] = 'is-protected-page';

        // Add class of group-blog to blogs with more than 1 published author.
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }

        // Add class of hfeed to non-singular pages.
        if ( is_singular() ) {
            $classes[] = 'monolit-singular';
            if( false == get_post_meta( get_the_ID(), '_cth_show_header', true ) ) $classes[] = 'monolit-no-head-sec';
        }else{
            $classes[] = 'hfeed';
            if( false == monolit_get_option('show_blog_header') ) $classes[] = 'monolit-no-head-sec';
        }

        // Add class if we're viewing the Customizer for easier styling of theme options.
        if ( is_customize_preview() ) {
            $classes[] = 'monolit-customizer';
        }

        // Add class on front page.
        if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
            $classes[] = 'monolit-front-page';
        }

        if( isset($_GET['dark_theme']) && $_GET['dark_theme'] == true ) $classes[] = 'monolit-dark';


        if( false == monolit_get_option('show_left_bar') ){
            $classes[] = 'hide-left-bar';
        }

        if( monolit_get_option('shop_columns') ){
            $classes[] = 'shop-list-'.monolit_get_option('shop_columns').'-cols';
        }
        if( monolit_get_option('shop_columns_tablet') ){
            $classes[] = 'shop-list-tablet-'.monolit_get_option('shop_columns_tablet').'-cols';
        }

        return $classes;

    }
}

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/includes/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/includes/template-functions.php' );

/**
 * Custom meta box for page, post, portfolio...
 *
 *
 */
// require_once get_template_directory() . '/cmb2/functions.php';

/**
 * Visual Composer plugin integration
 *
 *
 */
// require_once get_template_directory() . '/inc/cth_for_vc.php';

/**
 * Theme custom style
 *
 *
 */

require_once get_parent_theme_file_path( '/includes/overridestyle.php' );

/**
 * Taxonomy meta box
 *
 *
 */
// require_once get_template_directory() . '/inc/cth_taxonomy_fields.php';
// require_once get_template_directory() . '/inc/category_metabox_fields.php';
// require_once get_template_directory() . '/inc/tag_metabox_fields.php';
// require_once get_template_directory() . '/inc/portfolio_cat_metabox_fields.php';

// require_once get_template_directory() . '/inc/product_tag_metabox_fields.php';

/**
 * Custom elements for VC
 *
 *
 */
// require_once get_template_directory() . '/vc_extend/vc_shortcodes.php';


if ( monolit_is_woocommerce_activated() ) {
    require_once get_parent_theme_file_path( '/includes/woo-init.php' );
}


// require_once get_template_directory() . '/inc/init.php';
// require_once get_template_directory() . '/inc/ajax.php';

/**
 * Implement the One Click to import demo data
 *
 */

require_once get_parent_theme_file_path( '/includes/one-click-import-data.php' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_parent_theme_file_path( '/lib/class-tgm-plugin-activation.php' );

add_action('tgmpa_register', 'monolit_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function monolit_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array('name' => esc_html__('WPBakery Page Builder','monolit'),
             // The plugin name.
            'slug' => 'js_composer',
             // The plugin slug (typically the folder name).
            'source' => 'http://assets.cththemes.com/plugins/js_composer.zip',
             // The plugin source.
            'required' => true,
            'external_url' => esc_url(monolit_relative_protocol_url().'://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431' ),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => '',
            'class_to_check'            => 'Vc_Manager'
        ), 

        array('name' => esc_html__('Redux Framework','monolit'),
             // The plugin name.
            'slug' => 'redux-framework',
             // The plugin source.
            'required' => true,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/plugins/redux-framework/' ),
             // If set, overrides default API URL and points to an external URL.
            'function_to_check'         => '',
            'class_to_check'            => 'ReduxFramework'
        ), 

        array(
            'name' => esc_html__('Contact Form 7','monolit'),
             // The plugin name.
            'slug' => 'contact-form-7',
             // The plugin slug (typically the folder name).
            'required' => true,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/plugins/contact-form-7/' ),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => 'wpcf7',
            'class_to_check'            => 'WPCF7'
        ), 


        array(
            'name' => esc_html__('CMB2','monolit'),
             // The plugin name.
            'slug' => 'cmb2',
             // The plugin slug (typically the folder name).
            'required' => true,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/support/plugin/cmb2'),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => 'cmb2_bootstrap',
            'class_to_check'            => 'CMB2_Base'
        ),
        

        array(
            'name' => esc_html__('Monolit Add-ons','monolit' ),
             // The plugin name.
            'slug' => 'monolit-add-ons',
             // The plugin slug (typically the folder name).
            'source' => 'monolit-add-ons.zip',
             // The plugin source.
            'required' => true,
             // If false, the plugin is only 'recommended' instead of required.

            'force_deactivation'        => true,

            'function_to_check'         => '',
            'class_to_check'            => 'Monolit_Addons'
        ), 

        array(
            'name' => esc_html__('Loco Translate','monolit'),
             // The plugin name.
            'slug' => 'loco-translate',
             // The plugin slug (typically the folder name).
            'required' => false,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/plugins/loco-translate/'),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => 'loco_autoload',
            'class_to_check'            => 'Loco_Locale'
        ),

        
        array(
            'name' => esc_html__('Envato Market','monolit' ),
             // The plugin name.
            'slug' => 'envato-market',
             // The plugin slug (typically the folder name).
            'source' => esc_url(monolit_relative_protocol_url().'://envato.github.io/wp-envato-market/dist/envato-market.zip' ),
             // The plugin source.
            'required' => true,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url('//envato.github.io/wp-envato-market/' ),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => 'envato_market',
            'class_to_check'            => 'Envato_Market'
        ),

        array('name' => esc_html__('One Click Demo Import','monolit'),
             // The plugin name.
            'slug' => 'one-click-demo-import',
             // The plugin slug (typically the folder name).
            'required' => false,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/plugins/one-click-demo-import/'),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => '',
            'class_to_check'            => 'OCDI_Plugin'
        ),

        array('name' => esc_html__('Regenerate Thumbnails','monolit'),
             // The plugin name.
            'slug' => 'regenerate-thumbnails',
             // The plugin slug (typically the folder name).
            'required' => false,
             // If false, the plugin is only 'recommended' instead of required.
            'external_url' => esc_url(monolit_relative_protocol_url().'://wordpress.org/plugins/regenerate-thumbnails/' ),
             // If set, overrides default API URL and points to an external URL.

            'function_to_check'         => 'RegenerateThumbnails',
            'class_to_check'            => 'RegenerateThumbnails'
        ),

        


    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'monolit',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/lib/plugins/',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        
    );

    tgmpa( $plugins, $config );
}



