<div id="sidebar" class="fl-left">
            <div id="main-menu-wp">
                <ul class="list-item">
                    <li class="active">
                        
                    <a href="?mod=home" title="Home page">Home Page</a>
            </li>
            <li>
                <a href="?mod=page&act=detail&id=1" title="About">About</a>
            </li>
            <li>
                <a href="?mod=product&act=main&cat_id=2" title="">Herbal Product</a>
            </li>
            <li>
                <a href="?mod=product&act=main&cat_id=1" title="">Bird's Nest</a>
            </li>
            <li>
                <a href="?mod=page&act=detail&id=2" title="Contact">Contact</a>
                    </li>
                    <?php
                if (!is_login()){
                 ?>
            <li>
                <a href="../online_shopping_store/modules/login/main.php" title="" class = "btn_login">Login</a>
                    </li>
                <?php
                }
                    ?>
            <li>
                <a href="../online_shopping_store/modules/signup/main.php" title="Signup" class = "btn_signup">Signup</a>
                    </li>
                </ul>
            </div>
        </div>

        <style>
            a.btn_login, a.btn_signup{
                margin: 10px;
    background: black;
    opacity: 0.7;
    color: white!important;
}

        </style>
        