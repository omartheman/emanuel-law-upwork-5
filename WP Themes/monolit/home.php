<?php
/* banner-php */

if( monolit_global_var('blog_fullwidth_nav_menu') )
    get_header('navfullwidth');
else
    get_header(); ?>

<?php if( monolit_global_var('show_blog_header') ) :?>
    <?php if( monolit_global_var('blog_header_video')  != '' ): ?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section header-video">
            <!-- Hero video   -->
            <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
                <div class="video-mask"></div>
                <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
                <div class="mob-bg bg" data-bg="<?php echo esc_url( monolit_global_var('blog_header_image','url', true ) );?>"></div>
                <div  class="background-youtube" data-vid="<?php echo esc_attr( monolit_global_var('blog_header_video')  );?>" data-mv="1"> </div>
            </div>
            <!-- Hero video   end -->
            <div class="overlay"></div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_blog_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('blog_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('blog_home_text_intro') );?>
                            
                        </div>
                    <?php if( monolit_global_var('show_blog_breadcrumbs') ) :?>
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
                <div class="bg" data-bg="<?php echo esc_url( monolit_global_var('blog_header_image','url', true) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_blog_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('blog_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('blog_home_text_intro') );?>
                            
                        </div>
                    <?php if( monolit_global_var('show_blog_breadcrumbs') ) :?>
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
    
<?php get_footer(); ?>