<?php
    get_header('');
    //replace by function get_header
?>


<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
            <?php

            $list_herbal = get_list_product_by_cat_id(2);
            $list_bird = get_list_product_by_cat_id(1);
            $info_cat_herbal= get_info_cat(2);
            $info_cat_bird= get_info_cat(1);

                get_sidebar();
            ?>
        
        <div id="content" class="fl-right">
            <div class="section list-cat">
            <div id = "user_login">
               <p style = "text-align: right; font-size: 15px;"><?php if (is_login()) 
               
               
               echo 'Welcome back, '."<strong>".info_user('fullname')."</strong>".' (<a href="../online_shopping_store/modules/login/logout.php">Exit</a>)'; ?></p>
               
            


            </div>
                <div class="section-head">
                    <a class="section-title" href = "<?php echo $info_cat_herbal['url']  ?>" ><?php echo $info_cat_herbal['cat_title']  ?></a>
               
                </div>
                <div class="section-detail">
                <?php
                        if (!empty($list_herbal)) {


                ?>
                <ul class="list-item clearfix">


                <?php 
                    foreach ($list_herbal as $item) {  ?>
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
            <div class="section list-cat">
                <div class="section-head">
                    <a class="section-title" href = "<?php echo $info_cat_herbal['url']  ?>"><?php echo $info_cat_bird['cat_title']  ?></a>
                </div>
                <div class="section-detail">
                <?php
                        if (!empty($list_bird)) {


                ?>
                <ul class="list-item clearfix">


                <?php 
                    foreach ($list_bird as $item) {  ?>
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
          
        </div>
    </div>
</div>
       
<?php
    get_footer('');
?>
