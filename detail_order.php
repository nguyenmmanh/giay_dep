<html>

<head>
    <style>
        .container {
            width: 1450px;
            margin: 0 auto;
            border: 5px solid #99FFCC;
            padding: 15px;
        }

        .row-total {
            background: white;
            color: #000;
        }

        
        .row {
            background: white;
            color: #000;
        }


        .product-button {
            float: right;
            border-left: 1px solid #99FFCC;
            border-right: 0;
            padding: 0 10px;
            width: 50px;
            text-align: center;
        }

        .h1 {
            display: flex;
            margin-top: 10px;
        }


        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px 10px;
        }

        
        table {
            border-collapse: collapse;
            width: 1170px;
        }

        table .img img {
            max-width: 100px;
        }

        table .name {
            width: 350px;
            padding-left: 20px;
        }

        table .img {
            width: 120px;
            text-align: center;
        }

        table .number {
            width: 50px;
            text-align: center;
        }

        table .price {
            width: 100px;
            text-align: center;
        }

        table .quantity {
            width: 60px;
            text-align: center;
        }

        table .money {
            width: 100px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!empty($_SESSION['txtTK'])) {
        $kn = mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
        mysqli_query($kn, "set names 'utf8'");
        $sql1 = "select * from hoadon where MaHD ='" . $_GET['MaHD'] . "'";
        $kq1 = mysqli_fetch_array(mysqli_query($kn, $sql1));
    ?>
        <div class="container">
            <a href="<?php if ($_SESSION['txtTK'] == "admin") $tb = "bill_admin.php";
                        else $tb = "bill.php";
                        echo $tb; ?>">Quay lại</a>
            <h1>Chi tiết đơn hàng</h1>
            <form id="cart-form" action="" method="POST">
                <table align="center">
                    <tr class="row">
                        <th class="number">STT</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="img">Ảnh sản phẩm</th>
                        <th class="price">Đơn giá</th>
                        <th class="quantity">Số Lượng</th>
                        <th class="money">Thành tiền</th>
                    </tr>
                    <?php
                    $num = 1;
                    $sql = "select * from cthd where MaHD ='" . $_GET['MaHD'] . "'";
                    $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
                    while ($row = mysqli_fetch_array($kq)) {
                        $masp = $row['MaSP'];
                        $sql2 = "select * from sanpham where MaSP='".$masp."'";
                        $kq2 = mysqli_fetch_array(mysqli_query($kn, $sql2));
                    ?>
                        <td class="number"><?= $num ?></td>
                        <td class="name"><?=$kq2['TenSP'] ?></td>
                        <td class="img"><img src="<?=$kq2['Anh'] ?>"></td>
                        <td class="price"><?=number_format($kq2['DonGia'], 0, ",", ".") ?></td>
                        <td class="quantity"><?=number_format($row['SoLuong'], 0, ",", ".") ?></td>
                        <td class="money"><?=number_format($row['ThanhTien'], 0, ",", ".") ?></td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>
                    <tr class="row-total">
                        <td class="name" colspan="5" align="right"><b>Ngày xuất</b></td>
                        <td class="date"><?= $kq1['NgayLap'] ?></td>
                    </tr>
                    <tr class="row-total">
                        <td class="name" colspan="5" align="right"><b>Trạng thái</b></td>
                        <td class="trangthai"><?= $kq1['TrangThai'] ?></td>
                    </tr>
                    <tr class="row-total">
                        <td class="name" colspan="5" align="right"><b>Tổng tiền</b></td>
                        <td class="money" colspan="3"><?= number_format($kq1['TongTien'], 0, ",", ".") ?></td>

                    </tr>
                </table>
            </form>
        </div>
    <?php } else {
        header('location: login.php');
    }
    ?>
</body>

</html>