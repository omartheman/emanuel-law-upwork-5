<?php
/* banner-php */


$tax_header_image = '';
$tax_fullwidth_nav_menu = 'yes';
$tax_show_header = 'no';
$tax_title_in_content = 'no';
$tax_show_content_footer = 'yes';
$t_id = get_queried_object()->term_id;
$term_meta = get_option( "taxonomy_post_tag_$t_id" );
if($term_meta !== false){
    if( isset($term_meta['cat_header_image']['url']) ){
        $tax_header_image = $term_meta['cat_header_image']['url'];
    }
    if( isset($term_meta['tax_fullwidth_nav_menu']) ){
        $tax_fullwidth_nav_menu = $term_meta['tax_fullwidth_nav_menu'];
    }
    if( isset($term_meta['tax_show_header']) ){
        $tax_show_header = $term_meta['tax_show_header'];
    }
    if( isset($term_meta['tax_show_content_footer']) ){
        $tax_show_content_footer = $term_meta['tax_show_content_footer'];
    }
    if( isset($term_meta['tax_title_in_content']) ){
        $tax_title_in_content = $term_meta['tax_title_in_content'];
    }
}

if($tax_fullwidth_nav_menu == 'yes')
    get_header('navfullwidth');
else
    get_header(); 
?>

<?php if($tax_show_header == 'yes') :?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section">
            <div class="parallax-inner">
                <div class="bg" data-bg="<?php echo esc_url($tax_header_image );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><?php the_archive_title() ;?></h2>
                            <?php echo tag_description( );?>
                        </div>
                        <div class="col-md-6">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->    
<?php endif;//end show blog header?>

<!-- content  -->
<div class="content">
    <section id="blog_sec1">
        <div class="container">
            <div class="row">

            <?php if( monolit_global_var('blog_layout') ==='left_sidebar'):?>
                <div class="col-md-4 left-sidebar">
                    <div class="sidebar">
                        <?php 
                            get_sidebar(); 
                        ?>
                    </div>
                </div>
            <?php endif;?>

            <?php if( monolit_global_var('blog_layout') ==='fullwidth'):?>
                <div class="col-md-12  display-posts">
            <?php elseif( monolit_global_var('blog_layout') ==='left_sidebar'):?>
                <div class="col-md-8 display-posts">
            <?php else:?>
                <div class="col-md-8  display-posts">
            <?php endif;?>


				<?php if($tax_title_in_content == 'yes') :?>
                    <h2><?php the_archive_title() ;?></h2>
                    <?php echo tag_description( );?>
                <?php endif;?>
				
				<?php if(have_posts()) : $pin = 1; ?>

						<?php while(have_posts()) : the_post(); ?>
                    
							<?php 
                                if( monolit_global_var('blog_style') == 'parallax'){
                                    monolit_get_template_part( 'content', 'parallax', array('pin'=>$pin) );
                                }else{
                                    get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) );
                                }  
                            ?>

						<?php $pin++; endwhile; ?>

				<?php else: ?>

					<?php get_template_part('content','none' ); ?>

				<?php endif; ?> 

				<?php monolit_pagination('','');?>

                </div><!--/.posts column -->

            <?php if( monolit_global_var('blog_layout') ==='right_sidebar'):?>
                <!--Blog Sidebar-->
                <div class="col-md-4 right-sidebar">
                    <div class="sidebar">
                        <?php 
                            get_sidebar(); 
                        ?>
                    </div>
                </div>
            <?php endif;?>

            </div><!-- /row -->
        </div><!-- /container -->
    </section>
</div><!-- Content end  -->


<?php 
if($tax_show_content_footer == 'yes')
    get_footer( );
else 
    get_footer('nocontent'); 
?>