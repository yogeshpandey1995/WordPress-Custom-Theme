<?php

/**
 * Custom Post Type ----- Cars
 */

if (!function_exists('register_cars_cpt')) :
    function register_cars_cpt()
    {
        $cars_labels = [
            "name" => __("Cars", "custom_theme"),
            "singular_name" => __("Car", "custom_theme"),
            "add_new" => __("Add New Car", "custom_theme"),
        ];
        $cars_args = [
            "label" => __("Cars", "custom_theme"),
            "labels" => $cars_labels,
            "description" => "",
            "public" => true,
            "has_archive" => true,
            "hierarchical" => true,
            "menu_icon" => "dashicons-car",
            "rewrite" => ["slug" => "cars", "with_front" => true],
            "supports" => ["title", "editor", "thumbnail", "author"],
            "taxonomies" => ["brands"],
        ];

        register_post_type("cars", $cars_args);
    }
    add_action('init', 'register_cars_cpt');
endif;

/**
 * Custom Post Taxonomy
 */
if (!function_exists('register_brands_taxonomy')) :
    function register_brands_taxonomy()
    {
        $brands_labels = [
            "name" => __("Brands", "custom_theme"),
            "singular_name" => __("Brand", "custom_theme"),
        ];
        $brands_args = [
            "label" => __("Brands", "custom_theme"),
            "labels" => $brands_labels,
            "public" => true,
            "hierarchical" => true,
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rewrite" => ['slug' => 'brands', 'with_front' => true,  'hierarchical' => true,],
        ];
        register_taxonomy("brands", ["cars"], $brands_args);
    }
    add_action('init', 'register_brands_taxonomy');
endif;
