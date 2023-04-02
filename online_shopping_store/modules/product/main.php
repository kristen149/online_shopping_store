<?php
    //replace by function get_header
    get_header('');
?>
<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
    
    
    
    <?php
    #1-Get category:
    //Get ID from URL:
    $cat_id = (int) $_GET['cat_id'];
   
    //BUILD FUNCTION:
    $info_cat = get_info_cat($cat_id);
   
   
    #2-Get list of product:
    $list_item = get_list_product_by_cat_id($cat_id);


      get_sidebar();
    ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
            <div id = "user_login">
               <p style = "text-align: right; font-size: 15px;"><?php if (is_login()) 
               
               
               echo 'Welcome back, '."<strong>".info_user('fullname')."</strong>".' (<a href="../online_shopping_store/modules/login/logout.php">Exit</a>)'; ?></p>
               
            


            </div>
                <div class="section-head">
                    <h3 class="section-title"><?php echo $info_cat['cat_title']  ?></h3>
                    <p class="section-desc">There are 20 products in this category</p>
                </div>
                <div class="section-detail">

                <?php
                        if (!empty($list_item)) {


                ?>
                <ul class="list-item clearfix">


                <?php 
                    foreach ($list_item as $item) {  ?>
                        <li>
                            <a href="<?php echo $item['url']  ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb']  ?>" alt="">
                            </a>
                            <a href="<?php echo $item['url']  ?>" title="" class="title"> <?php echo $item['product_title']  ?></a>
                            <p class="price"><?php echo currency_format($item['price'])  ?></p>
                        </li>
                <?php            }  ?>       
                    </ul>
                    
                    <?php 
                        }
                ?>
                </div>
               

            </div>
            <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
      
<?php
    get_footer('');
?>
