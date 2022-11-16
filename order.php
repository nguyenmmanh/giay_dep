<?php
session_start();
$kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
mysqli_query($kn,"set names 'utf8'");
$name=$_POST['name'];
$sdt=$_POST['phone'];
$diachi=$_POST['address'];
$taikhoan=$_SESSION['txtTK'];
$trangthai="Đang phê duyệt";
$ngayxuat=date('Y-m-d');
$tongtien=$_SESSION['tong'];
$sql="select * from giohang where UserName= '".$taikhoan."'";
$result = mysqli_query($kn, $sql) or die ("không thực hiện được câu lệnh 1");
$sql1="Delete from giohang";
mysqli_query($kn, $sql1) or die ("không thực hiện được câu lệnh ");
while($row=mysqli_fetch_array($result))
{
            $sql1="INSERT INTO hoadon(UserName,Ten,SDT,DiaChi,TrangThai,TongTien,NgayLap)
            VALUES ('".$taikhoan."','".$name."','".$sdt."','".$diachi."','".$trangthai."','".$tongtien."','".$ngayxuat."')";
            mysqli_query($kn, $sql1) or die ("không thực hiện được câu lệnh 3");              
            $sql2="select * from hoadon where MaHD=(Select MAX(MaHD) from hoadon) ";
            $row2=mysqli_fetch_array(mysqli_query($kn,$sql2));
            foreach($result as $row1)          
        {
            $mahd=$row2['MaHD'];
            $masp=$row1['MaSP'];
            $sl=$row1['SoLuong'];
            $tt=$row1['ThanhTien'];      
            $sql="INSERT INTO cthd(MaHD, MaSP, SoLuong, ThanhTien)
            VALUES ('".$mahd."','".$masp."','".$sl."','".$tt."')";
            mysqli_query($kn, $sql) or die ("không thực hiện được câu lệnh 2");            
         
            $sql3="select * from sanpham where  MaSP = '".$masp."' ";
            $kq0=mysqli_query($kn,$sql3) or die ("không thể thực hiện câu lệnh0");
           $row3=mysqli_fetch_array($kq0);           
           $slsp=$row3['SoLuong']-$row['SoLuong'];
           $sql1="UPDATE sanpham SET SoLuong='".$slsp."' WHERE MaSP = '".$masp."'";
           $kq=mysqli_query($kn,$sql1) or die ("không thể thực hiện câu lệnh1");                              
            $url="detail_order.php?MaHD=$mahd";            
            header('location:'.$url);
        }                       
}

?>
   