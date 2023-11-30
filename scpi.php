<?php 
function add_shipping_cost_per_product( $cart ) {
    // محاسبه تعداد محصولات در سبد خرید
    $product_count = $cart->cart_contents_count;

    // اضافه کردن هزینه پست بر اساس تعداد محصولات

    $shipping_cost = $product_count * 65000; // اینجا می‌توانید مقدار هزینه پست را تغییر دهید

    // اضافه کردن هزینه پست به سبد خرید
    
	
	
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		if($cart_item['data']->shipping_class=='post'){
			$subtotal = $cart_item['quantity']*20000;
				$shipping_cost+=$subtotal;
		}
   
	
	}
 
	
	$cart->add_fee( 'هزینه پست', $shipping_cost );
	
	
	
}

add_action( 'woocommerce_cart_calculate_fees', 'add_shipping_cost_per_product' );


