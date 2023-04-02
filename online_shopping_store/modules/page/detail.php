<?php
    get_header();
//replace by function get_header
?>



<div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
         
        <?php
    //get id in url
    $id = (int)$_GET['id'];
   // echo $id;

    //BUILD FUNCTION
    $item= get_page_by_id($id);
            get_sidebar();
?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
            <div id = "user_login">
               <p style = "text-align: right; font-size: 15px;"><?php if (is_login()) 
               
               
               echo 'Welcome back, '."<strong>".info_user('fullname')."</strong>".' (<a href="../online_shopping_store/modules/login/logout.php">Exit</a>)'; ?></p>
               
            


            </div>
                <div class="section-head">
                    <h3 class="section-title"><?php echo $item['page_title']  ?></h3>
                </div>
                <div class="section-detail">
                    <p class="create-date"><?php echo $item['created_at']  ?></p>
                    <div class="content-news">
                    <?php echo $item['post_content']  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>
