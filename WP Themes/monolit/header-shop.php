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
        <?php 
        if(monolit_global_var('shop_fullwidth_nav_menu')){
        ?>
        <div class="hor-nav-layout hor-content no-dis"></div>
        <?php }else { ?>
        <div class="hor-nav-layout no-dis"></div>
        <?php } ?>
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
                            <?php if( monolit_global_var('logo_text')  !== '' ):?>
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

                    <?php if( monolit_global_var('show_shop_header') ) :

                        $shop_header_image = '';
                        if(is_single()){
                            $shop_header_image = get_post_meta( get_the_ID(), '_monolit_page_header_bg', true );
                        }elseif(is_product_category()){
                            $t_id = get_queried_object()->term_id;
                            $thumbnail_id = get_woocommerce_term_meta( $t_id , 'thumbnail_id', true ) ;
                            if($thumbnail_id){
                                $shop_header_image = wp_get_attachment_url( $thumbnail_id );
                            }

                        }elseif(is_product_tag()){
                            $t_id = get_queried_object()->term_id;
                            $term_meta = get_option( "monolit_taxonomy_product_tag_$t_id" );
                            if($term_meta !== false){
                                if( isset($term_meta['cat_header_image']['url']) ){
                                    $shop_header_image = $term_meta['cat_header_image']['url'];
                                }
                            }
                        }
                        if($shop_header_image == '' ){
                            $shop_header_image = monolit_global_var('shop_header_image','url', true);
                        }

                    ?>
                        
                        <div class="content">
                            <section class="parallax-section">
                                <div class="parallax-inner">
                                    <div class="bg" data-bg="<?php echo esc_url( $shop_header_image );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="container">
                                    <div class="page-title">
                                        <div class="row">
                                        <?php 
                                        $hcl = 'col-md-6';
                                        if( !monolit_global_var('shop_breadcrumbs')){
                                            $hcl = 'col-md-12';
                                        }
                                        ?>
                                            <div class="<?php echo esc_attr($hcl );?>">
                                                <h1><?php 
                                                if(is_shop()){
                                                     echo get_the_title( wc_get_page_id( 'shop' ) );
                                                }elseif(is_page()){
                                                    woocommerce_page_title(); 
                                                }elseif(is_single()){
                                                    single_post_title( ); 
                                                }elseif(is_product_category()||is_product_tag()||is_category()||is_tag()||is_author()||is_date() ){
                                                    the_archive_title();
                                                } ?>
                                                </h1>
                                            </div>
                                        <?php if( monolit_global_var('shop_breadcrumbs') ) :?>
                                            <div class="<?php echo esc_attr($hcl );?>">
                                                <?php woocommerce_breadcrumb();//monolit_breadcrumbs();?>
                                            </div>
                                        <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div> 
                    <?php else : ?>
                    <div class="shop-header-nobg">
                        <div class="container">
                            <div class="page-title">
                                <div class="row">
                                        <?php 
                                        $hcl = 'col-md-6';
                                        if( !monolit_global_var('shop_breadcrumbs')){
                                            $hcl = 'col-md-12';
                                        }
                                        ?>
                                            <div class="<?php echo esc_attr($hcl );?>">
                                                <h1><?php 
                                                if(is_shop()){
                                                     echo get_the_title( wc_get_page_id( 'shop' ) );
                                                }elseif(is_page()){
                                                    woocommerce_page_title(); 
                                                }elseif(is_single()){
                                                    single_post_title( ); 
                                                }elseif(is_product_category()||is_product_tag()||is_category()||is_tag()||is_author()||is_date() ){
                                                    the_archive_title();
                                                } ?>
                                                </h1>
                                            </div>
                                        <?php if( monolit_global_var('shop_breadcrumbs') ) :?>
                                            <div class="<?php echo esc_attr($hcl );?>">
                                                <?php woocommerce_breadcrumb();//monolit_breadcrumbs();?>
                                            </div>
                                        <?php endif;?>
                                        </div>
                            

                            </div>
                        </div>
                    </div>  
                    <?php endif;//end show blog header?>


                    <div class="content no-bg-con header-shop">
                        <section id="shop_sec1" class="no-padding-page">
                            <div class="container">
                                <div class="row">

                                <?php
                                if(is_active_sidebar('sidebar-shop') && monolit_global_var('shop_sidebar') != 'fullwidth'){
                                    $sb_w = monolit_global_var('shop-sidebar-width') ? monolit_global_var('shop-sidebar-width') : 3;
                                    ?>
                                    <?php if(monolit_global_var('shop_sidebar') == 'left_sidebar') : ?>
                                    <div class="col-md-<?php echo esc_attr($sb_w );?> shop-sidebar-column sidebar-left">
                                        <div class="sidebar">
                                            <?php dynamic_sidebar('sidebar-shop'); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-md-<?php echo (12 - $sb_w);?> hassidebar shop-posts-column">
                                <?php
                                }else{
                                ?>
                                    <div class="col-md-12 nosidebar shop-posts-column">
                                <?php
                                }
                                ?>


                    