<html>
    <head>
        <style>
            body{
    font-family: arial;
    
    padding: 0;
    margin: 0 auto;
    font-size: 14px;
    width: 1450px;
}
.container{
    width: 1200px;
    margin: 0 auto;
    border: 3px ;
}
h1{
    text-align: center;
}


.clear-both{
    clear: both;
}

a{
    text-decoration: none;
}
.admin-heading-panel{
    margin: 0px auto;
    width: 1460px;
    background: #99FFCC;
    height: 50px;
    line-height: 50px;
    color: black;
    
}
.admin-heading-panel a{
    color: black;
}
.left-panel{
    float: left;
}
.left-panel span{
    color: white;
    font-weight: bold;
}
.right-panel{
    float: right;
}
.right-panel img{
    vertical-align: middle;
}
.right-panel a{
    margin-right: 10px;
}
.left-menu{
    float: left;
    width: 280px;
}
.content-wrapper .container .left-menu{
    border: 3px solid #99FFCC;
}
.content-wrapper .container{
    padding: 15px 0;
    
}
.menu-heading{
    background: #99FFCC;
    line-height: 20px;
    padding: 10px;
    color: black;
    border-radius: 10px 10px 0 0;
    font-size: 18px;
}
.menu-items ul{
    margin: 0;
    padding: 0;
}

.menu-items ul li{
    list-style: none;
    line-height: 30px;
    border-bottom: 1px dashed #99FFCC;
    padding-left: 15px;
}
.menu-items ul li a{
    color: #000;
}

        </style>
    </head>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <body>
    <div class="admin-heading-panel">
        <?php
        session_start();
        if(!empty($_SESSION['txtTK'])&& $_SESSION['txtTK']=="admin"){
            
            
            ?>
        
                    <div class="container">
                        <div class="left-panel">
                            Xin chào <span><?=$_SESSION['txtTK']?></span>
                        </div>
                        <div class="right-panel">
                            <a class="fa fa-home" href="index.php">Trang chủ</a>
                            <a class="fas fa-sign-out-alt" href="logout.php">Đăng xuất</a>
                        </div>
                    </div>
    </div>
                <div class="content-wrapper">
                    <div class="container">
                        <div class="left-menu">
                            <div class="menu-heading">Admin Menu</div>
                            <div class="menu-items">
                                <ul>
                                    <li><a href="product_listing.php">Sản phẩm</a></li>
                                    <li><a href="bill_admin.php">Đơn hàng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            }
            else {
                header('location:login.php');
            }

                ?>
    </body>
</html>