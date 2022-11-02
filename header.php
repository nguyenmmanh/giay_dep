
<html>
    <head>
        <style>
           body{
    width: 100%;
    height: auto;
    
}
.header{
    border:5px solid #99FFCC;
    width: 1450px;
    margin: 0 auto;
            
    
}
.header > div {
    list-style: none;
   margin-bottom: auto;
   margin-left: 70px;
   list-style: none;
   display: inline-block;
   margin-right: 170px;
   vertical-align: middle;

}
.header > div  a{
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    color: black;
}
.header > div > li{
    display: inline-block;
    margin-right: 30px;
}
.logo > img{
    padding-left: 70px;
    padding-top: 20px;

}
.search{
    height: 42px;
    width: 260px;
    border-radius: 15px;
    border:1px solid #99FFCC;
}

.search input[type=text]{
    margin-left: 7px;
    border: none;
    outline: none;
}
.search  input[type=submit]{
    
    background: url(image/images.png) center center no-repeat;
    background-size: 22px 22px;
    height: 22px;
    width: 22px;
    border: none;
    cursor: pointer;
    margin-left: 40px;
    margin-top: 5px;
}
.other > li > a{
    padding-right: 15px;
}
        </style>
    </head>
    <body>
        <?php
        if(!isset($_SESSION)) { 
            session_start(); 
          }
        $kn=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
        mysqli_query($kn,"set names 'utf8'");
        if(!empty($_SESSION['txtTK'])){
        ?>
   <div class="header">
            <div class="logo">
                    <a href="index.php">
                        <img src="image/TNLs.png">
                    </a>
                </div>
                <div class="search">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" name="form" enctype="multipart/form-data">
                        <input type="text" placeholder="Tìm kiếm..." name="search">
                        <input type="submit" name="submit" value="" title="Tìm"></a>
                </form>
                </div>
                <div class="other">
                    <li>
                        <a class="fa fa-user" href="info.php">Xin chào <?php if (isset($_SESSION['txtTK'])) echo $_SESSION['txtTK']?></a>
                    </li>
                    <li>
                        <a class="fa fa-shopping-cart" href="cart.php"></a>
                        <?php 
                            if(isset($_SESSION['txtTK']))
                            {
                                $ten=$_SESSION['txtTK'];
                                $sql ="select * from giohang where UserName = '$ten'";
                                $kq=mysqli_query($kn,$sql);
                                $kq1=mysqli_num_rows($kq);
                                echo "(".$kq1.")";
                            }
                            ?>
                    </li>
                </div>
    </div>
    <?php }
    else {
        ?>
    <div class="header">
            <div class="logo">
                    <a href="index.php">
                        <img src="image/TNLs.png">
                    </a>
                </div>
                <div class="search">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" name="form" enctype="multipart/form-data">
                        <input type="text" placeholder="Tìm kiếm..." name="search">
                        <input type="submit" name="submit" value="" title="Tìm"></a>
                </form>
                </div>
                <div class="other">
                    <li>
                        <a class="fa fa-user" href="login.php">Đăng nhập/Đăng ký</a>
                    </li>
                    <li>
                        <a class="fa fa-shopping-cart" href="login.php"></a>
                    </li>
                </div>
    </div>
    <?php 
    }
    ?>

    </body>
    </html>
 