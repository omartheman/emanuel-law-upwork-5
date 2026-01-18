<?php
/* banner-php */

?>

<?php if(have_posts()) : ?>

<!-- content  -->

<div class="content no-bg-con portfolio-vertical_fullscreen"> 

    <?php
    $grid_cls = 'gallery-items mob-pa folio-gallery';
    $grid_cls .= ' '.monolit_global_var('folio_column').'-columns';
    if( monolit_global_var('folio_show_info_first') == 'show'){
        $grid_cls .= ' vis-port-info';
    }elseif( monolit_global_var('folio_show_info_first') == 'hide'){
        $grid_cls .= ' hidden-port-info';
    }else{
        $grid_cls .= ' hov-port-info';
    }
    $grid_cls .= ' grid-'. monolit_global_var('folio_pad').'-pad mob-pa';
    if(  monolit_global_var('folio_disable_overlay') )
    $grid_cls .= ' disopa';
    ?>



    <div class="<?php echo esc_attr($grid_cls );?>">

        <div class="grid-sizer"></div>
        <div class="grid-sizer-second"></div>
        <div class="grid-sizer-three"></div>

    <?php while(have_posts()) : the_post(); ?>
                    
        <?php get_template_part( 'portfolio', 'vertical-list' ); ?>

    <?php endwhile;?>
        
    </div>
    <!-- end gallery items -->  
    <?php monolit_portfolio_pagination('','' , '', false );?>             
</div>
<!-- content end -->
<?php else :
    get_template_part('content','none' );
?>
<?php endif;?>