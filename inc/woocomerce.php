<?php

// Add Container_Class And Row__Class In WooCommerce
add_action('woocommerce_before_main_content', 'before_main_content', 5);
function before_main_content()
{
    echo '<div class="container"><div class="row"><div class="col-md-12">';
}

// Close Div_Container And Div_Row In WooCommerce
add_action('woocommerce_after_main_content', 'after_main_content', 5);
function after_main_content()
{
    echo '</div></div></div>';
}

// Remove Shop Page Title In WooCommerce
add_filter('woocommerce_show_page_title', 'shop_page_title');
function shop_page_title($title)
{
    if (is_shop()) $title = false;
    return $title;
}

// Remove Product Result Count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// Remove Shorting Dropdown
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remove Sidebar Form Single Product Page
add_action('wp', 'remove_sidebar_single_product_page');
function remove_sidebar_single_product_page()
{
    if (is_product()) :
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    endif;
}

// Update Cart Value Using AJAX
add_filter('woocommerce_add_to_cart_fragments', 'update_cart');
function update_cart($fragments)
{
    global $woocommerce;
    ob_start();
?>
    <div class="tip"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
    <?php
    $fragments['div.tip'] = ob_get_clean();
    return $fragments;
}

// Update Cart Quantity Using JS
add_action('wp_footer', 'cart_update_qty_script');
function cart_update_qty_script()
{
    if (is_cart()) :
    ?>
        <script>
            jQuery('div.woocommerce').on('change', '.qty', function() {
                jQuery("[name='update_cart']").trigger("click");
            });
        </script>
<?php
    endif;
}

// Update Shop Page Heading Tag And Add CSS Class
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title()
{
    echo '<h6 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title text-center')) . '">' . get_the_title() . '</h6>';
}
