<?php
/* banner-php */
/**
 * Template Name: Portfolio Parallax
 *
 */

$show_page_header = get_post_meta(get_the_ID(),'_monolit_show_page_header',true );
$show_page_title = get_post_meta(get_the_ID(),'_monolit_show_page_title',true );
$show_page_breadcrumbs = get_post_meta(get_the_ID(),'_monolit_show_page_breadcrumbs',true );

$hcl = 'col-md-6';
if($show_page_title == 'no' || $show_page_breadcrumbs == 'no'){
    $hcl = 'col-md-12';
}

get_header(); ?>

<?php if($show_page_header == 'yes') :?>
<?php if(get_post_meta(get_the_ID(),'_monolit_page_header_video',true) != '') :?>
<!-- content  -->
<div class="content">
    <section class="parallax-section header-video">
        <!-- Hero video   -->
        <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
            <div class="video-mask"></div>
            <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
            <div class="mob-bg bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_page_header_bg',true ) );?>"></div>
            <div  class="background-youtube" data-vid="<?php echo esc_attr( get_post_meta(get_the_ID(),'_monolit_page_header_video',true) );?>" data-mv="1"> </div>
        </div>
        <!-- Hero video   end -->
        <div class="overlay"></div>
        <div class="container">
            <div class="page-title">
                <div class="row">
                <?php if($show_page_title == 'yes') :?>
                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
                        <?php 
                            echo wp_kses_post( get_post_meta(get_the_ID(),'_monolit_page_header_intro',true ) );
                        ?>
                    </div>
                <?php endif;?> 
                <?php if($show_page_breadcrumbs == 'yes') :?>
                    <div class="<?php echo esc_attr($hcl );?> main-page-bread">
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
            <div class="bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_page_header_bg',true ) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
            <div class="overlay"></div>
        </div>
        <div class="container">
            <div class="page-title">
                <div class="row">
                <?php if($show_page_title == 'yes') :?>
                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
                        <?php 
                            echo wp_kses_post( get_post_meta(get_the_ID(),'_monolit_page_header_intro',true ) );
                        ?>
                    </div>
                <?php endif;?> 
                <?php if($show_page_breadcrumbs == 'yes') :?>
                    <div class="<?php echo esc_attr($hcl );?> main-page-bread">
                        <?php monolit_breadcrumbs();?>
                    </div>
                </div>
                <?php endif;?> 
            </div>
        </div>
    </section>
</div>
<!-- content end -->
<?php endif;?>       
<?php endif;?> 

<?php 

$port_cats = get_post_meta(get_the_ID(), '_monolit_portfolio_categories', true);
if($port_cats && $port_cats[0] == 0) {
    unset($port_cats[0]);
}
if(is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args = array(
    'post_type' => 'portfolio',
    'paged' => $paged,
    'posts_per_page'    => get_post_meta(get_the_ID(),'_monolit_portfolio_count', true ),
    'orderby'           => get_post_meta(get_the_ID(),'_monolit_folio_orderby', true ), //id, author, name, title, date, modified, none
    'order'             => get_post_meta(get_the_ID(),'_monolit_folio_order', true ),
);
$folio_exclude = get_post_meta(get_the_ID(),'_monolit_folio_exclude',true );
$folio_include = get_post_meta(get_the_ID(),'_monolit_folio_include',true );
$posts_not_in = array();
$posts_in = array();
if(!empty($folio_exclude)){
    $posts_not_in = explode(",", $folio_exclude);
}
if(!empty($folio_include)){
    $posts_in = explode(",", $folio_include);
}
if(!empty($posts_in) && empty($posts_not_in)){
    $args['post__in'] = $posts_in;
}elseif(empty($posts_in) && !empty($posts_not_in)){
    $args['post__not_in'] = $posts_not_in;
}

if($port_cats){
    $args['tax_query'][] = array(
        'taxonomy'      => 'portfolio_cat',
        'field'         => 'term_id',
        'terms'         => $port_cats,
        'include_children' => true // default true
    );
}
//echo'<pre>';var_dump($args);die;
$portfolio = new WP_Query($args);  

if($portfolio->have_posts()) : ?>


    <!-- content  -->
    <div class="content portfolio-parallax">
        <section>
            <div class="container">
                <?php $pin = 1; while($portfolio->have_posts()) : $portfolio->the_post(); ?>
                
                    <?php //get_template_part( 'portfolio', 'parallax-list' ); 
                            monolit_get_template_part( 'portfolio', 'parallax-list' , array('pin'=>$pin) );
                    ?>

                <?php $pin++; endwhile;?>                                                                  
                <?php monolit_custom_pagination($portfolio->max_num_pages,$range = 2,'',false);?>
            </div>
        </section>
    </div>
    <!-- content end -->

<?php endif; // end have_post() ?>

<?php wp_reset_postdata();?>

<?php while(have_posts()) : the_post(); ?>
                    
    <?php the_content();?>
    <?php wp_link_pages( ); ?>

<?php endwhile; ?>


<?php 
if(get_post_meta(get_the_ID(),'_monolit_folio_content_footer',true ) == 'yes')
    get_footer( );
else 
    get_footer('nocontent'); 
?>