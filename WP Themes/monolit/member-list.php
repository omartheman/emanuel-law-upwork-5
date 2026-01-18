<?php
/* banner-php */

// $col_cl = 'col-md-8';
if( monolit_global_var('member_first_side') ==='left'){
    $is_dir = 'right';
    $dir_cl = 'right-direction';
    if($pin%2 == 0){
        //left
        $is_dir = 'left';
        $dir_cl = 'left-direction';
    }
}else{
    $is_dir = 'left';
    $dir_cl = 'left-direction';
    if($pin%2 == 0){
        //left
        $is_dir = 'right';
        $dir_cl = 'right-direction';
    }
}

?>
<!-- content  -->
<div <?php post_class('member_item content');?>>
    <section>
        <div class="sect-subtitle right-align-dec" data-top-bottom="transform: translateY(200px);" data-bottom-top="transform: translateY(-200px);"><span><?php echo esc_attr( sprintf("%02d", $pin) );?></span></div>
        <div class="container">
            <div class="row">
                <?php if($is_dir === 'left' && has_post_thumbnail( ) ):?>
                <div class="col-md-4">
                    <div class="parallax-box member-parallax-box" data-top-bottom="transform: translateY(<?php echo (0 - monolit_global_var('member_parallax_value') );?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr( monolit_global_var('member_parallax_value') );?>px);">
                        <?php the_post_thumbnail('monolitmember2-thumb',array('class'=>'respimg')); ?>
                    </div>
                </div>
                <?php endif;?>

                <div class="col-md-8">
                    <h2 class="section-title"><?php the_title( );?></h2>
                    <?php the_excerpt();?>
                    <?php if( monolit_global_var('member_read_more') ) :?>
                    <a href="<?php the_permalink();?>" class=" btn anim-button   flat-btn   transition  fl-l"><?php echo wp_kses(__('<span>More info</span><i class="fa fa-eye"></i>','monolit'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></a>
                    <?php endif;?>
                </div>

                <?php if($is_dir === 'right' && has_post_thumbnail( ) ):?>
                <div class="col-md-4">
                    <div class="parallax-box member-parallax-box" data-top-bottom="transform: translateY(<?php echo (0 - monolit_global_var('member_parallax_value') );?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr( monolit_global_var('member_parallax_value') );?>px);">
                        <?php the_post_thumbnail('monolitmember2-thumb',array('class'=>'respimg')); ?>
                    </div>
                </div>
                <?php endif;?>
                
            </div>
        </div>
    </section>
</div>
<!-- content end -->