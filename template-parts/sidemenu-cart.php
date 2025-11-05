<?php

/**
 * Dynamic sidemenu cart partial that preserves original theme markup.
 * Replace the static sidemenu-wrapper block in header-classic.php with this.
 *
 * Place file at: template-parts/parts/sidemenu-cart.php
 */

if (! defined('ABSPATH')) {
    exit;
}
?>

<div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls" aria-label="<?php esc_attr_e('Close cart', 'wp-advanced-theme'); ?>">
            <i class="far fa-times"></i>
        </button>

        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title"><?php esc_html_e('Shopping cart', 'wp-advanced-theme'); ?></h3>

            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget">
                    <?php if (class_exists('WooCommerce') && WC()->cart && ! WC()->cart->is_empty()) : ?>

                        <?php
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product   = $cart_item['data'];
                            $product_id = $cart_item['product_id'];

                            if (! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0) {
                                continue;
                            }

                            // Product data
                            $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                            $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                            $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                            $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                            $product_sku       = $_product->get_sku();

                            // Remove link (keeps same markup/class as original)
                            $remove_link = sprintf(
                                '<a href="%1$s" class="remove remove_from_cart_button" aria-label="%2$s" data-product_id="%3$s" data-cart_item_key="%4$s" data-product_sku="%5$s"><i class="far fa-times"></i></a>',
                                esc_url(wc_get_cart_remove_url($cart_item_key)),
                                esc_attr__('Remove this item', 'wp-advanced-theme'),
                                esc_attr($product_id),
                                esc_attr($cart_item_key),
                                esc_attr($product_sku)
                            );
                        ?>
                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                <?php
                                // Remove link
                                echo $remove_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                // Product thumbnail + title inside anchor if permalink exists (match original markup)
                                if (empty($product_permalink)) {
                                    // Thumbnail (already an <img> tag)
                                    echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo '<span class="product-title">' . wp_kses_post($product_name) . '</span>';
                                } else {
                                    printf(
                                        '<a href="%1$s">%2$s%3$s</a>',
                                        esc_url($product_permalink),
                                        $thumbnail, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        wp_kses_post($product_name)
                                    );
                                }
                                ?>

                                <span class="quantity">
                                    <?php
                                    /* translators: 1: quantity 2: product price */
                                    printf(
                                        '%1$s × <span class="woocommerce-Price-amount amount">%2$s</span>',
                                        esc_html($cart_item['quantity']),
                                        wp_kses_post($product_price)
                                    );
                                    ?>
                                </span>
                            </li>
                        <?php } // end foreach 
                        ?>

                    <?php else : ?>

                        <li class="empty"><?php esc_html_e('No products in the cart.', 'wp-advanced-theme'); ?></li>

                    <?php endif; ?>
                </ul>

                <?php if (class_exists('WooCommerce') && WC()->cart && ! WC()->cart->is_empty()) : ?>
                    <p class="woocommerce-mini-cart__total total">
                        <strong><?php esc_html_e('Subtotal:', 'wp-advanced-theme'); ?></strong>
                        <span class="woocommerce-Price-amount amount"><?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?></span>
                    </p>

                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="th-btn wc-forward"><?php esc_html_e('View cart', 'wp-advanced-theme'); ?></a>
                        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="th-btn checkout wc-forward"><?php esc_html_e('Checkout', 'wp-advanced-theme'); ?></a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>