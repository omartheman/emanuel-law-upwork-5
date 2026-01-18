<?php
/* banner-php */
$first_side = 'left';
$parallax_value = 200;

// echo '<pre>';var_dump($post_index);
$col_cl = 'col-md-7';
if($first_side ==='left'){
    $is_dir = 'left';
    $dir_cl = 'left-direction';
    if($pin%2 == 0){
        //right
        $is_dir = 'right';
        $dir_cl = 'right-direction';
    }
}elseif($first_side ==='right'){
    $is_dir = 'right';
    $dir_cl = 'right-direction';
    if($pin%2 == 0){
        //left
        $is_dir = 'left';
        $dir_cl = 'left-direction';
    }
}else{
    $is_dir = 'center';
    $dir_cl = 'center-direction';
    $col_cl = 'col-md-6 col-md-offset-3';
}

?>
<div <?php post_class('content-content post-entry row');?>>
    <?php if($is_dir === 'right'):?>
    <div class="col-md-5"></div>
    <?php endif;?>
    <div class="<?php echo esc_attr($col_cl );?>">
        <div class="parallax-item <?php echo esc_attr($dir_cl );?>">
            <div class="paralax-media">

				<?php if( monolit_global_var('blog_date')  || monolit_global_var('blog_author')  || monolit_global_var('blog_cats')  || monolit_global_var('blog_comments') ):?>
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


				<?php 
				// Get the list of files
			    $slider_images = get_post_meta( get_the_ID(), '_monolit_post_slider_images', true);
			    if(!empty($slider_images)){ ?>
				<div class="paralax-wrap">
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
				<div class="paralax-wrap">
					<div class="resp-video">
						<?php echo wp_oembed_get(esc_url(get_post_meta(get_the_ID(), '_monolit_embed_video', true) )); ?>
					</div>
				</div>
				<?php
				}elseif(has_post_thumbnail( )){ ?>
				<div class="paralax-wrap">
			        <?php the_post_thumbnail('monolitblog-thumb',array('class'=>'respimg') ); ?>
			    </div>
				<?php } ?>
            </div>
            <div class="parallax-deck" data-top-bottom="transform: translateY(<?php echo 0-$parallax_value;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($parallax_value ); ?>px);">
                <div class="parallax-deck-item">
                	<h3 class="blog-parallax-title"><?php the_title( );?></h3><?php edit_post_link( esc_html__( 'Edit', 'monolit' ), '<span class="edit-link">', '</span>' ); ?>
                	<?php the_excerpt();?>
			        <?php
						wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'monolit' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						) );
					?>
			        <?php if( monolit_global_var('blog_tags') ) :?>
						<?php if(get_the_tags( )) { ?>
						<ul class="tagcloud indexposts">
							<?php the_tags('<li>','</li><li>','</li>');?>	
				        </ul>
						<?php } ?>
					<?php endif;?>
					<div class="clearfix"></div>
                    <a href="<?php the_permalink();?>" class="btn anim-button fl-l"><?php echo wp_kses(__('<span>Read more </span> <i class="fa fa-long-arrow-right"></i>','monolit'),array('span'=>array(),'i'=>array('class'=>array())) );?></a>												
                </div>
            </div>
        </div>
    </div>
    <?php if($is_dir === 'left'):?>
    <div class="col-md-5"></div>
    <?php endif;?>
</div>