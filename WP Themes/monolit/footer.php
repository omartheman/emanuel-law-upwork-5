<?php
/* banner-php */
?> 
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

                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Footer logo --> 
                                    <div class="footer-item footer-logo">
                                        <a href="https://icolaw.wpengine.com/" class="ajax"><img src="https://icolaw.wpengine.com/wp-content/uploads/2023/02/logo-fancy-v3.png" alt="footer logo" style="height:50px"></a>
                                        <p>Packaged SEC compliance and transactional solutions in connection with blockchain technology companies launching compliant Security Token and Platform Token integrations and financings. </p>
                                    </div>
                                    <!-- Footer logo end --> 
                                </div>
                                <!-- Footer info --> 
                                <div class="col-md-2">
                                    <div class="footer-item">
                                        <h4 class="text-link">Call</h4>
                                        <ul>
                                            <li><a href="tel:13104352830">+1 (310) 435-2830</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer info end--> 
                                <!-- Footer info --> 
                                <div class="col-md-2">
                                    <div class="footer-item">
                                        <h4 class="text-link">Email</h4>
                                        <ul>
                                            <li><a href="mailto:eorlando@eolegal.com">eorlando@eolegal.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer info-->
                                <!-- Footer info end--> 
                                <div class="col-md-2">
                                    <div class="footer-item">
                                        <h4 class="text-link">HQ</h4>
                                        <ul>
                                            <li><span>280 South Beverly Drive<br />Suite 505<br />Beverly Hills, CA  90212</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="footer-item">
                                        <h4 class="text-link">Satellite</h4>
                                        <ul>
                                            <li><span>Avenida Escazu, Suite 141<br />Prospero Fernandez Hwy<br />San Jose, Costa Rica</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer info end--> 
                                </div>
                                <!-- Footer copyright -->
                                <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="footer-wrap">
                                        <span class="copyright">  © ICOLaw.net 2023. All rights reserved.  
                                        </span>
                                        <span class="to-top">To Top</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer copyright end -->				


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