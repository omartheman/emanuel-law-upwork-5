<?php
/* banner-php */

if(get_post_meta(get_the_ID(), '_monolit_single_layout', true)){
	$sideBar = get_post_meta(get_the_ID(), '_monolit_single_layout', true);
}else{
	$sideBar = monolit_global_var('member_layout') ;
}
$show_post_header = get_post_meta(get_the_ID(),'_monolit_show_member_header',true );
$show_post_title = get_post_meta(get_the_ID(),'_monolit_show_member_title',true );
$show_post_breadcrumbs = get_post_meta(get_the_ID(),'_monolit_show_member_breadcrumbs',true );

$hcl = 'col-md-6';
if($show_post_title == 'no' || $show_post_breadcrumbs == 'no'){
    $hcl = 'col-md-12';
}

get_header(); ?>

<?php if($show_post_header == 'yes') :?>
	<?php if(get_post_meta(get_the_ID(),'_monolit_member_header_video',true) != '') :?>
	<!-- content  -->
	<div class="content">
	    <section class="parallax-section header-video">
	        <!-- Hero video   -->
	        <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
	            <div class="video-mask"></div>
	            <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
	            <div class="mob-bg bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_member_header_bg',true ) );?>"></div>
	            <div  class="background-youtube" data-vid="<?php echo esc_attr( get_post_meta(get_the_ID(),'_monolit_member_header_video',true) );?>" data-mv="1"> </div>
	        </div>
	        <!-- Hero video   end -->
	        <div class="overlay"></div>
	        <div class="container">
	            <div class="page-title">
	                <div class="row">
	                <?php if($show_post_title == 'yes') :?>
	                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
	                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
	                        
	                    </div>
	                <?php endif;?> 
	                <?php if($show_post_breadcrumbs == 'yes') :?>
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
	            <div class="bg" data-bg="<?php echo esc_url( get_post_meta(get_the_ID(),'_monolit_member_header_bg',true ) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
	            <div class="overlay"></div>
	        </div>
	        <div class="container">
	            <div class="page-title">
	                <div class="row">
	                <?php if($show_post_title == 'yes') :?>
	                    <div class="<?php echo esc_attr($hcl );?> main-page-title">
	                        <h2><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
	                        
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
        <section id="member_single_sec1">
            <div class="container">
                <div class="row">
                    
                    <?php if($sideBar ==='left_sidebar'):?>
                    <!-- sidebar -->
					<div class="col-md-4 left-sidebar">
						<div class="sidebar">
			                <?php 
			    				get_sidebar('member'); 
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

			
					
					<div class="row">
					<?php 
						if(has_post_thumbnail( ) ){
							$col_cl = 'col-md-8';
						}else{
							$col_cl = 'col-md-12';
						}
					?>
						<div class="<?php echo esc_attr($col_cl );?>">
							<?php the_content( ); ?>

		                    <?php monolit_member_nav();?>

				            <?php
							if ( comments_open() || get_comments_number() ) :
								
							 	comments_template(); 
							 	
							endif; ?>
						</div>
					<?php 
						if(has_post_thumbnail( ) ): ?>
						<div class="col-md-4">
                            <div class="parallax-box member-parallax-box" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
                                <?php the_post_thumbnail('monolitmember2-thumb',array('class'=>'respimg')); ?>
                            </div>
                        </div>
					<?php endif;?>
					</div>



				<?php endwhile;?>

                        
                    </div><!-- /col-md-8 Articels end-->
                    
                    <?php if($sideBar ==='right_sidebar'):?>
                    <!-- sidebar -->
					<div class="col-md-4 right-sidebar">
						<div class="sidebar">
			                <?php 
			    				get_sidebar('member'); 
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