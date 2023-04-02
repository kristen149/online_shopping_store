<?php

    get_header();
?>
<?php
$list_buy_cart=get_list_buy_cart();
//show_array($list_buy_cart);
?>


<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Shopping cart</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php
            if (!empty($_SESSION['cart'])){


            
        ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
               <form action = "?mod=cart&act=update" method = "POST">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Product Code</td>
                            <td>Product Image</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Quantity</td>
                            <td colspan="2">Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        foreach ($list_buy_cart as $item) {

                        ?>
                        
                       
                        <tr>
                            <td><?php  echo $item['code']   ?></td>
                            <td>
                                <a href="<?php  echo $item['url']   ?>" title="" class="thumb">
                                    <img src="<?php  echo $item['product_thumb']   ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?php  echo $item['url']   ?>" title="" class="name-product"> <?php  echo $item['product_title']   ?></a>
                            </td>
                            <td><?php echo currency_format($item['price'])   ?></td>
                            <td>
                                <input type="number" min = "1" max = "1000" name="qty[<?php echo $item['id']  ?>]" value="<?php  echo $item['qty']   ?>" class="num-order">
                            </td>
                            <td><?php echo currency_format($item['sub_total'])   ?></td>
                            <td>
                                <a href="<?php echo $item['url_delete_cart']  ?>" title="Delete product" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        
                        ?> 
                    </tbody>
                    <tfoot>
                   

                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Total price: <span><?php echo currency_format( get_total_cart())   ?></span></p>
                                </div>
                            </td>
                        </tr>
                     

                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type = "submit" id="update-cart"name = "btn_update_cart" value = "Update shopping cart" />
                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Payment</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Please click on <span>“Update shopping cart”</span> to update quantity. Enter quantity <span>0</span> to delete your product out of shopping cart. Click payment to complete your purchase.</p>
                <a href="?page=home" title="" id="buy-more">Continue to purchase</a><br/>
                <a href="?mod=cart&act=delete_all" title="" id="delete-cart">Delete all</a>
            </div>
        </div>
        <?php
            } else {  ?>
        <p>Your cart is currently empty! Click <a href = "?page=home">here</a> to return to homepage</p>
        <?php } ?>

    </div>
</div>


<?php

    get_footer();
?>