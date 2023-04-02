<?php
if (isset($_POST['btn_update_cart'])) {


    update_cart();
    redirect ("?mod=cart&act=show");
}

?>