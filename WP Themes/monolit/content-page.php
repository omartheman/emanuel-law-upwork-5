<?php
/* banner-php */
?>

<article <?php post_class('content-page cth-page');?>>
	<?php if(esc_html_x('yes','Show page title','monolit' ) == 'yes'):?>

		<h2 class="section-title dec-title"><?php echo preg_replace('/-s-([^-]*)-s-/', '<strong>$1</strong>', single_post_title( '', false ) );?></h2>
	<?php endif;?>
	<?php if(has_post_thumbnail( )){ ?>
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
        <?php edit_post_link( esc_html__( 'Edit', 'monolit' ), '<span class="edit-link">', '</span>' ); ?>	
		<?php the_content( ); ?>
        <?php
			wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'monolit' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
       
    </div>
    
</article>