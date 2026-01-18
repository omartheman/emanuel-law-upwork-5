<?php
/* banner-php */
?> 

                                    </div><!--end .column -->
                                </div><!--end .row -->
                            </div><!--end .container -->
                        </section>
                    </div><!--end .header-shop -->
                <?php //if(!is_404()) :?>
                    <!-- content footer-->
                    <div class="height-emulator"></div>
                    <footer class="content-footer">
                        <!--  container  --> 
                        <div class="container">
                            <?php if(is_active_sidebar('footer_columns_widget')){    ?>
                            <!--================= Section widgets  ================-->
                                <div class="row footer-widgets-holder">
                                    <?php
                                        dynamic_sidebar('footer_columns_widget');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php echo wp_kses_post( monolit_global_var('footer_content') );?>
                        </div>
                        <!--  container  end --> 
                        <?php if( monolit_global_var('show_constellation') ) :?>
                        <!-- Hover animation  -->
                        <canvas class="particular footer-canvas" data-color="<?php echo esc_attr( monolit_global_var('constellation_color','rbga',true) );?>"></canvas>
                        <!-- Hover animation  end -->
                        <?php endif;?>
                    </footer>
                    <!-- content footer end -->
                <?php //endif;?>
                    <?php if( monolit_global_var('share_names') != '' ): ?>
                    <!-- share  -->
                    <div class="share-inner">
                        <div class="share-container  isShare"  data-share="['<?php echo esc_attr( implode("','", array_map("trim",explode(",", monolit_global_var('share_names') ) ) ) );?>']"></div>
                        <div class="close-share"></div>
                    </div>
                    <!-- share end -->
                    <?php elseif(is_active_sidebar('social_share_widget' )) :?>
                    <!-- share  -->
                    <div class="share-inner">
                        <div class="share-container  isShare widget_share"><?php dynamic_sidebar('social_share_widget' );?></div>
                        <div class="close-share"></div>
                    </div>
                    <!-- share end -->
                    <?php endif;?>
                </div>
                <!-- content-holder  end-->
            </div>
            <!-- wrapper end -->
            <?php if( monolit_global_var('show_left_bar') ):?>
            <!-- Fixed footer -->
            <?php if( monolit_global_var('left_bar_width') != '' && monolit_global_var('left_bar_width') != '80px') :?>
            <footer class="fixed-footer monolit-footer" style="width:<?php echo esc_attr( monolit_global_var('left_bar_width') );?>;">
            <?php else :?>
            <footer class="fixed-footer monolit-footer">
            <?php endif;?>
                <div class="footer-social">
                <?php echo wp_kses_post( monolit_global_var('left_socials') );?>
                </div>
                <?php if( monolit_global_var('show_fixed_title') ) :?>
                <!-- Header  title --> 
                <div class="footer-title">
                    <h2><a href="#"></a></h2>
                </div>
                <!-- Header  title  end-->
                <?php endif;?>
            </footer>
            <!-- Fixed footer end-->
            <?php endif;?>
        </div>
        <!-- Main end -->
        <?php wp_footer(); ?>
        
    </body>
</html>