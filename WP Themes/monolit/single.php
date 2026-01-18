<?php
/* banner-php */
if(get_post_meta(get_the_ID(), '_monolit_single_layout', true)){
	$sideBar = get_post_meta(get_the_ID(), '_monolit_single_layout', true);
}else{
	$sideBar = monolit_global_var('blog_layout') ;
}
$show_post_header = get_post_meta(get_the_ID(),'_monolit_show_post_header',true );
$show_post_title = get_post_meta(get_the_ID(),'_monolit_show_post_title',true );
$show_post_breadcrumbs = get_post_meta(get_the_ID(),'_monolit_show_post_breadcrumbs',true );

$hcl = 'col-md-6';
if($show_post_title == 'no' || $show_post_breadcrumbs == 'no'){
    $hcl = 'col-md-12';
}

get_header(); ?>

<?php if($show_post_header == 'yes') :?>
	<?php if(get_post_meta(get_the_ID(),'_monolit_post_header_video',true) != '') :?>
	<!-- content  -->
	<div class="content">
	    <section class="parallax-section header-video">
	        <!-- Hero video   -->
	        <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
	            <div class="video-mask"></div>
	            <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
	            <div class="mob-bg bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_post_header_bg',true ) );?>"></div>
	            <div  class="background-youtube" data-vid="<?php echo esc_attr( get_post_meta(get_the_ID(),'_monolit_post_header_video',true) );?>" data-mv="1"> </div>
	        </div>
	        <!-- Hero video   end -->
	        <div class="overlay"></div>
	        <div class="container">
	            <div class="page-title">
	                <div class="row">
	                <?php if($show_post_title == 'yes') :?>
	                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
	                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
	                        <?php 
	                            echo wp_kses_post( get_post_meta(get_the_ID(),'_monolit_post_header_intro',true ) );
	                        ?>
	                    </div>
	                <?php endif;?> 
	                <?php if($show_post_breadcrumbs == 'yes') :?>
	                    <div class="<?php echo esc_attr($hcl );?> main-page-bread">
	                        <?php monolit_breadcrumbs();?>
	                    </div>
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
	            <div class="bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_post_header_bg',true ) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
	            <div class="overlay"></div>
	        </div>
	        <div class="container">
	            <div class="page-title">
	                <div class="row">
	                <?php if($show_post_title == 'yes') :?>
	                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
	                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
	                        <?php 
	                            echo wp_kses_post( get_post_meta(get_the_ID(),'_monolit_post_header_intro',true ) );
	                        ?>
	                    </div>
	                <?php endif;?> 
	                <?php if($show_post_breadcrumbs == 'yes') :?>
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
        <section id="blog_single_sec1">
            <div class="container">
                <div class="row">
                    
                    <?php if($sideBar ==='left_sidebar'):?>
                    <!-- sidebar -->
					<div class="col-md-4 left-sidebar">
						<div class="sidebar">
			                <?php 
			    				get_sidebar(); 
			    			?>
						</div>
			        </div><!-- sidebar end-->
					<?php endif;?>
	                <?php if($sideBar==='fullwidth'):?>
	                	<!-- Articels -->
						<div class="col-md-12">
					<?php elseif($sideBar==='left_sidebar'):?>
						<!-- Articels -->
						<div class="col-md-8">
					<?php else:?>
						<!-- Articels -->
						<div class="col-md-8">
					<?php endif;?>

					<?php while(have_posts()) : the_post(); ?>

			
					<article <?php post_class('cth-single blog-content' );?>>
						<?php the_title( '<h2 class="section-title dec-title"><span>', '</span></h2>' );?><?php edit_post_link( esc_html__( 'Edit', 'monolit' ), '<span class="edit-link">', '</span>' ); ?>

					<?php if(monolit_global_var('blog_date') || monolit_global_var('blog_author')  || monolit_global_var('blog_cats')  || monolit_global_var('blog_comments') ):?>
						<ul class="creat-list">
					        <?php if( monolit_global_var('blog_date') ) :?>
							<li><a class="tag" href="<?php echo get_day_link((int)get_the_time('Y' ), (int)get_the_time('m' ), (int)get_the_time('d' )); ?>"> <?php the_time( get_option('date_format') );?></a></li>
							<?php endif;?>
							<?php if( monolit_global_var('blog_cats') ) :?>
								<?php if(get_the_category( )) { ?>
									<li><?php the_category(', ' ); ?></li>			
								<?php } ?>	
							<?php endif;?>
							<?php if( monolit_global_var('blog_comments') ) :?>
							<li><?php comments_popup_link(esc_html__('0 comment', 'monolit'), esc_html__('1 comment', 'monolit'), esc_html__('% comments', 'monolit')); ?></li>
							<?php endif;?>
							<?php if( monolit_global_var('blog_author') ) :?>
							<li><?php the_author_posts_link( );?></li>
							<?php endif;?> 
					    </ul>
					<?php endif;?>

					<?php if( monolit_global_var('blog_featured_single') ) :?>

						<?php 
						// Get the list of files
					    $slider_images = get_post_meta( get_the_ID(), '_monolit_post_slider_images', true);
					    if(!empty($slider_images)){ ?>
						<div class="blog-media">
					        <div class="single-slider-holder">
					            <div class="single-slider owl-carousel owl-theme refrestonresizeowl">
					            <?php 
					                foreach ( (array) $slider_images as $img_id => $img_url ) {
								        echo '<div class="item">';
								        echo wp_get_attachment_image($img_id, 'monolitblog-thumb','',array('class'=>'respimg') );
								        echo '</div>';
								    }
								?>
					            </div>
					            <div class="customNavigation ssn">
					                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
					                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
					            </div>
					        </div>
					    </div>
					    <?php }elseif(get_post_meta(get_the_ID(), '_monolit_embed_video', true)!=""){ ?>	
						<div class="blog-media">
							<div class="responsive-video">
								<?php echo wp_oembed_get(esc_url(get_post_meta(get_the_ID(), '_monolit_embed_video', true) )); ?>
							</div>
						</div>
						<?php
						}elseif(has_post_thumbnail( )){ ?>
						<div class="blog-media">
					        <div class="box-item">
					            <a class="ajax" href="<?php the_permalink();?>">
					            <span class="overlay"></span>
					            <?php the_post_thumbnail('monolitblog-thumb',array('class'=>'respimg') ); ?>
					            </a>
					        </div>
					    </div>
						<?php } ?>

					<?php endif;?>

						<div class="blog-text">
                            <?php the_content();?>

                            <?php
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'monolit' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) );
							?>

							<?php if( monolit_global_var('blog_tags_single') ) :?>
								<?php if(get_the_tags( )) { ?>
								<ul class="tagcloud indexposts">
									<?php the_tags('<li>','</li><li>','</li>');?>	
						        </ul>
								<?php } ?>
							<?php endif;?>

							<?php if( monolit_global_var('blog_share_names')  != '' ): ?>
								<div class="clearfix mrt-20"></div>
								<h3 class="shr-post"><?php esc_html_e('Share post:','monolit');?></h3>
                    			<div class="blog-share-container"  data-share="['<?php echo esc_attr( implode("','", explode(",", monolit_global_var('blog_share_names') ) ) );?>']"></div>
							<?php endif;?>
                        </div><!-- /blog-text -->

		            </article><!-- /cth-single blog-content -->
					<?php if( monolit_global_var('blog_author_single') ) :?>
					<div class="post-author">
	                    <div class="author-img">
	                        <?php //echo get_avatar( get_the_author_meta('user_email'), 74 );
                                echo get_avatar(get_the_author_meta('user_email'),$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=100' );
                            ?> 
	                    </div>
	                    <div class="author-content">
	                        <h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo esc_html__('Posts by ','monolit') . get_the_author_meta('nickname');?>" rel="author"><?php echo get_the_author_meta('nickname');?></a></h5>
	                        <p><?php echo get_the_author_meta('description');?></p>
	                    </div>
	                </div>
                    <?php endif;?>

                    <?php monolit_post_nav();?>

		            <?php
					if ( comments_open() || get_comments_number() ) :
						
					 	comments_template(); 
					 	
					endif; ?>



				<?php endwhile;?>

                        
                    </div><!-- /col-md-8 Articels end-->
                    
                    <?php if($sideBar ==='right_sidebar'):?>
                    <!-- sidebar -->
					<div class="col-md-4 right-sidebar">
						<div class="sidebar">
			                <?php 
			    				get_sidebar(); 
			    			?>
						</div>
			        </div><!-- sidebar end-->
					<?php endif;?>
                    
                </div>
            </div>
        </section>
    </div>
    <!-- content  end-->

<?php get_footer(); ?>