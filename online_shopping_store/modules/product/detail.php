<?php
    get_header();
?>
<div id="main-content-wp" class="detail-product-page clearfix">
    <div class="wp-inner clearfix">
    <?php
          #1-Get category:
         //Get ID from URL:
         $id = (int) $_GET['id'];

         #Get product by ID
   
        //BUILD FUNCTION:
        $info_cat = get_info_cat($id);
   
        
       $item = get_product_by_id($id);

       if (isset($_POST['btn_add_cart'])) {
        $qty = $_SESSION['cart']['buy'][$id]['id'];
       }

        get_sidebar();
    ?>
        <div id="content" class="fl-right">
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
        
                
                    <div class="thumb fl-left">
                        <img src="<?php echo $item['product_thumb']  ?>" alt="">
                    </div>
                    <div class="detail fl-right">
                        <h3 class="title"><?php echo $item['product_title']  ?></h3>
                        <p class="price">$<?php echo $item['price']  ?></p>
                        <p class="product-code">Product code: <span><?php echo $item['code']  ?></span></p>
                        <div class="desc-short">
                            <h5>Product description:</h5>
                            <p><?php echo $item['product_desc']  ?></p>
                        </div>


                        <form action = "<?php echo $item['url_add_cart'] ?>" method = "POST">
                        <div class="num-order-wp">
                            <span>Quantity:</span>
                            <input type="number" min = "1" max = "1000 "id="num-order" name="qty[<?php echo $qty?>]" value="1">
                            <input type = "submit" name = "btn_add_cart" title="" class="add-to-cart" value = "Add to cart">
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="section" id="desc-wp">
                <div class="section-head">
                    <h3 class="section-title">Product detail</h3>
                </div>
                <div class="section-detail">
                    <p><?php echo $item['product_content']  ?></p>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
    get_footer();
?>