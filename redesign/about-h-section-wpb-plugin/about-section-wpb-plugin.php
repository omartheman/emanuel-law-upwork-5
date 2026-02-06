<?php 
/**
 * Plugin Name: About Page Section WPBakery
 * Plugin URI: 
 * Description: A WPBakery module for an "About" section
 * Version: 1.1
 * Author: Omar Shishani
 * Author URI: https://omarshishani.com
 */

if ( ! function_exists( 'wpb_dev_example_custom_shortcode_output' ) ) :
function wpb_dev_example_custom_shortcode_output( $atts, $content = null ) {

    $atts = shortcode_atts( array(
        'title'    => 'About',
        'name'     => 'Emanuel Orlando',
        'el_class' => '',
        'css'      => '',
    ), $atts );

    $title    = $atts['title'];
    $el_class = $atts['el_class'];
    $name    = $atts['name'];

    // WPBakery Design Options CSS
    $css_class = vc_shortcode_custom_css_class( $atts['css'], ' ' );

    ob_start(); ?>

    <div class="custom-module<?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $el_class ); ?>">
        <h3 class="profile-title"><?php echo esc_html( $title ); ?></h3>
    </div>

    <div class="profile-container<?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $el_class ); ?>">
        <div class="portrait-container">
            <img loading="lazy" decoding="async" 
                src="<?php echo esc_url( 'https://icolaw.net/wp-content/uploads/2026/01/Group-1.png' ); ?>" 
                alt="Profile photo of Emanuel Orlando." 
                width="320" height="400">
        </div>
        <div class="profile-textarea">
            <div class="profile-name"><?php echo esc_html( $name ); ?></div>
            <?php echo wpautop( wp_kses_post( $content ) ); ?>
        </div>
    </div>

    <section class="about-h">

    <div class="about-h-inner">
        <div class="three-column-section about-h">
        <div class="column">
            <span class="line-ico"></span>
            <h2 class="about-h-heading">Meet Our Chief Attorney</h2>
        </div>
        
        <div class="column">
            <p class="about-h-content">Emanuel Orlando is a corporate transactional attorney with over 15 years of experience at national and boutique firms. His practice focuses on regulatory compliance, corporate structuring, fund formation, and intellectual property for investment and technology clients. He holds a J.D. from Loyola Law School and a B.A. in Philosophy from Princeton University.</p>
        </div>
        
        <div class="column">
            <a class="about-h-link" href="">Read more about our firm →</a>
        </div>
        </div> <!-- .about-h-inner end -->

        <div class="attorney-profile">
        <div class="attorney-profile-inner">
            <img src="https://wordpress-1583123-6179224.cloudwaysapps.com/wp-content/uploads/2026/02/image17-480x480.jpg.jpg" alt="Emanuel Orlando" class="profile-image">
            
            <div class="profile-info">
            <h2 class="profile-name">Emanuel Orlando</h2>
            <p class="profile-title">Managing Partner • Beverly Hills</p>
            </div>
        </div>
        </div> <!-- .attorney-profile end -->
    </div>
    
    </section> <!-- .about-h end -->

    <?php return ob_get_clean();
}
endif;

add_shortcode( 'wpb_dev_custom_module', 'wpb_dev_example_custom_shortcode_output' );


function wpb_dev_example_map_custom_module() {

    if ( function_exists( 'vc_map' ) ) :
        vc_map( array(
            'name' => __( '"About" Module', 'text-domain' ),
            'base' => 'wpb_dev_custom_module',
            'category' => __( 'My Elements', 'text-domain' ),
            'params' => array(

                array(
                    'type' => 'textfield',
                    'holder' => 'h3',
                    'heading' => __( 'Name', 'text-domain' ),
                    'param_name' => 'name',
                    'value' => __( 'Default Title', 'text-domain' ),
                    'description' => __( 'Enter the module title.', 'text-domain' ),
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h2',
                    'heading' => __( 'Title', 'text-domain' ),
                    'param_name' => 'title',
                    'value' => __( 'Default Title', 'text-domain' ),
                    'description' => __( 'Enter the module title.', 'text-domain' ),
                ),

                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Description', 'text-domain' ),
                    'param_name' => 'content',
                    'description' => __( 'Enter the module description. Line breaks will create paragraphs.', 'text-domain' ),
                ),

                // Extra class
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', 'text-domain' ),
                    'param_name' => 'el_class',
                    'description' => __( 'Add a class name for custom styling.', 'text-domain' ),
                ),

                // Design Options tab
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Design Options', 'text-domain' ),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'text-domain' ),
                ),
            ),
        ) );
    endif;
}

add_action( 'vc_before_init', 'wpb_dev_example_map_custom_module' );


function about_plugin_enqueue_styles() {
    wp_enqueue_style(
        'ico-about-section-styles',
        plugins_url( '/css/style.css', __FILE__ ),
        array(),
        '1.0.10',
        'all'
    );
}

add_action( 'wp_enqueue_scripts', 'about_plugin_enqueue_styles' );
