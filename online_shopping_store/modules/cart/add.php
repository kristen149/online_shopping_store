<?php
    #Get information of product that need to add
    
    $id = (int)$_GET['id'];
    $item = get_product_by_id($id);
    #Add more information to cart:
        //Quantity = 1

        add_cart($id);
        redirect('?mod=cart&act=show');

        
?>