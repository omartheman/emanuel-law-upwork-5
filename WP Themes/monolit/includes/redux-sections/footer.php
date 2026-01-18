<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer', 'monolit'),
    'id'         => 'footer-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-pencil',
    'fields' => array(
        array(
            'id' => 'show_left_bar',
            'type' => 'switch',
            'title' => esc_html__('Show Left Bar', 'monolit'),
            'desc' => esc_html__('Show left Blank bar on your site', 'monolit'),
            // 'desc' => esc_html__('','monolit' ),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => true
        ),
        array(
            'id' => 'show_fixed_title',
            'type' => 'switch',
            'title' => esc_html__('Show Left Title', 'monolit'),
            'desc' => esc_html__('Show title on the left of your page.', 'monolit'),
            // 'desc' => esc_html__('','monolit' ),
            //'options' => array('no' => 'No', 'yes' => 'Yes'), //Must provide key => value pairs for select options
            'default' => true
        ),
        array(
            'id' => 'left_bar_width',
            'type' => 'text',
            // 'url' => true,
            'title' => esc_html__('Left Bar Width', 'monolit'),
            'desc' => esc_html__('Default: 80px. If you add more info to the footer section you must increase the value here.', 'monolit'),
            // 'desc' => esc_html__('Upload your back to top image icon.', 'monolit'),
            'default' => '80px',
        ),
        array(
            'id' => 'left_socials',
            'type' => 'ace_editor',
            //'url' => true,
            'title' => esc_html__('Left Bar Icons', 'monolit'),
            //'compiler' => 'true',
            'mode'=>'html',
            'full_width'=>true,
            'desc' => esc_html__('You should replace href attribute value with your social links, and get social icons from:', 'monolit').' <a href="http://fontawesome.io/icons/#brand" target="_blank"> Awesome Brand Icons</a>',
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => '<ul>
<li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
<li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
<li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
</ul>',
        ),

        array(
            'id' => 'footer_content',
            'type' => 'ace_editor',
            //'url' => true,
            'title' => esc_html__('Footer Content', 'monolit'),
            //'compiler' => 'true',
            'mode'=>'html',
            'full_width'=>true,
            'default' => '<div class="row">
<div class="col-md-6">
    <!-- Footer logo --> 
    <div class="footer-item footer-logo">
        <a href="'.esc_url( home_url('/' )).'" class="ajax"><img src="'.get_template_directory_uri().'/assets/images/footer-logo.png" alt="footer logo"></a>
        <p>Our team takes over everything, from an idea and concept development to realization. We believe in traditions and incorporate them within our innovations.Client is the soul of the project.  </p>
    </div>
    <!-- Footer logo end --> 
</div>
<!-- Footer info --> 
<div class="col-md-2">
    <div class="footer-item">
        <h4 class="text-link">Call</h4>
        <ul>
            <li><a href="#">+7(111)123456789</a></li>
            <li><a href="#">+1(000)987654321</a></li>
        </ul>
    </div>
</div>
<!-- Footer info end--> 
<!-- Footer info --> 
<div class="col-md-2">
    <div class="footer-item">
        <h4 class="text-link">Write</h4>
        <ul>
            <li><a href="#">yourmail@domain.com</a></li>
            <li><a href="#">email@website.com</a></li>
        </ul>
    </div>
</div>
<!-- Footer info-->
<!-- Footer info end--> 
<div class="col-md-2">
    <div class="footer-item">
        <h4 class="text-link">Visit</h4>
        <ul>
            <li><span>USA 27TH BROOKLYN NY</span></li>
            <li> <a href="#" target="_blank">View on map</a></li>
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
        <span class="copyright">  &#169; Monolit 2016. All rights reserved.  
        </span>
        <span class="to-top">To Top</span>
    </div>
</div>
</div>
<!-- Footer copyright end -->',
        ), 

    array(
        'id' => 'show_constellation',
        'type' => 'switch',
        'title' => esc_html__('Show Constellation', 'monolit'),
        // 'subtitle' => esc_html__('Show Constellation', 'monolit'),
        'default' => true
    ), 

    array(
        'id'        => 'constellation_color',
        'type'      => 'color_rgba',
        'title'     => esc_html__('Constellation Line Color', 'monolit'),
     
        // See Notes below about these lines.
        //'output'    => array('background-color' => '.site-header'),
        //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
        'default'   => array(
            'color'     => '#fff',
            'alpha'     => 0.5
        ),
                            
    ),


    ),
) );