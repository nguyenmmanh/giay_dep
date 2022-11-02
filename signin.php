<html>
	<head><meta charset="utf8">
	<title>Đăng ký</title>
	<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
	<style>
			body{
				font-family: arial;
			}
			
			.signin{
			width: 900px;
            margin: 0 auto;
            border: 5px solid #99FFCC;
			vertical-align: middle;
			padding-top: 80px;
			padding-bottom: 80px;
			}
			.h1{
			text-align: center;
			}
			.signin input{
				border-radius: 5px;
				border: 1px solid #99FFCC;
				width:210px ;
    			height: 25px
			}

			
		</style>
	</head>
	<body>
		<div class="signin">
	<table align="center">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<tr><td colspan="2" align="center"><h1>Thông tin đăng ký</h1></td></tr>
	<tr><td><i class="fa fa-user"></i></td><td><input type="text" name="SID" placeholder="Nhập tên đăng nhập"></td></tr>
	<tr><td><i class="fas fa-key"></td><td><input type="password" name="pass" placeholder="Nhập mật khẩu"></td></tr>
	<tr><td><i class="fas fa-key"></td><td><input type="password" name="repass" placeholder="Nhập lại mật khẩu"></td></tr>
	<tr><td><i class="fas fa-envelope"></td><td><input type="text" name="mail" placeholder="Nhập email"></td></tr>
	<tr><td></td><td><input type="submit" name="sm" value="Đăng ký"></td></tr>
	<tr><td colspan="2" align="center"><a href='login.php'>Quay lại trang đăng nhập</a><br/></td></tr>
	</form>
	</table>

	<?php
	if(isset($_POST['SID'])&&isset($_POST['pass'])&&isset($_POST['repass'])&&isset($_POST['mail']))
	{
		//lấy dữ liệu từ form lên server
		$tendn=$_POST['SID'];
		$matkhau=$_POST['pass'];
		$rematkhau=$_POST['repass'];
		$email=$_POST['mail'];
		$kn=$kn=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
		mysqli_query($kn,"set names 'utf8'");
		$gc="";
		$tb="";
				$cl="insert into dangnhap(UserName,Password,DiaChiEmail,Ghichu) values('".$tendn."','".$matkhau."','".$email."','".$gc."')";
		if($matkhau!=$rematkhau)
		{
			$tb="Nhập mật khẩu không đúng";
		}
		else
		{
		//kiểm tra mã  đã có chưa
		$clkt="select * from dangnhap where UserName='".$tendn."'";
		$kq=mysqli_query($kn,$clkt);
		if($dong=mysqli_fetch_array($kq))
		{
			$tb="Tên đã có.";
		}
		else
		{
		//thêm dữ liệu đăng ký vào bảng
		$ketqua=mysqli_query($kn,$cl) or die("Không thực hiện được câu lệnh");
		if($ketqua)
		{
			header('location:login.php');
		}
		else
		{
			$tb="Đăng ký không thành công";
		}
		}
	}
	echo "<b><i>".$tb."</i></b>";
	//mysqli_free_result($ketqua);
	//đóng kết nối
	mysqli_close($kn);
	}
	?>
	
	</div>
	</body>
</html>