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
  
    }
    $sql = "update hoadon set TrangThai ='".$tt."' where MaHD='".$_GET['MaHD']."'";
    $kq = mysqli_query($kn, $sql) or die("khong thuc hien được");
    header('location:bill_admin.php');
}

?>