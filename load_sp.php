<html>

<head>
    <style>
        body {
            font-family: arial;
        }

        .container {
            width: 1450px;
            margin: 0 auto;
            border: 5px solid #99FFCC;
            border-top: 0px;
        }

        h1 {
            text-align: center;
        }

        .product-items {
            padding: 30px;
        }

        .product-item {
            float: left;
            width: 23%;
            margin: 1%;
            padding: 10px;
            box-sizing: border-box;
            border: 4px solid #99FFCC;
            line-height: 26px;
        }

        .product-price {
            color: red;
            font-weight: bold;
        }

        .product-img {
            padding: 5px;
            border: 4px solid #99FFCC;
            margin-bottom: 5px;
        }

        .product-item img {
            max-width: 100%;
        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        .buy-button {
            text-align: right;
            margin-top: 10px;
        }

        .buy-button a {
            background: #444;
            padding: 5px;
            color: #fff;
        }

        .page-item {
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

    $sodong = 8;
    if (isset($_GET['trang'])) {
        $trangchon = $_GET['trang'];
    } else {
        $trangchon = 0;
    }
    $connect = mysqli_connect("localhost", "root", "", "ThoiTrang") or die("Lỗi kết nối");
    mysqli_query($connect, "set names 'utf8'");
    if (isset($_POST['submit']) && isset($_POST['search'])) {
        $sqlconnect = "select * from sanpham where TenSP like '%" . $_POST['search'] . "%'";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham where TenSP like '%" . $_POST['search'] . "%' limit {$vtbd},{$sodong} ";
        $kqpt = mysqli_query($connect, $ltvtrang);
    } else if (isset($_GET['ID'])) {
        if ($_GET['ID'] == "asc") {
            $sqlconnect = "select * from sanpham order by DonGia ASC";
            // ASC tăng dần
            // truy vấn dữ liệu sắp xếp 
            $kq = mysqli_query($connect, $sqlconnect);
            $sodongdl = mysqli_num_rows($kq);
            // kêt quả trả về
            $sotrangdl = $sodongdl / $sodong;
            $vtbd = $trangchon * $sodong;
            $ltvtrang = "select * from sanpham order by DonGia ASC  limit {$vtbd},{$sodong}";
            $kqpt = mysqli_query($connect, $ltvtrang);
        } else {
            $sqlconnect = "select * from sanpham order by DonGia DESC";
            // DESC giam dần
            $kq = mysqli_query($connect, $sqlconnect);
            $sodongdl = mysqli_num_rows($kq);
            $sotrangdl = $sodongdl / $sodong;
            $vtbd = $trangchon * $sodong;
            $ltvtrang = "select * from sanpham order by DonGia DESC  limit {$vtbd},{$sodong}";
            $kqpt = mysqli_query($connect, $ltvtrang);
        }
    } else if (isset($_GET['MaHang'])) {
        $sqlconnect = "select * from sanpham where MaHang='" . $_GET['MaHang'] . "'";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham where MaHang='" . $_GET['MaHang'] . "' limit {$vtbd},{$sodong} ";
        $kqpt = mysqli_query($connect, $ltvtrang);
    } else {
        $sqlconnect = "select * from sanpham";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham limit {$vtbd},{$sodong}";
        $kqpt = mysqli_query($connect, $ltvtrang);
    }

    ?>
    <div class="container">
        <div class="product-items">
            <?php
            while ($row = mysqli_fetch_array($kqpt)) {
            ?>
                <div class="product-item">
                    <div class="product-img">

                        <img src="<?= $row['Anh'] ?>" title="<?= $row['TenSP'] ?>" />
                    </div>
                    <div class="product-name"><a href="detail.php?MaSP=<?= $row['MaSP'] ?>"><?= $row['TenSP'] ?></a></div>
                    <div class="product-price">Giá: <?= number_format($row['DonGia'], 0, ",", ".") ?> VNĐ</div>
                    <div class="buy-button">
                        <a href="detail.php?MaSP=<?= $row['MaSP'] ?>">Xem chi tiết</a>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="clear-both"></div>
        </div>
        <?php
        for ($page = 0; $page <= $sotrangdl; $page++) {
            echo "<a class='page-item' href='index.php?trang=$page'>$page</a>";
        }
        echo "</p>";
        ?>
    </div>

</body>

</html>