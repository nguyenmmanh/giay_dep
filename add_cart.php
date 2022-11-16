<?php
 session_start();
        if(isset($_POST['soluong']) && isset($_SESSION['txtTK']) && isset($_GET['MaSP']))
        {
            $id=$_GET['MaSP'];           
            $connect=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
            mysqli_query($connect,"set names 'utf8'");
            $sql="select * from sanpham where MaSP='".$id."'";
            $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh1");
            $product=mysqli_fetch_array($kq);
            $sl=$_POST['soluong'];
            $tendn =$_SESSION['txtTK'];
            $sql1="select * from giohang where UserName= '".$tendn."' and MaSP = '".$id."' ";
            $kq1=mysqli_query($connect,$sql1) or die ("không thể thực hiện câu lệnh2");
            $row=mysqli_fetch_array($kq1);
            if($row==null)
            {
              $thanhtien = 0;
              $thanhtien = $sl*$product['DonGia'];             
                $sql="INSERT INTO giohang(UserName, MaSP, SoLuong, ThanhTien) VALUES ('".$tendn."','".$id."','".$sl."','".$thanhtien."')";
                $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh3");
                header('location:cart.php');
            }
            else
            {
                $thanhtien = 0;
                $thanhtien = $sl*$product['DonGia'];
               
                $sql= "UPDATE giohang SET SoLuong='".$sl."',ThanhTien='".$thanhtien."' WHERE UserName= '".$tendn."' and MaSP = '".$id."'";
                $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh4");
                header('location:cart.php');
            }

        }
        else{
            echo header('location:login.php') ;
        } 
        ?>