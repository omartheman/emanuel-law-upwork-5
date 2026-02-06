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



    <style>

    .three-column-section {
        display: flex;
        gap: 20px;
    }
    
    .column {
        flex: 1 1 300px;
        padding: 20px;
    }

    @media(max-width: 991px){
        .three-column-section {
        display: flex;
        gap: 20px;
        flex-direction: column; 
        }
        
        .column {
        flex: initial;
        padding: 20px;
        }
    }

    .about-h {
        background-color: #47414F;
    }

    .about-h-content {
        display: flex; 
    }

    .about-h-heading{
        color: white; 
    }

    .about-h-inner {
        max-width: 1200px; 
        margin: auto; 
    }

    .about-h-link {
        font-family: 'Montserrat', sans-serif; 
        color: rgb(159, 150, 171); 
        text-transform: uppercase;
        text-decoration: none;
    }
    .about-h-content {
        color: #ccbd99;
    }

    .attorney-profile {
        max-width: 500px;
        margin: 0 auto;
        position: relative; 
        height: 400px; 
    }

    .attorney-profile-inner {
        top: 30px; 
        position: absolute; 
        box-shadow: 0 5px 20px 0px #3a3a4a;
    }
    
    .profile-image {
        width: 100%;
        height: auto;
        display: block;
        background-color: #000;
    }
    
    .profile-info {
        background-color: #fff;
        padding: 30px 20px;
        text-align: center;
    }
    
    .profile-name {
        font-family: 'Georgia', serif;
        font-size: 24px;
        font-weight: normal;
        margin: 0 0 10px 0;
        color: #333;
    }
    
    .profile-title {
        font-family: 'Arial', sans-serif;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #666;
        margin: 0;
    }

    .line-ico {
        display: inline-block;
        border-top: 1px solid #fff;
        width: 60px;
        margin-top: 34px;
    }
    </style>
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
        '1.0.9',
        'all'
    );
}

add_action( 'wp_enqueue_scripts', 'about_plugin_enqueue_styles' );
