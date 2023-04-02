<?php
    function currency_format ($currency) {
        return '$'.$currency;

    }
   function get_header($version = '') {
        if(!empty($version)) {
            $path_header = "inc/header_{$version}.php";
        } else {
            $path_header = "inc/header.php";
        } 
        if (file_exists($path_header)){
            require $path_header;
        } else {
            echo "File header {$path_header} not found";
        }
   }
   function get_footer($version = '') {
    if(!empty($version)) {
        $path_footer = "inc/footer_{$version}.php";
    } else {
        $path_footer = 'inc/footer.php';
    } 
    if (file_exists($path_footer)){
        require $path_footer;
    } else {
        echo "File footer {$path_footer} not found";
    }
}
function get_sidebar() {
        $path_sidebar = 'inc/sidebar.php';
    
    if (file_exists($path_sidebar)){

        require $path_sidebar;
    } else {
        echo "File sidebar {$path_sidebar} not found";
    }
}



    function show_array($data){
        if(is_array($data)){
            echo "<pre>";
            print_r($data);
            echo "<pre>";
        }
    }
    function check_login($username, $password) {
        global $list_users;
        foreach($list_users as $user) {
            if ($username ==  $user['username']&& md5($password) ==$user['password']){
                return TRUE;
            }



        }
        return FALSE;


    }
    function redirect ($url) {
        if (!empty($url)){
            header ("Location: {$url}");
        }

    }

    function is_login (){
        if (isset($_SESSION['is_login'])) {
            return TRUE;
        }
        return FALSE;
    }

    function user_login (){
        if (!empty($_SESSION['user_login'])) {
            return $_SESSION['user_login'];
        }
        return FALSE;
    }

    function info_user ( $field) {
        global $list_users;
        if (isset($_SESSION['is_login'])) {
            foreach ($list_users as $user){
                if ($_SESSION['user_login'] == $user['username']) {
                    if (array_key_exists($field, $user)) {
                        return $user[$field];

                    }
                }
            }
        }
        return FALSE;
    }
    //Get ID from URL:
    //Get page from ID:
    // return array (id)
    function get_page_by_id ($id='') {
        global $list_page;
        foreach ($list_page as $value) {
            if ($id ==$value['id']) {
                return $list_page[$id];
            }
        } return FALSE;



    }

    function get_info_cat ($cat_id='') {
        global $list_product_cat;
        if (array_key_exists($cat_id, $list_product_cat)) {
            $list_product_cat[$cat_id]['url'] = "?mod=product&act=main&cat_id={$cat_id}";

            return $list_product_cat[$cat_id];
        }
        return FALSE;
    }

    function get_list_product_by_cat_id ($cat_id) {
        global $list_product;
        $result = array(); //Array contain list of product by id

        foreach ($list_product as $item) {
            if ($item['cat_id']==$cat_id) {
                $item['url'] = "?mod=product&act=detail&id={$item['id']}";
                $result[] = $item;
            }
        }

        return $result; 
    }

    function get_product_by_id ($id) {
        global $list_product;
        if (array_key_exists($id, $list_product)) {
            $list_product[$id]['url_add_cart'] = "?mod=cart&act=add&id={$id}";
            $list_product[$id]['url'] = "?mod=product&act=detail&id={$id}";

            return $list_product[$id];
        }
        return FALSE;
    } 


    function add_cart ($id) {
        $item = get_product_by_id($id);
        if (isset($_SESSION['cart']['buy'])&&array_key_exists($id, $_SESSION['cart']['buy'])) {
                $quantity = $_POST['qty'];
                foreach ($quantity as $id => $qty) {
                    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
                    $_SESSION['cart']['buy'][$id]['sub_total'] = $qty*$_SESSION['cart']['buy'][$id]['price'];
                }

            }

    

        //Add array
        $_SESSION['cart']['buy'][$id] = array (
            'id' => $item['id'],
            'product_title' => $item['product_title'],
            'price' => $item['price'],
            'product_thumb' => $item['product_thumb'],
            'code' => $item['code'],
            'qty' => $qty,
            'url' => $item['url'],
            'sub_total' => $item['price']*$qty);
            update_info_cart();
            return $_SESSION['cart']['buy'][$id];
    }


    function update_info_cart () {
        //Total after add cart
        if (isset( $_SESSION['cart'])) {
        $num_order=0;
        $total =0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order+=$item['qty'];
            $total += $item['sub_total'];
        }

        // create an array
        $_SESSION['cart']['info'] = array (
            'num_order' =>   $num_order ,
            'total' =>$total

        );
    }
        
    }

    function get_list_buy_cart() {
        if (isset ($_SESSION['cart'])){
            foreach ($_SESSION['cart']['buy'] as &$item) {
                    $item['url_delete_cart'] = "?mod=cart&act=delete&id={$item['id']}";


            }
            return $_SESSION['cart']['buy'];
        }
        return FALSE;

    }
    function get_num_order_cart() {
        if (isset ($_SESSION['cart'])){
        return  $_SESSION['cart']['info']['num_order'];
        }
        return FALSE;
    }
    function get_total_cart() {
        if (isset ($_SESSION['cart'])){
            return  $_SESSION['cart']['info']['total'];
            }
            return FALSE;
        }

    function delete_cart ($id){
        #Delete product buy ID
        if (isset($_SESSION['cart'])){
        if (!empty($id)) {
            unset ($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
            unset ($_SESSION['cart']);


        }

    }

    }
    function update_cart () {
        if (isset($_POST['btn_update_cart'])) {
            $qty = $_POST['qty'];
            foreach ($qty as $id => $new_qty) {
                $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty*$_SESSION['cart']['buy'][$id]['price'];
            }

        }
        update_info_cart();


    }

    
?>