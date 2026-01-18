<?php
/* banner-php */

/**
 * Woocommerce support
 *
 */

if ( ! function_exists( 'monolit_is_woocommerce_activated' ) ) {
    function monolit_is_woocommerce_activated() {
        if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }
    }
}