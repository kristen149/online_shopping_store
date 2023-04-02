<?php
        get_header();


?>


<div id="main-content-wp" class="checkout-page ">
    <div class="wp-inner clearfix">
        <?php
                get_sidebar();
        ?>
        <?php
$list_buy_cart=get_list_buy_cart();
//show_array($list_buy_cart);
?>
        <div id="content" class="fl-right">
            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title">Payment</h3>
                </div>
                <div class="section-detail">
                    <div class="wrap clearfix">
                        <form method="POST">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Customer information</h3>
                                <div class="detail">
                                    <div class="field-wp">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" id="fullname">
                                    </div>
                                    <div class="field-wp">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email">
                                    </div>
                                    <div class="field-wp">
                                        <label>Adress</label>
                                        <input type="text" name="address" id="address">
                                    </div>
                                    <div class="field-wp">
                                        <label>Phone number</label>
                                        <input type="tel" name="tel" id="tel">
                                    </div>
                                    <div class="field-full-wp">
                                        <label>Note</label>
                                        <textarea name="note"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div id="order-review-wp" class="fl-right">
                                <h3 class="title">Order summary</h3>
                                <div class="detail">
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <td>Product (<?php echo get_num_order_cart() ?>)</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                         foreach ($list_buy_cart as $item) {

                                        ?>

                                            <tr class="cart-item">
                                                <td class="product-name"><?php echo $item['product_title'] ?><strong class="product-quantity">x<?php echo $item['qty']  ?></strong></td>
                                                <td class="product-total"><?php echo $item['price'] ?></td>
                                            </tr>
                                            <?php
                        }
                        
                        ?> 



                                        </tbody>
                                       
                                        <tfoot>
                                            <tr class="order-total">
                                                <td>Order total:</td>
                                                <td><strong class="total-price"><?php echo currency_format( get_total_cart())   ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment-checkout-wp">
                                        <ul id="payment_methods">
                                            <li>
                                                <input type="radio" checked="checked" id="direct-payment" name="payment-method" value="direct-payment">
                                                <label for="direct-payment">Pay with a credit card</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                                                <label for="payment-home">Cash on delivery (COD)</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="place-order-wp clearfix">
                                        <button type="submit" name="checkout">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();

?>
