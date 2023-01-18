<?php

/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * 
 */


if (!defined('_T_VERSION')) {
    define('_T_VERSION', '1.0.0');
}

/* ------ Enqueue Styles And Scripts ------ */
if (!function_exists('style_script')) :
    function style_script()
    {
        /* CSS */
        wp_enqueue_style('main_css', get_stylesheet_uri(), array(), _T_VERSION, false);
        wp_enqueue_style('fonts_css', get_template_directory_uri() . '/assets/fonts/stylesheet.css', _T_VERSION, false);
        wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap_5.3.0/bootstrap.min.css', _T_VERSION, false);
        // wp_enqueue_style('slick_css', get_template_directory_uri() . '/assets/css/slick_1.8.1/slick.css', _T_VERSION, false);
        wp_enqueue_style('owl-carousel_css', get_template_directory_uri() . '/assets/css/owl-carousel_2.3.4/owl.carousel.min.css', _T_VERSION, false);
        wp_enqueue_style('theme_css', get_template_directory_uri() . '/assets/css/theme-style.css', _T_VERSION, false);

        /* JS */
        wp_enqueue_script('jquery_js', get_template_directory_uri() . '/assets/js/jquery_3.6.3/jquery.min.js', array(), _T_VERSION, true);
        wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap_5.3.0/bootstrap.bundle.min.js', array(), _T_VERSION, true);
        // wp_enqueue_script('slick_js', get_template_directory_uri() . '/assets/js/slick_1.8.1/slick.min.js', array(), _T_VERSION, true);
        wp_enqueue_script('owl-carousel_js', get_template_directory_uri() . '/assets/js/owl-carousel_2.3.4/owl.carousel.min.js', array(), _T_VERSION, true);
        wp_enqueue_script('theme_js', get_template_directory_uri() . '/assets/js/functions.js', array(), _T_VERSION, true);
    }
    add_action('wp_enqueue_scripts', 'style_script');
endif;

/* ------ Title Support & Post-thumbnails Support & Post-Formats Support ------ */
if (!function_exists('custom__theme__setup')) :
    function custom__theme__setup()
    {
        add_theme_support('title_tag');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Register Theme Custom Logo
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array('site-title', 'site-description'),
            'unlink-homepage-logo' => true,
        );
        add_theme_support('custom-logo', $defaults);
    }
    add_action('after_setup_theme', 'custom__theme__setup');
endif;

// Add WooCommerce Support
if (!function_exists('woocommerce_theme_support')) :
    function woocommerce_theme_support()
    {
        add_theme_support(
            'woocommerce',
            array(
                'product_grid' =>
                array(
                    'default_rows' => 3,
                    'min_rows' => 3,
                    'max_rows' => 3,
                    'default_columns' => 3,
                    'min_columns' => 3,
                    'max_columns' => 3,
                )
            )
        );

        // Add Product Thumbnail Effact Support
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
    add_action('after_setup_theme', 'woocommerce_theme_support');
endif;

/* ------ Admin Login Page Design ------ */
require get_template_directory() . '/inc/login_p_design.php';

/* ------ Revert To Classic Editor & Classic Widgets ------ */
require get_template_directory() . '/inc/c_editor_c_widgets.php';

/* ------ Register Custom Menus ------ */
require get_template_directory() . '/inc/menus.php';

/* ------ Register Customizer ------ */
require get_template_directory() . '/inc/customizer.php';

/* ------ Register Widgets ------ */
require get_template_directory() . '/inc/widgets.php';
