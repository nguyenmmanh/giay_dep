<html>
	<head>
		<meta charset="utf8">
		<title>Đăng nhập</title>
		<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
		<style>
			body{
				font-family: arial;
			}
			
			.login{
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
			.login input{
				border-radius: 5px;
				border: 1px solid #99FFCC;
				width:210px ;
    			height: 25px
			}
			.home-user{
				text-align: center;
			}

			
		</style>
	</head>
	<body>
		<div class="login">
	<table align="center">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form1">
				<tr><td colspan="2" align="center"><h1>Thông tin đăng nhập</h1></td></tr>
				<tr><td ><i class="fa fa-user"></i></td><td><input type="text" name="txtTK" placeholder="Tên đăng nhập"></td></tr>
				<tr><td ><i class="fas fa-key"></i></td><td><input type="password" name="txtMK" placeholder="Mật khẩu"></td></tr>
				<tr><td></td><td><input type="submit" value="Đăng nhập"></td></tr>
				<tr><td colspan="2" align="center">Bạn chưa có tài khoản?<a href="signin.php">Đăng kí ngay</a></td></tr>
			</form>
		</table>
		<div class="clear-both"></div>
		<?php
		session_start();
		if(isset($_POST['txtTK'])&&isset($_POST['txtMK']))
		{
$tendn=$_POST['txtTK'];
$matkhaudn=$_POST['txtMK'];
$kn=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
mysqli_query($kn,"set names 'utf8'");
$caulenh="select * from dangnhap where UserName='".$tendn."'";
$ketqua=mysqli_query($kn,$caulenh) or die("Không thực hiện được câu lệnh");
$tb="";
if ($dong=mysqli_fetch_array($ketqua))//có kết quả trả về
{
	$gt=$dong['Password'];
	if($gt==$matkhaudn)
	{
		//$tb="Đăng nhập thành công";
		$_SESSION['txtTK']=$tendn;
		if($tendn=="admin")
		{
			echo header('location:header-admin.php') ;
		}
		else
		{
			echo header('location:index.php') ;
		}
	}
	else
		$tb="Nhập sai mật khẩu";
}
else
	$tb="Tên tài khoản chưa tồn tại";
echo "<b><i>".$tb."</i></b>";
mysqli_free_result($ketqua);
//đóng kết nối
mysqli_close($kn);
		}
?>
</div>
	</body>
</html>