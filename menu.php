<html>

<head>
    <style>
        body {
            width: 100%;
            height: auto;
            margin: 0px;
            padding: 0px;
            margin-left: 5px;
            margin-right: 5px;
        }

        .menu {
            background-color: #99FFCC;
            width: 1460px;
            height: 40px;
            margin: 0px auto;
            
        }
        .menu > ul{
            display:flex;
            list-style:none;
           
        }
        .main-menu {
    position: relative;
    height: 40px;
    line-height: 20px;
}

    .main-menu .layer1 {
        display: flex;
        list-style: none;
        color: black;
        padding: 0 20px;
        margin-top: 10px;
        font-size: 20px;
        transform: scale(1);
        margin-left:140px;
        text-decoration: none;
    }
     

    .main-menu:hover .layer1 {
        color: white;
        transform: scale(1.4);
    }

    .main-menu .layer2{
   /* list-style: none;*/
    position:absolute;
    top: 20px;
    left: 0px;
    visibility: hidden;
    /*opacity: 0;*/
    /*transition: 0.4s;*/
    width: 200px;
    background-color: #99FFCC;
    margin-left: 140px;

}

.main-menu:hover .layer2{
    visibility: visible;
    opacity: 1;
    top:40px;
    
}
.main-menu .layer2 ul{
    list-style: none;
}
.main-menu .layer2 ul li{
    margin-left:-30px;
}
.main-menu .layer2 ul li a{
    display: block;
    width: 180px;
    box-sizing: border-box;
    text-align: center;
   font-size: 20px;
    font-family: segoe ui light;
    color: black;
    
    text-decoration:none;
}
    .main-menu .layer2 ul li a:hover {
        background: white;
        color: black;
    }

        
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "ThoiTrang") or die("Lỗi kết nối");
    mysqli_query($connect, "set names 'utf8'");
    $sqlconnect = "select * from loaihang";
    $result = mysqli_query($connect, $sqlconnect);
    ?>
    <div class="menu">
        <ul>
            <li>
                <div class="main-menu">
                    <a class="layer1" href="index.php" style="font-size: 23;"><i class="fa fa-home"></i> <b>Trang chủ</b></a>
                </div>
            </li>
            <li>
                <div class="main-menu">
                    <a class="layer1" href="#" style="font-size: 23;"><i class="fa fa-bars"></i> <b>Danh mục</b></a>
                    <div class="layer2">
                        <ul>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <li>
                                    <a href="index.php?MaHang=<?= $row['MaHang'] ?>"><?= $row['TenHang'] ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="main-menu">
                    <a class="layer1" href="#" style="font-size:23;"><i class="fas fa-play"></i> <b>Thống kê</b></a>
                    <div class="layer2">
                                <ul>
                                    
                                    <li><a href="index.php?ID=asc">Giá thấp đến cao</a></li>
                                    <li><a href="index.php?ID=desc">Giá cao đến thấp</a></li>
                                </ul>
                            </div>
                </div>
            </li>
            <li>
                <div class="main-menu">
                    <a class="layer1" href="bill.php" style="font-size:23;"><i class="fas fa-bicycle"></i> <b>Đơn hàng</b></a>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>