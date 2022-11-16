<?php
if(isset($_GET['id']))
{
    $ma=$_GET['id'];
    session_start();
    $tendn=$_SESSION['txtTK'];
    $connect=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
    mysqli_query($connect,"set names 'utf8'");
    $sql1="select * from giohang where UserName= '".$tendn."' and MaSP = '".$ma."' ";
    $result1 = mysqli_query($connect, $sql1) or die ("không thực hiện được câu lệnh 0");
    $row1= mysqli_fetch_array($result1);     
    $sql="Delete from giohang where UserName='".$tendn."' and MaSP='".$ma."'";  
    $result = mysqli_query($connect, $sql) or die ("không thực hiện được câu lệnh 2");
    header('location:cart.php');
}

?>