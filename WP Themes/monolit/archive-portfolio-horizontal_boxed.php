<?php
/* banner-php */


$is_hoz_header_footer = false;
if( monolit_global_var('show_folio_header') || monolit_global_var('show_folio_footer_content') ) $is_hoz_header_footer = true;

?>
<?php if( monolit_global_var('show_folio_header') ) :?>
    <?php if( monolit_global_var('folio_header_video') != '' ): ?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section header-video">
            <!-- Hero video   -->
            <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
                <div class="video-mask"></div>
                <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
                <div class="mob-bg bg" data-bg="<?php echo esc_url( monolit_global_var('folio_header_image','url', true) );?>"></div>
                <div  class="background-youtube" data-vid="<?php echo esc_attr( monolit_global_var('folio_header_video') );?>" data-mv="1"> </div>
            </div>
            <!-- Hero video   end -->
            <div class="overlay"></div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_folio_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('folio_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('folio_home_text_intro') );?>
                        </div>
                    <?php if( monolit_global_var('show_folio_breadcrumbs') ) :?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->

    <?php else :?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section">
            <div class="parallax-inner">
                <div class="bg" data-bg="<?php echo esc_url( monolit_global_var('folio_header_image','url', true) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_folio_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('folio_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('folio_home_text_intro') );?>
                        </div>
                    <?php if( monolit_global_var('show_folio_breadcrumbs') ) :?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->
    <?php endif;//end header view?>     
<?php endif;//end show portfolio header?>

<div class="content hor-content full-height pad-con no-bg-con portfolio-horizontal_boxed">
    <div class="container-fluid full-height  hoz-boxed-container-wrapp">
        <div class="row full-height hoz-boxed-row-wrapp">
            <div class="col-sm-4 no-padding full-height hoz-boxed-desc-wrapp">
                <div class="hoz-boxed-desc">
                    <?php echo wp_kses_post( monolit_global_var('folio_home_text_intro') );?>
                </div>
            </div><!-- /col-md-4 -->
            <div class="col-sm-8 no-padding full-height hoz-boxed-gal">

            <?php if(have_posts()) : ?>
                <?php 

                if( monolit_global_var('folio_show_filter') ) : 

                    $term_args = array(
                        'orderby'           => monolit_global_var('folio_filter_orderby') , //id, count, name, slug, none
                        'order'             => monolit_global_var('folio_filter_order') ,
                        //'include'           => ($port_cats) ? $port_cats : '',
                    ); 

                    $portfolio_cats = get_terms('portfolio_cat',$term_args); 

                ?>
                    <?php if(count($portfolio_cats)): ?>
                        <!-- filter  -->
                        <div class="filter-holder round-filter">
                            <div class="gallery-filters hid-filter">
                                <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*"><?php esc_html_e('All','monolit' );?></a>
                                <?php foreach($portfolio_cats as $portfolio_cat) { ?>
                                <a href="#" class="gallery-filter transition2" data-filter=".portfolio_cat-<?php echo esc_attr($portfolio_cat->slug ); ?>"><?php echo esc_html($portfolio_cat->name ); ?></a>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="filter-button"><?php esc_html_e('Filter','monolit' );?></div>
                            <?php if( monolit_global_var('folio_show_counter') ) :?>
                            <div class="count-folio round-counter">
                                <div class="num-album"></div>
                                <div class="all-album"></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <!-- filter end --> 
                    <?php endif; 
                endif; //end showfillter
                ?>

                <?php 
                $grid_cls = 'folio-gallery';
                $grid_cls .= ' '.monolit_global_var('folio_column').'-ver-columns';
                if( monolit_global_var('folio_show_info_first') == 'show'){
                    $grid_cls .= ' vis-port-info';
                }elseif( monolit_global_var('folio_show_info_first') == 'hide'){
                    $grid_cls .= ' hidden-port-info';
                }else{
                    $grid_cls .= ' hov-port-info';
                }
                if( monolit_global_var('folio_disable_overlay') )
                    $grid_cls .= ' disopa';
                if($is_hoz_header_footer)
                    $grid_cls .= ' hoz_has_headfoot';
                ?>
                          
                <!--=============== portfolio holder ===============-->
                <div class="resize-carousel-holder hpw">
                    <div class="p_horizontal_wrap<?php if($is_hoz_header_footer) echo ' hoz_has_headfoot_wrap';?>">
                        <div id="portfolio_horizontal_container" class="<?php echo esc_attr($grid_cls );?>">
                            <?php while(have_posts()) : the_post(); ?>
                        
                                <?php monolit_get_template_part( 'portfolio',  'horizontal-list', array( 'columns'=> monolit_global_var('folio_column') ) ); ?>

                            <?php endwhile;?>
                                                                                                          
                        </div>
                        <!--portfolio_horizontal_container  end-->        
                    </div>
                    <!--p_horizontal_wrap  end-->                    
                </div>
                <?php monolit_portfolio_pagination('','' , '', false );?>
                <?php else :
                    get_template_part('content','none' );
                ?>
            <?php endif; // end have_post() ?>

                
            </div><!-- /col-md-8 -->
        </div><!-- /row -->
    </div><!-- /container-fluid -->

</div>
