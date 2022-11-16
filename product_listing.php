<html>
    <head>
        <style>
            body{
                font-family: arial;
                 padding: 0;
                 margin: 0;
                font-size: 14px; 
            }
            h1{
            text-align: center;
            } 
            .product-items{
    padding: 10px;
    border: 1px solid #99FFCC;
    border-radius: 0 0 10px 10px;
}

.product-items ul{
    padding: 0;
    margin: 0;
}
.product-prop{
    float: right;
    border-left: 1px solid #99FFCC;
    line-height: 90px;
    padding: 0 10px;
}
.product-img{
    width: 110px;
    height: 90px;
    float: left;
}
.product-img img{
    width: 100px;
    padding: 5px;
    height: 80px;
}
.product-name{
    padding-left: 10px;
    border-right: 0;
    float: left;
    width: 170px;
}
.product-button{
    float: right;
    border-left: 1px solid #99FFCC;
    border-right: 0;
    padding: 0 10px;
    width: 50px;
    text-align: center;
}
.clear-both{
    clear: both;
}
.product-items ul li{
    list-style: none;
    border: 1px solid #99FFCC;
    border-top: 0;
    border-left: 0;
}
.product-items ul li:first-child{
    border: 1px solid #99FFCC;
}
.product-item-heading{
    text-align: center;
    font-weight: bold;
    background: #99FFCC;

}
.product-item-heading .product-prop{
    height: 40px;
    line-height: 40px;
    background: #99FFCC;
    color: black;
}
.buttons{
    text-align: right;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 15px;
    line-height: 38px;
}
.buttons a{
    color: black;
    padding: 10px;
    background: #99FFCC;
}
a{
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
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
.page{
    padding: 20px;
    vertical-align: middle;

}
.page-item{
            border: 1px solid #99FFCC;
            padding: 10px;
            margin-right: 5px;
            margin-left: 5px;
            color: black;
        }
        </style>
    </head>
    <body>
        <?php
        include 'header-admin.php';
        $sodong= 4;
	if(isset($_GET['trang']))
	{
		$trangchon=$_GET['trang'];
	}
		else
	{
			$trangchon=0;
	}
        $connect=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
        mysqli_query($connect,"set names 'utf8'");
        $sqlconnect="select * from sanpham ";
        $product=mysqli_query($connect,$sqlconnect);
        $sodongdl=mysqli_num_rows($product);
	    $sotrangdl=$sodongdl/$sodong;
	    $vtbd=$trangchon*$sodong;
	    $ltvtrang="select * from sanpham limit {$vtbd},{$sodong}";
	    $kqpt=mysqli_query($connect,$ltvtrang);
        ?>
                
                <div class=main-content>
                    <h1>Danh sách sản phẩm</h1>
                    <div class="product-items">
                        <div class="buttons">
                            <a href="product_adding.php">Thêm sản phẩm</a>
                        </div>
                        <ul>
                            <li class="product-item-heading">
                                <div class="product-prop product-img">Ảnh</div>
                                <div class="product-prop product-name">Tên sản phẩm</div>
                                <div class="product-prop product-button">Xóa</div>
                                <div class="product-prop product-button">Sửa</div>
                                <div class="clear-both"></div>
                            </li>
                            <?php 
                            while($row=mysqli_fetch_array($kqpt))
                            {
                                ?>
                                <li>
                                    <div class="product-prop product-img"><img src="<?= $row['Anh'] ?> " alt="<?= $row['TenSP'] ?>" title="<?= $row['TenSP']?>"/></div>
                                    <div class="product-prop product-name"><?=$row['TenSP']?></div>
                                <div class="product-prop product-button">
                                    <a href="product_deleting.php?MaSP=<?=$row['MaSP']?>">Xóa</a></div>
                                <div class="product-prop product-button">
                                    <a href="product_editing.php?MaSP=<?=$row['MaSP']?>">Sửa</a></div>
                                <div class="clear-both"></div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="clear-both"></div>
                        <div class="page">
                        <?php 
    for($page=0;$page<=$sotrangdl;$page++)
	{
		echo "<a class='page-item' href='product_listing.php?trang=$page'>$page</a>";
	}
	echo"</p>";
    ?>
                        </div>
                        <div class='clear-both'></div>
                    </div>
                </div>
                
    </body>
</html>