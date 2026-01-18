<?php
/* banner-php */
/**
 * Template Name: Home Landing Page
 *
 */

get_header('landing'); ?>

<?php //monolit_echo_vc_custom_styles();?>
<?php while(have_posts()) : the_post(); ?>

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

<?php endwhile; ?>   
<!-- end site wrapper -->
<?php get_footer('landing'); ?>