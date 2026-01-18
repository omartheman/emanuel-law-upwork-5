<?php
/* banner-php */
/**
 * Template Name: Home One Page
 *
 */

get_header(); ?>

<?php //monolit_echo_vc_custom_styles();?>
<?php while(have_posts()) : the_post(); ?>

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

<?php endwhile; ?>   
<!-- end site wrapper -->
<?php 
if(get_post_meta(get_the_ID(),'_monolit_folio_content_footer',true ) == 'yes')
    get_footer( );
else 
    get_footer('nocontent'); 
?>