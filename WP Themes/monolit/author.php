<?php
/* banner-php */

$fullwidth_nav_menu = get_user_meta(get_the_author_meta('ID'), '_monolit_fullwidth_nav_menu' ,true);
$show_user_header = get_user_meta(get_the_author_meta('ID'), '_monolit_show_user_header' ,true);
$user_header_img = get_user_meta(get_the_author_meta('ID'), '_monolit_user_header_img' ,true);
$show_user_info = get_user_meta(get_the_author_meta('ID'), '_monolit_show_user_info' ,true);


if($fullwidth_nav_menu == 'yes')
    get_header('navfullwidth');
else
    get_header(); 
?>

<?php if($show_user_header == 'yes') :?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section">
            <div class="parallax-inner">
                <div class="bg" data-bg="<?php echo esc_url($user_header_img );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><?php the_archive_title() ;?></h2>
                        
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

				<?php if($show_user_info == 'yes') :?>
                     <div class="post-author">
                        <div class="author-img">
                            <?php //echo get_avatar( get_the_author_meta('user_email'), 74 );
	                            echo get_avatar(get_the_author_meta('user_email'),$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=100' );
	                        ?> 
                        </div>
                        <div class="author-content">
                            <h2><a href="<?php echo esc_url(get_the_author_meta('user_url' ));?>"><?php echo get_the_author_meta('nickname');?></a></h2>
                        	<p><?php echo get_the_author_meta('description');?></p>
                        </div>
                        <div class="clearfix"></div>
						<div class="author-social">
							<ul>
						    <?php if(get_user_meta(get_the_author_meta('ID'), '_monolit_twitterurl' ,true)!=''){ ?>
						    	<li><a title="<?php esc_html_e('Follow on Twitter','monolit');?>" href="<?php echo esc_url(get_user_meta(get_the_author_meta('ID'), '_monolit_twitterurl' ,true)); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						    <?php } ?>
						    <?php if(get_user_meta(get_the_author_meta('ID'), '_monolit_facebookurl' ,true)!=''){ ?>
						    	<li><a title="<?php esc_html_e('Like on Facebook','monolit');?>" href="<?php echo esc_url(get_user_meta(get_the_author_meta('ID'), '_monolit_facebookurl' ,true)); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						    <?php } ?>
						    <?php if(get_user_meta(get_the_author_meta('ID'), '_monolit_googleplusurl' ,true)!=''){ ?>
						    	<li><a title="<?php esc_html_e('Circle on Google Plus','monolit');?>" href="<?php echo esc_url(get_user_meta(get_the_author_meta('ID'), '_monolit_googleplusurl' ,true)) ;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						    <?php } ?>
						    <?php if(get_user_meta(get_the_author_meta('ID'), '_monolit_linkedinurl' ,true)!=''){ ?>
						    	<li><a title="<?php esc_html_e('Be Friend on Linkedin','monolit');?>" href="<?php echo esc_url(get_user_meta(get_the_author_meta('ID'), '_monolit_linkedinurl' ,true) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						    <?php } ?>
						    </ul>
						</div>
						<div class="clearfix"></div>
                    </div>
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