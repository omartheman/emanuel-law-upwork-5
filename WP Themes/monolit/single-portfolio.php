<?php
/* banner-php */
$folio_single_footer = get_post_meta(get_queried_object_id(), '_monolit_folio_single_footer', true);
?>
<?php 
	get_header();

?>



<?php while(have_posts()) : the_post(); ?>

    <?php the_content(); ?>
    <?php wp_link_pages(); ?>


<?php endwhile; ?> 

<?php 
	if($folio_single_footer == 'yes'){
		get_footer();
	}else{
		get_footer( 'nocontent' );
	}

?>