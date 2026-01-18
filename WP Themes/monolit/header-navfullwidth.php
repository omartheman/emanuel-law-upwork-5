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
        <div class="hor-nav-layout hor-content no-dis"></div>
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
            <!--=============== header ===============-->   
            <header class="monolit-header">
                <!-- header-inner  -->
                <div class="header-inner">
                    <!-- header logo -->
                    <div class="logo-holder"
                    <?php if(monolit_global_var('logo_size_width')) : ?>
                     style="width:<?php echo esc_attr( monolit_global_var('logo_size_width')  );?>px;" 
                    <?php endif; ?>>
                        <a href="<?php echo esc_url(home_url('/'));?>">
                            <?php if( monolit_global_var('logo_first','url',true) ):?>
                            <img src="<?php echo esc_url( monolit_global_var('logo_first','url',true) );?>"  width="<?php echo esc_attr( monolit_global_var('logo_size_width')  );?>" height="<?php echo esc_attr( monolit_global_var('logo_size_height')  );?>" class="monolit-logo" alt="<?php bloginfo('name');?>" />
                            <?php endif;?>
                            <?php if( monolit_global_var('logo_text') !== '' ):?>
                                <h2 class="logo_text"><?php echo esc_html( monolit_global_var('logo_text') );?></h2>
                            <?php endif;?>
                            <?php if( monolit_global_var('slogan') ):?>
                                <h3 class="slogan"><em><?php echo esc_html( monolit_global_var('slogan') );?></em></h3>
                            <?php endif;?>
                        </a>
                    </div>
                    <!-- header logo end -->
                    <!-- mobile nav button -->
                    <div class="nav-button-holder">
                        <div class="nav-button vis-m"><span></span><span></span><span></span></div>
                    </div>
                    <!-- mobile nav button end -->
                    <!-- navigation  -->
                    <div class="nav-holder">
                    <?php if(is_page_template('homepage-onepage.php' )):?>
                        <nav class="scroll-nav">
                            <?php 
                                $defaults1= array(
                                    'theme_location'  => 'onepage',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'monolit_onepage-nav',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'walker'          => new Walker_Nav_Menu(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                
                                if ( has_nav_menu( 'onepage' ) ) {
                                    wp_nav_menu( $defaults1 );
                                }
                            ?>
                        </nav>
                    <?php else :?>
                        <nav
                        <?php 
                        if( monolit_global_var('show_submenu_mobile') ){
                            echo ' class="show-sub-mobile"';
                        }?>
                        >
                            <?php 
                                $defaults1= array(
                                    'theme_location'  => 'primary',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'monolit_main-nav',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'walker'          => new Walker_Nav_Menu(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( $defaults1 );
                                }
                            ?>
                        </nav>
                    <?php endif;?>
                    </div>
                    <!-- navigation  end -->
                </div>
                <!-- header-inner  end -->
                <!-- share button  -->
                <?php if( monolit_global_var('share_names') != '' ||is_active_sidebar('social_share_widget' )): ?>
                    <div class="show-share isShare"><?php echo wp_kses( __('<span>Share</span><i class="fa fa-chain-broken"></i> ','monolit'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></div>
                <?php endif;?>
                <!-- share  end-->
            </header>
            <!--=============== header end ===============-->  

            <!--=============== wrapper ===============-->  
            <div id="wrapper">
                <!-- content-holder  -->
                <div class="content-holder content-holder-main">
                    <div class="dynamic-title"><h1><?php monolit_dynamic_title(); ?></h1></div>

                    <?php 
                        $dynamic_menu = get_post_meta( get_queried_object_id(), "_monolit_dynamic_menu", true);
                        if(!empty($dynamic_menu)&&$dynamic_menu != 'none'){
                            $defaults1= array(
                                'theme_location'  => $dynamic_menu,
                                'menu'            => '',
                                'container'       => 'div',
                                'container_class' => 'scroll-page-nav',
                                'container_id'    => '',
                                'menu_class'      => 'one-page-scroll-nav',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'walker'          => new Walker_Nav_Menu(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            );
                            
                            if ( has_nav_menu( $dynamic_menu) ) {
                                wp_nav_menu( $defaults1 );
                            }
                        }
                    ?>
                    