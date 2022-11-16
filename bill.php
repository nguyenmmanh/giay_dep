<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
    font-family: arial;
   /* border: 5px solid #99FFCC;*/
    width: 1300px;
    height: 650px;
}

*{
    box-sizing: border-box;
}
.container{
    width: 1450px;
    margin: 0 auto;
    border: 5px solid #99FFCC;
    padding: 15px;
}

.row-total{
    background: white;
    color: #000;
}

.row{
    background:#99FFCC;
    color:#000;
}

.h1{
    display: flex;
    margin-top: 10px;
}
table{
    width: 1200px;
}
table, td,th{
    border: 1px solid black;
    border-collapse: collapse;
}
table{
    border-collapse: collapse;
    width: 870px;
}
table, th, td {
    border: 1px solid black;
}
table .number{
    width: 50px;
    padding-left: 20px;
}
table .id{
    width: 120px;
    text-align: center;
}
table .date{
    width: 50px;
    text-align: center;
}
table .status{
    width: 100px;
    text-align: center;
}
table .price{
    width: 60px;
    text-align: center;
}
table .detail{
    width: 100px;
    text-align: center;
}
</style>
<body>
<?php
session_start();
if(!empty($_SESSION['txtTK'])){
$kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
mysqli_query($kn,"set names 'utf8'");
$sql="select * from hoadon where UserName='".$_SESSION['txtTK']."' ";
$kq=mysqli_query($kn,$sql) or die ("khong thuc hien được");
?>
<div class="container">
                   
                   <a href="index.php">Trang chủ</a>
                   <h1>Đơn hàng</h1>
                   <table align="center">
                       <tr class="row">
                           <th class="number">STT</th>
                           <th class="id">Mã HD</th>
                           <th class="date">Ngày xuất</th>
                           <th class="status">Trạng thái</th>
                           <th class="price">Tổng tiền</th>
                           <th class="detail">Xem chi tiết</th>
                       </tr>
                       <?php
                   $num =1;
                  
                      while($row=mysqli_fetch_array($kq))
                      {
                        ?> <tr>
                        <td class="number"><?=$num?></td>
                        <td class="id"><?=$row['MaHD']?></td>
                        <td class="date"><?=$row['NgayLap']?></td>
                        <td class="status"><?=$row['TrangThai']?></td>
                        <td class="price"><?=number_format($row['TongTien'], 0, ",", ".")?></td>
                        <td class="detail"><a href="detail_order.php?MaHD=<?=$row['MaHD']?>">Xem chi tiết</a></td>
                       
                </tr>
                <?php
                $num++;
              
                      }
                     ?>
                      </table>
                      <?php
                    }
                    else
    {
        header('location: login.php');
    }
                  ?>
                   
                  
              
           </div>
</body>
</html>
