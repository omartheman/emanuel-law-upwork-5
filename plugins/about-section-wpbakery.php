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


function wpb_dev_example_map_custom_module() {

// Map the shortcode to WPBakery
if ( function_exists( 'vc_map' ) ) :
  vc_map( array(
      'name' => __( 'My Custom Module', 'text-domain' ), // The name of your element
      'base' => 'wpb_dev_custom_module', // The base name for your shortcode (must match add_shortcode tag)
      'category' => __( 'My Elements', 'text-domain' ), // The category in the "Add Element" window
      'params' => array( // The editable parameters
          array(
              'type' => 'textfield', // Type of input field (textfield, textarea, dropdown, colorpicker, etc.)
              'holder' => 'h3', // HTML element to wrap the value in the editor (optional)
              'class' => '',
              'heading' => __( 'Title', 'text-domain' ),
              'param_name' => 'title', // Shortcode attribute name
              'value' => __( 'Default Title', 'text-domain' ),
              'description' => __( 'Enter the module title.', 'text-domain' ),
          ),
          array(
              'type' => 'textarea',
              'holder' => 'p',
              'class' => '',
              'heading' => __( 'Description', 'text-domain' ),
              'param_name' => 'description',
              'value' => __( 'Default description.', 'text-domain' ),
              'description' => __( 'Enter the module description.', 'text-domain' ),
          ),
      ),
  ) );
endif;

}

add_action( 'vc_before_init', 'wpb_dev_example_map_custom_module' );