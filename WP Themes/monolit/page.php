<?php
/* banner-php */
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

<!-- content  -->
    <div class="content no-bg-con">
        <section id="page_sec1" class="no-padding-page">
            <div class="container">
                <div class="row">
                <?php if( monolit_global_var('blog_layout') ==='left_sidebar'):?>
                    <!-- sidebar -->
                    <div class="col-md-4 left-sidebar">
                        <div class="sidebar">
                            <?php 
                                get_sidebar('page'); 
                            ?>
                        </div>
                    </div><!-- sidebar end-->
                    <?php endif;?>

                    <div class="col-md-8">

                        <?php if(have_posts()) : ?>

                            <?php while(have_posts()) : the_post(); ?>

                                <?php get_template_part( 'content', 'page'); ?>

                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                ?>

                            <?php endwhile; ?>

                    <?php endif; ?> 

                    </div><!-- /col-md-8 Articels end-->

                    <?php if( monolit_global_var('blog_layout') ==='right_sidebar'):?>
				        <!--Blog Sidebar-->
				        <div class="col-md-4 right-sidebar">
							<div class="sidebar">
				                <?php 
				    				get_sidebar('page'); 
				    			?>
							</div>
				        </div>
				    <?php endif;?>
                    
                    
                </div>
            </div>
        </section>
    </div>
    <!-- content  end-->
<?php 
if(get_post_meta(get_the_ID(),'_monolit_folio_content_footer',true ) == 'yes')
    get_footer( );
else 
    get_footer('nocontent'); 
?>