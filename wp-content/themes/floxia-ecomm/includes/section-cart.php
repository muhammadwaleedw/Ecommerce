<?php
/*
Template Name: Cart Page

*/
wp_head();
?>
<?php get_template_part('includes/section','top_bar');?>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
                        <?php 
                        
                        ?>
                    <table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                        
                        <?php 
                         
                        global $woocommerce;
                        $items = $woocommerce->cart->get_cart();
                    
                            foreach($items as $item => $values) { 
                                $_product =  wc_get_product( $values['data']->get_id());
                                $shipping_total = $woocommerce->cart->get_cart_shipping_total();
                                $price = get_post_meta($values['product_id'] , '_price', true);
                                $total = get_post_meta($values['product_id'] , 'line_subtotal', true);
                                $purchase_note = get_post_meta($values['product_id'] , '_purchase_note', true);
                                ?>
                            <?php /*  echo "<b>".$_product->get_title().'</b>  <br> Quantity: '.$values['quantity'].'<br>'; * echo  "Product ID: " .$values['product_id']. "<br>"; 
                                echo  "Total: " .$values['line_subtotal']. "<br>"; 
                                echo  "Sku: " .$values['']. "<br>"; 
                                $price = get_post_meta($values['product_id'] , '_price', true);
                                echo "  Price: ".$price."<br>";
                            } 
                            var_dump($items); ?>
                            <?php /*
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
                            $args = array( 
                                'post_type' => 'product' );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); */?>
                                        
							<tr>
								<td class="image" data-title="No"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php echo "<b>".$_product->get_title() ?>
                                     <p class="product-des">Lorem ipsum dolor sit amet consectetur.</p>
								</td>
								<td class="price" data-title="Price"><span><?php echo get_woocommerce_currency_symbol();?></span> <span><?php echo $price;?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $values['quantity'];?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span><?php echo get_woocommerce_currency_symbol();?></span> <spna> <?php echo $values['line_subtotal'];?></span></td>
								<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            <?php 
                               // }
                            // endwhile; wp_reset_query(); 
                            ?>
							
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
                                    <h3>Purchase notes:</h3>
                                     <p><?php echo $purchase_note; ?></p>
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span><?php echo get_woocommerce_currency_symbol();?> <?php echo $values['line_subtotal'];?></li>
										<li>Shipping<span><?php echo $shipping_total;?></span></li>
										<?php 
										
										?>
										<li>You Save<span><?php echo $woocommerce->cart->applied_coupons;?></span></li>
										<li class="last">You Pay<span><?php echo WC()->cart->total; ?></span></li>
									</ul>
									<div class="button5">
										<a href="#" class="btn">Checkout</a>
										<a href="#" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <?php } ?>
					<!--/ End Total Amount -->
                    <?php 
                    foreach($items as $item => $values) { 
                        $price = get_post_meta($values['product_id'] , 'woocommerce_order_amount_discount_total', true);
						
						$total_sales = get_post_meta($values['product_id'] , '_purchase_note', true);
                        echo $total_sales;
                        $shipping_total = $woocommerce->cart->get_cart_shipping_total();
                        echo $shipping_total;
                        echo "<h3> Price: " . $price  ."<h3>";
                    }
                    if (!function_exists("echoc")) {
                        function echoc($data) {
                            echo "\n<pre>\n";
                            print_r($data);
                            echo "</pre>\n";
                        }
                    }
                    
                    $cart_items = $woocommerce->cart->get_cart();
                    echoc($cart_items);
                    
                    $shipping_total = $woocommerce->cart->get_cart_shipping_total();
                    echoc("Shipping total: ".$shipping_total);
                    ?>
					<?php echo $woocommerce->cart->applied_coupons;
					echo "<pre>";
					//print_r($woocommerce->);
					echo "</pre>";
					//echo woocommerce_order_amount_discount_total;
					?>

				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	
    <?php get_footer()?>
<?php wp_footer()?>