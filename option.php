<?php
$kn = mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
mysqli_query($kn, "set names 'utf8'");
if(isset($_POST)){//tồn tại post bên trang bill admin 
    if(isset($_POST['duyet'])){
    $tt="Đã duyệt";
    }
    elseif (isset($_POST['huy'])) {
    $tt="Đã hủy";
    $sql="select * from cthd where MaHD='".$_GET['MaHD']."'";
    $kq=mysqli_query($kn,$sql) or die ("không thể thực hiện câu lệnh0");
  
   foreach($kq as $row1)
    {
        $sl=$row1['SoLuong'];
        $ma=$row1['MaSP'];
        $sql3="select * from sanpham where  MaSP = '".$ma."' ";
        $kq0=mysqli_query($kn,$sql3) or die ("không thể thực hiện câu lệnh2");
        $row3=mysqli_fetch_array($kq0);
               
    
               $slsp=$row3['SoLuong']+$sl;
               $sql1="UPDATE sanpham SET SoLuong='".$slsp."' WHERE MaSP = '".$ma."'";
               $kq=mysqli_query($kn,$sql1) or die ("không thể thực hiện câu lệnh1");   
    }
    
    }
    $sql = "update hoadon set TrangThai ='".$tt."' where MaHD='".$_GET['MaHD']."'";
    $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
    header('location:bill_admin.php');
}

?>