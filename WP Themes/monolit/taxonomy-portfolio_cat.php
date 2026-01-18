<?php
/* banner-php */

$tax_header_image = '';
$tax_fullwidth_nav_menu = 'no';
$tax_show_header = 'yes';
$tax_title_in_content = 'no';
$tax_show_content_footer = 'yes';
$t_id = get_queried_object()->term_id;
$term_meta = get_option( "taxonomy_portfolio_cat_$t_id" );
if($term_meta !== false){
    if( isset($term_meta['cat_header_image']['url']) ){
        $tax_header_image = $term_meta['cat_header_image']['url'];
    }
    if( isset($term_meta['tax_fullwidth_nav_menu']) ){
        $tax_fullwidth_nav_menu = $term_meta['tax_fullwidth_nav_menu'];
    }
    if( isset($term_meta['tax_show_header']) ){
        $tax_show_header = $term_meta['tax_show_header'];
    }
    if( isset($term_meta['tax_show_content_footer']) ){
        $tax_show_content_footer = $term_meta['tax_show_content_footer'];
    }
    if( isset($term_meta['tax_title_in_content']) ){
        $tax_title_in_content = $term_meta['tax_title_in_content'];
    }
}

if($tax_fullwidth_nav_menu == 'yes')
    get_header('navfullwidth');
else
    get_header(); 
?>

<?php if($tax_show_header == 'yes') :?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section">
            <div class="parallax-inner">
                <div class="bg" data-bg="<?php echo esc_url($tax_header_image );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><?php single_term_title( ) ;?></h2>
                            <?php echo term_description( );?>
                        </div>
                        <div class="col-md-6">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->    
<?php endif;//end show blog header?>


<?php
$is_hoz_header_footer = false;
if($tax_show_content_footer == 'yes' || $tax_show_header == 'yes')
    $is_hoz_header_footer = true;
switch ( monolit_global_var('folio_style') ) {
    case 'horizontal':
        // get_template_part('taxonomy-portfolio','horizontal' );
        monolit_get_template_part( 'taxonomy-portfolio','horizontal' , array('is_hoz_header_footer'=>$is_hoz_header_footer) );
        break;
    case 'horizontal_boxed':
        // get_template_part('taxonomy-portfolio','horizontal_boxed' );
        monolit_get_template_part( 'taxonomy-portfolio','horizontal_boxed' , array('is_hoz_header_footer'=>$is_hoz_header_footer) );
        break;
    case 'vertical':
        get_template_part('taxonomy-portfolio','vertical' );
        break;
    case 'vertical_fullscreen':
        get_template_part('taxonomy-portfolio','vertical_fullscreen' );
        break;
    case 'parallax':
        get_template_part('taxonomy-portfolio','parallax' );
        break;
    default:
        get_template_part('taxonomy-portfolio','horizontal' );
        break;
}
?>

<?php 
if($tax_show_content_footer == 'yes')
    get_footer( );
else 
    get_footer('nocontent'); 
?>