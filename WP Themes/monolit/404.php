<?php
/* banner-php */

if( monolit_global_var('fourorfour_fullwidth_nav_menu') )
    get_header('navfullwidth');
else
    get_header(); ?>
<div class="content full-height">
    <div class="hero-wrap">
        <div class="bg"  data-bg="<?php echo esc_url( monolit_global_var('bg404','url',true) ) ;?>"></div>
        <div class="overlay"></div>
        <div class="hero-wrap-item nFound-page-wrap">
            <span class="nFound-Page"><?php esc_html_e('404','monolit' );?></span>
            
            <?php if( monolit_global_var('404_intro') ){

                    echo wp_kses_post( monolit_global_var('404_intro') );

            } ?>
            <?php if( monolit_global_var('back_home_link') ) :?>
            <a href="<?php echo esc_url( monolit_global_var('back_home_link') );?>" class="hero-link"><?php echo wp_kses(__('Back to home page','monolit'), array('span'=>array(),'i'=>array('class'=>array())) );?></a>    
            <?php endif;?>
        </div>
    </div>
</div>
<?php 

if( monolit_global_var('fourorfour_footer_content') )
    get_footer( );
else
    get_footer('nocontent');
?>