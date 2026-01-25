<?php 
/**
 * Plugin Name: About Page Section
 * Plugin URI: 
 * Description: A WPBakery module for an "About" section
 * Version: 1.0
 * Author: Omar Shishani
 * Author URI: https://omarshishani.com
 */

if ( ! function_exists( 'wpb_dev_example_custom_shortcode_output' ) ) :
function wpb_dev_example_custom_shortcode_output( $atts, $content = null ) {

    $atts = shortcode_atts( array(
        'title' => 'About',
    ), $atts );

    $title = $atts['title'];

    $output = '
    <div class="custom-module">
        <h3>' . esc_html( $title ) . '</h3>
    </div>

    <div class="profile-container">
        <div class="portrait-container">
            <img loading="lazy" decoding="async" src="' . esc_url( "https://icolaw.net/wp-content/uploads/2026/01/Group-1.png" ) . '" alt="Profile photo of Emanuel Orlando." width="320" height="400">
        </div>
        <div>
            <p><span>Owner</span><span> - Chief Legal Official</span></p>
            <p>
                <span>LinkedIn Profile:</span>
                <span>
                    <a href="https://www.linkedin.com/in/emanuelorlando/">https://www.linkedin.com/in/emanuelorlando/</a>
                </span>
            </p>

            ' . wpautop( wp_kses_post( $content ) ) . '

            <p>Emanuel Orlando is an experienced corporate finance lawyer. With over 15 years of practice with national law firms, he has extensive experience in transactional law.</p>
            <p>Emanuel received his Juris Doctor from Loyola Law School of Los Angeles and his Bachelor’s Degree from Princeton University.</p>
        </div>
    </div>
    ';

    return $output;
}
endif;

add_shortcode( 'wpb_dev_custom_module', 'wpb_dev_example_custom_shortcode_output' );


function wpb_dev_example_map_custom_module() {

    if ( function_exists( 'vc_map' ) ) :
        vc_map( array(
            'name' => __( 'My Custom Module', 'text-domain' ),
            'base' => 'wpb_dev_custom_module',
            'category' => __( 'My Elements', 'text-domain' ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'holder' => 'h3',
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
        '1.0.0',
        'all'
    );
}

add_action( 'wp_enqueue_scripts', 'about_plugin_enqueue_styles' );
