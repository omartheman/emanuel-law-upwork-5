<?php
/* banner-php */
if( monolit_global_var('folio_parallax_first_side') ==='left'){
    $is_dir = 'left';
    $dir_cl = 'left-direction';
    if($pin%2 == 0){
        //left
        $is_dir = 'right';
        $dir_cl = 'right-direction';
    }
}else{
    $is_dir = 'right';
    $dir_cl = 'right-direction';
    if($pin%2 == 0){
        //left
        $is_dir = 'left';
        $dir_cl = 'left-direction';
    }
}
?>
<!-- <?php echo esc_attr($pin);?> --> 
<div <?php post_class('portfolio-parallax-item row');?>>
    <?php if($is_dir == 'right'):?>
    <div class="col-md-5"></div>
    <?php endif;?>
    <div class="col-md-7">
        <div class="parallax-item <?php echo esc_attr($dir_cl );?>">
            <div class="paralax-media">
            <?php if( monolit_global_var('folio_parallax_show_meta') ) :?>
                <ul class="creat-list">
                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ).'/'. get_the_time('Y').'/'. get_the_time('m').'/'. get_the_time('d') );?>"> <?php the_time( get_option('date_format') );?></a></li>
            <?php if(!empty($item_cats)) :?>
                <?php foreach($item_cats as $key => $p_c): ?>
                    <li><a href="<?php echo esc_url($cat_links[$key] );?>"><?php echo esc_attr($p_c );?></a></li>
                <?php endforeach;?>
            <?php endif;?>

                <?php 
                $terms = get_the_terms(get_the_ID(), 'portfolio_cat');
                if ( $terms && ! is_wp_error( $terms ) ){
                    foreach( $terms as $key => $term){
                        
                        echo sprintf( '<li><a href="%1$s">%2$s</a></li>',
                            esc_url( get_term_link( $term->slug, 'portfolio_cat' ) ),
                            esc_html( $term->name )
                        );
                    }
                }
                ?>

                </ul>
            <?php endif;?>
                <?php if(get_post_meta(get_the_ID(), '_monolit_folio_video', true)!=""){ ?> 
                <div class="paralax-wrap">
                    <div class="resp-video">
                       <?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_monolit_folio_video', true) ); ?>
                    </div>
                </div>
                <?php }elseif(has_post_thumbnail( )) { ?>
                <div class="paralax-wrap">
                    <?php the_post_thumbnail( 'monolitfolio-parallax', array('class'=>'respimg') );?>
                </div>
                <?php } ?>
            </div>
            <div class="parallax-deck" data-top-bottom="transform: translateY(<?php echo (0 - monolit_global_var('folio_parallax_value') );?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr( monolit_global_var('folio_parallax_value') );?>px);">
                <div class="parallax-deck-item">
                    <h3><?php the_title( );?></h3>
                    <?php if( monolit_global_var('folio_parallax_show_excerpt') ) the_excerpt();?>
                    <a href="<?php the_permalink();?>" class="btn anim-button fl-l"><?php echo wp_kses(__('<span>View Project</span><i class="fa fa-long-arrow-right"></i>','monolit'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></a>                                                                                                       
                </div>
            </div>
        </div>
    </div>
    <?php if($is_dir == 'left'):?>
    <div class="col-md-5"></div>
    <?php endif;?>
</div>