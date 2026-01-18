<?php
/* banner-php */
 
?>
<article class="content-none post-entry">
    <h2 class="section-title dec-title"><span><?php esc_html_e('Nothing Found Here!','monolit'); ?></span></h2>
    <div class="blog-text">
        
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses(__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'monolit' ),array('a'=>array('href'=>array(),'class'=>array(),'target'=>array())) ), admin_url( 'post-new.php' ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'monolit' ); ?></p>
			<?php get_search_form(); ?>

			<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'monolit' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
    </div>
    
</article>