<?php
/* banner-php */
$item_cats = array();
$terms = get_the_terms(get_the_ID(), 'portfolio_cat');
if ( $terms && ! is_wp_error( $terms ) ){
    foreach( $terms as $key => $term){
        $item_cats[] = $term->name ;
    }
}
$item_classes = '';

$masonry_size = get_post_meta(get_the_ID(), '_monolit_masonry_size', true);
$masonry_thumb_size = 'monolitmasonry-size-'.$masonry_size;
$folio_popup_link = get_post_meta(get_the_ID(), '_monolit_folio_popup_link', true);

$enable_gallery = false;
if(get_post_meta(get_queried_object_id(), '_monolit_folio_enable_gallery', true) == 'yes'){
    $enable_gallery = true;
}elseif(get_post_meta(get_queried_object_id(), '_monolit_folio_enable_gallery', true) == 'no'){
    $enable_gallery = false;
}else{
   $enable_gallery =  monolit_global_var('folio_enable_gallery');
}
$popup_cls = '';
if($folio_popup_link){
    $item_classes .= ' has-popup';
    // $url_args = parse_url($folio_popup_link);
    $popup_cls = ' single-popup-image';
    if($enable_gallery) {
        $popup_cls = ' folio-popup-gallery';
    }
}elseif($enable_gallery){
    $item_classes .= ' has-popup';
    $popup_cls = ' folio-popup-gallery';
}
$folio_video_link = get_post_meta(get_the_ID(), '_monolit_folio_video', true);
if(get_post_meta(get_the_ID(), '_monolit_folio_video', true)!=""){ 
    $item_classes .= ' is_folio_video';
}
?>
<!-- portfolio item -->
<div <?php post_class('gallery-item gallery-item-'.$masonry_size.' '.$item_classes);?>>
<?php if(get_post_meta(get_the_ID(), '_monolit_folio_video', true)!=""){ ?> 
    <div class="resp-video-holder">
        <div class="resp-video">
           <?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_monolit_folio_video', true) ); ?>
        </div>
    </div>
<?php }else { ?>

    <div class="grid-item-holder">
        <?php the_post_thumbnail($masonry_thumb_size,array('class'=>'respimg'));?>
        <div class="port-desc-holder<?php echo esc_attr($popup_cls );?>" 
        <?php if($folio_popup_link) :?>
        data-src="<?php echo esc_url($folio_popup_link );?>" 
        data-sub-html="<?php the_title_attribute();?>" 
        <?php elseif($enable_gallery) :?>
        data-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );?>" 
        data-sub-html="<?php the_title_attribute();?>" 
        <?php endif;?>>
            <div class="port-desc">
                <div class="grid-item">
                    <h3><a href="<?php the_permalink();?>" ><?php the_title( );?></a></h3>
                
                    <?php if(!empty($item_cats)) :?>
                        <span><?php echo implode(" / ",$item_cats);?></span>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<!-- portfolio item end -->