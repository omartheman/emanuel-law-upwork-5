<?php
/* banner-php */
?>


<?php if(have_posts()) : ?>

<!-- content  -->
<div class="content portfolio-parallax">
    <section>
        <div class="container">
            <?php $pin = 1; while(have_posts()) : the_post(); ?>
            
                <?php //get_template_part( 'portfolio', 'parallax-list' ); 
                		monolit_get_template_part( 'portfolio', 'parallax-list' , array('pin'=>$pin) );
                ?>

            <?php $pin++; endwhile;?>                                                                  
            <?php monolit_content_nav('',''); ?>
        </div>
    </section>
</div>
<!-- content end -->
<?php else :
    get_template_part('content','none' );
?>
<?php endif; // end have_post() ?>
