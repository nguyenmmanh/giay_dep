<html>
    <head>
        <style>
            body{
                font-family: arial;
                 padding: 0;
                 margin: 0;
                font-size: 14px; 
            }
    .main-content{
    float: left;
    width: 900px;
    margin-left: 20px;
}
.main-content h1{
    margin: 0;
    text-align: left;
    background: #99FFCC;
    color: black;
    font-size: 18px;
    font-weight: normal;
    line-height: 40px;
    border-radius: 10px 10px 0 0;
    padding: 0 10px;
}
.content-box{
    border: 1px solid #99FFCC;
    padding: 20px;
}
.box-content{
    margin: 0 auto;
    width: 800px;
    border: 1px solid #99FFCC;
    text-align: center;
    padding: 20px;
}
        </style>
    </head>
    <body>
    <?php
        include 'header-admin.php'; 
        ?>
        <div class="main-content">
            <h1>Xóa sản phẩm</h1>
            <div class="content-box">
                <?php
                $error=false;
                if(isset($_GET['MaSP'])&& !empty($_GET['MaSP'])){
                $connect=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
                mysqli_query($connect,"set names 'utf8'");
                $kq=mysqli_query($connect,"delete from sanpham where MaSP='".$_GET['MaSP']."'");
                if(!$kq)
                {
                    $error="Không thể xóa sản phẩm.";
                }
                mysqli_close($connect);
                if($error!==false){
                    ?>
                    <div class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?=$error?></h4>
                        <a href="product_listing.php">Danh sách sản phẩm</a>
                    </div>
                <?php }
                else{
                    ?>
                    <div class="box-content">
                        <h2>Xóa sản phẩm thành công</h2>
                        <a href="product_listing.php">Danh sách sản phẩm</a>
                    </div>
                <?php } ?>
                <?php }
                ?>
            </div>
        </div>
    </body>
</html>