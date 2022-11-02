<html>
    <head>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <style>
        body{
    font-family: arial;
        }

*{
    box-sizing: border-box;
}
.container{
    width: 1450px;
    margin: 0 auto;
    height: 80%;
    padding: 15px;
    border:5px solid #99FFCC;
    
}
h1{
    text-align: left;
    margin-top: 0;
}

.product-detail{
    border-top: 5px solid #99FFCC;
    padding: 15px 0 0 0;
}
.product-image{
    width: 30%;
    float: left;
    margin-left: 150px;

}
.product-info{
    float: right;
    width: 50%;
    text-align: left;
    padding-left: 30px;
 
    
}
.product-price{
    color:red;
    font-weight: bold;
}

.product-image img{
    max-width: 100%;
    padding: 5px;
    border: 3px solid #99FFCC;
    background-color: white;
}
label.add-to-cart{
    background: black;
    border: 1px solid #000;
    margin-top: 15px;
    padding: 15px;
    display: inline-block;
    color: #fff;
}
label a{
    color: #FFF;
}
.gallery{
    margin-top: 10px;
}
.gallery ul{
    margin: 0;
    padding: 0;
}
.gallery ul li{
    width: 150px;
    float: left;
    list-style: none;
    margin-right: 5px;
    margin-bottom: 5px;
    height: 100px;
    text-align: center;
    padding: 5px;
    border: 1px solid #99FFCC;
    background: white;
}
.gallery ul li img{
    max-width: 100%;
    max-height: 100%;
    vertical-align: middle;
}



    </style>
    </head>
    <body>
        
        <?php 
            
            $id=$_GET['MaSP'];
            $connect=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
            mysqli_query($connect,"set names 'utf8'");
            $sql="select * from sanpham where MaSP='".$id."'";
            $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh");
            $product=mysqli_fetch_array($kq) ;
            
        ?>
        <div class="container">
        <a class="fa fa-home" href="index.php">Trang chủ</a>
            <h2>Chi tiết sản phẩm</h2>
            <div class="product-detail">
                <div class="product-image">
                    <img src="<?=$product['Anh']?>"/>
                </div>
                <div class="product-info" >
                    <h1><?=$product['TenSP']?></h1>
                    <label>Giá: </label><span class="product-price"><?= number_format($product['DonGia'],0,",",".")?> VND</span><br/>
                   <form id="add-to-cart-form" action="add_cart.php?MaSP=<?=$product['MaSP']?>" method="post">
                      
                        <?php
                        if($product['SoLuong']=='0' && $product['MaSP'])
                        {
                           echo '<input type="text" value="Hết hàng" name="quantity" disabled="disabled"/><br/>' ;  
                           
                        }
                        else
                        {
                            echo '<input type="text" value="1" name="quantity" /><br/> <input style="margin-top:10px" type="submit" value="Thêm vào giỏ hàng" />';
                            
                        }

                        ?>
                       
                   </form>
                    <label><?=$product['ThongTin']?></label>
                    </div>
                   
                </div>
                
        </div>
        
    </body>
</html>