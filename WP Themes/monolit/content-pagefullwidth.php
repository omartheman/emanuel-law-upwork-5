<?php
/* banner-php */
?>
<?php if(has_post_thumbnail( )){ ?>
<div class="blog-media">
    <div class="box-item">
        <a href="javascript:void(0)">
        <span class="overlay"></span>
        <?php the_post_thumbnail('monolitblog-thumb',array('class'=>'respimg') ); ?>
        </a>
    </div>
</div>
<?php } ?>
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