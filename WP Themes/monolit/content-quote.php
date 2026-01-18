<?php
/* banner-php */
 
?>
<article <?php post_class('content-quote post-entry');?>>
	<h2 class="section-title dec-title"><a href="<?php the_permalink();?>"><?php the_title( '<span>', '</span>' );?></a></h2><?php edit_post_link( esc_html__( 'Edit', 'monolit' ), '<span class="edit-link">', '</span>' ); ?>
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
	<?php if(get_post_meta(get_the_ID(), '_monolit_embed_video', true)!=""){ ?>	
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
        <?php if( monolit_global_var('blog_tags') ) :?>
			<?php if(get_the_tags( )) { ?>
			<ul class="tagcloud indexposts">
				<?php the_tags('<li>','</li><li>','</li>');?>	
	        </ul>
			<?php } ?>
		<?php endif;?>
		<div class="clearfix"></div>
		<a href="<?php the_permalink();?>" class="btn"><?php echo wp_kses(__('<span>read more </span> <i class="fa fa-long-arrow-right"></i>','monolit'),array('span'=>array(),'i'=>array('class'=>array())) );?></a>
    </div>
    
</article>