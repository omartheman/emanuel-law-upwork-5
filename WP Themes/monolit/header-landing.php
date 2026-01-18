<?php
/* banner-php */

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    
        <!-- Meta Data -->
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <!-- Favicon -->        
        <link rel="shortcut icon" href="<?php echo esc_url( monolit_global_var('favicon','url',true) );?>" type="image/x-icon"/>
        <?php } ?>
        
        <?php    
    
        wp_head(); ?>
        
    </head>
    <body <?php body_class( );?>>
        <?php if( monolit_global_var('show_loader') ):?>
        <!-- loader -->
        <div id="monolit-loader" class="loader">
            <div id="movingBallG">
                <div class="movingBallLineG"></div>
                <div id="movingBallG_1" class="movingBallG"></div>
            </div>
        </div>
        <!-- loader end -->
        <!--================= main start ================-->
        <div id="main-theme">
        <?php else :?>
        <!--================= main start ================-->
        <div id="main-theme" class="hide-loader">
        <?php endif;?>
        
            