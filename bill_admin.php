
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
            .main-content{
                float: left;
    width: 1000px;
    margin-left: 20px;
}
.row{
    background:#99FFCC;
    color:#000;
}

td,th{
    padding: 6px 10px;
}
input[type="submit"] {
    margin-left: 10px;
    margin-top: 10px;
    background: #99FFCC;
}
table{
    border-collapse: collapse;
    width: 900px;
    margin-top: 50px;
}
table, th, td {
    border: 1px solid black;
}

table .id{
    width: 100px;
    padding-left: 20px;
}
table .date{
    width: 120px;
    text-align: center;
}
table .number{
    width: 50px;
    text-align: center;
}
table .status{
    width: 100px;
    text-align: center;
}
select#hd {
    margin-left: 300px;
}
.bill-items{
    padding: 10px;
    border: 1px solid #99FFCC;
    border-radius: 0 0 10px 10px;
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
        </style>
    </head>
    <body>
    <?php
    include 'header-admin.php';
    ?>
    <?php
    $kn = mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
    mysqli_query($kn, "set names 'utf8'");
    $sql = "select * from hoadon ";
    $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
    ?>
    <div class="main-content">

        <h1>Chi tiết đơn hàng</h1>
        <div class="bill-items">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <select id="hd" name="hoadon" class="btn btn-success">
                <option value="1">Tất Cả Hóa Đơn</option>
                <option value="Đang phê duyệt">Hóa Đơn Đang Duyệt</option>
                <option value="Đã duyệt">Hóa Đơn Đã Duyệt</option>
                <option value="Đã hủy">Hóa Đơn Đã Hủy</option>
            </select>
    <input type="submit" name="submit" value="Xem hóa đơn">
        </form>

        <table align="center">

            <tr class="row">
                <th class="number">STT</th>
                <th class="id">Mã HD</th>
                <th class="date">Ngày xuất</th>
                <th class="status">Trạng thái</th>
                <th class="total">Tổng tiền</th>
                <th class="option">Tùy chỉnh</th>
                <th class="option">Tùy chỉnh</th>
                <th class="detail">Xem chi tiết</th>

            </tr>

            <?php
            
            if (isset($_POST['submit'])) {
                if ($_POST['hoadon'] == "1") {
                    $sql = "select * from hoadon "; 
                } else {
                    $sql = "select * from hoadon where TrangThai='" . $_POST['hoadon'] . "' "; 
                }
                $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
                $num = 1;

                while($row=mysqli_fetch_array($kq)) {
                    ?><tr>
                        <td class="number"><?=$num?></td>
                        <td class="name"><?= $row['MaHD']?></td>
                        <td class="img"><?=$row['NgayLap']?></td>
                        <td class="price"><?=$row['TrangThai']?></td>
                        <td class="quantity"><?=number_format($row['TongTien'], 0, ",", ".")?></td>
                        
                        <form action="option.php?MaHD=<?=$row['MaHD']?>" method="POST" enctype="multipart/form-data">
                        <td class="option"><input type="submit" name="duyet" value="Duyệt đơn"></td>
                        <td class="option"> <input type="submit" name="huy" value="Hủy đơn"></td></form>
                        <td class="detail"><a href="detail_order.php?MaHD=<?=$row['MaHD']?>">Xem chi tiết</a></td>

                       
                </tr>
                <?php
                    $num++;
                    
                }
            } else {
                $num = 1;
                
                $sql = "select * from hoadon ";
                $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
                while($row=mysqli_fetch_array($kq)) {
                    ?><tr>
                        <td class="number"><?=$num?></td>
                        <td class="name"><?= $row['MaHD']?></td>
                        <td class="img"><?=$row['NgayLap']?></td>
                        <td class="price"><?=$row['TrangThai']?></td>
                        <td class="quantity"><?=number_format($row['TongTien'], 0, ",", ".") ?></td>
                        <form action="option.php?MaHD=<?=$row['MaHD']?>" method="POST" enctype="multipart/form-data">
                        <td class="option"><input type="submit" name="duyet" value="Duyệt đơn"></td>
                        <td class="option"> <input type="submit" name="huy" value="Hủy đơn"></td></form>
                        <td class="detail"><a href="detail_order.php?MaHD=<?=$row['MaHD']?>">Xem chi tiết</a></td>
                </tr>
                <?php
                    $num++;
                }
            }
            ?>

        </table>
        </div>
    </div>
    </body>
</html>
