<?php
//http://proteusthemes.github.io/one-click-demo-import/
//https://wordpress.org/plugins/one-click-demo-import/

function monolit_import_files() {
  return array(
    array(
      'import_file_name'             => esc_html__('Full Demo Content (widgets included)','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/monolit-all.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/monolit.wie',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the front-page from Settings -> Reading screen and menu from Appearance -> Menus screen.', 'monolit' ),
    ),

    

    array(
      'import_file_name'             => esc_html__('Posts','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/posts.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/posts.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Posts menu', 'monolit' ),
    ),

    array(
      'import_file_name'             => esc_html__('Pages','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/pages.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/pages.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Pages menu', 'monolit' ),
    ),

    

    array(
      'import_file_name'             => esc_html__('Media Files','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/media.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/media.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Media menu', 'monolit' ),
    ),
    

    array(
      'import_file_name'             => esc_html__('Contact Forms','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/contactforms.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/contactforms.png',
      'import_notice'                => esc_html__( 'This demo will be downloaded into Contact menu', 'monolit' ),
    ),

    array(
      'import_file_name'             => esc_html__('Portfolios','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/portfolios.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/portfolios.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Monolit Portfolios menu', 'monolit' ),
    ),

    
    array(
      'import_file_name'             => esc_html__('Members','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/members.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/members.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Monolit Members menu', 'monolit' ),
    ),

    array(
      'import_file_name'             => esc_html__('Services','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/services.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/services.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Monolit Services menu', 'monolit' ),
    ),

    array(
      'import_file_name'             => esc_html__('Timelines','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/timelines.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/timelines.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Monolit Timelines menu', 'monolit' ),
    ),

    array(
      'import_file_name'             => esc_html__('Testimonials','monolit' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/demo_data_files/testimonials.xml',
      'import_preview_image_url'     => 'http://demowp.cththemes.net/monolit/wp-content/uploads/2017/04/testimonials.png',
      'import_notice'                => esc_html__( 'This demo data will be downloaded into Monolit Testimonials menu', 'monolit' ),
    ),

  );
}



add_filter( 'pt-ocdi/import_files', 'monolit_import_files' );