<?php 
/**
 * Plugin Name: About Page Section
 * Plugin URI: 
 * Description: A WPBakery module for an "About" section
 * Version 1.0
 * Author: Omar Shishani
 * Author URI: https://omarshishani.com
 */

if ( ! function_exists( 'wpb_dev_example_custom_shortcode_output' ) ) :
function wpb_dev_example_custom_shortcode_output( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'title' => 'Default Title',
        'description' => 'Default description.',
    ), $atts ) );

    // Output the HTML for your module
    $output = '<div class="custom-module">CUSTOM MODULE';
    $output .= '<h3>' . esc_html($title) . '</h3>';
    $output .= '<p>' . esc_html($description) . '</p>';
    $output .= '</div>';

    return $output;
}
endif;
add_shortcode( 'wpb_dev_custom_module', 'wpb_dev_example_custom_shortcode_output' );