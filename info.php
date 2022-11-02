<html>
    <head>
        <style>
            body{
				font-family: arial;
			}
			
			.info{
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
            .info a{
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if($_SESSION['txtTK']=="admin"){
            ?>
            <div class="info">
            <table align="center">
                <tr><td><h1><a href="header-admin.php">Đến trang quản trị</a></h1></td></tr>
                <tr><td><h1><a href="changepassword.php">Đổi mật khẩu</a></h1></td></tr>
                <tr><td><h1><a href="logout.php">Đăng xuất</a><h1></h1></td></tr>
            </table>
    </div>
    <?php
        }
        else
        {
            ?>
<div class="info">
            <table align="center">
            
                <tr><td><h1><a href="changepassword.php">Đổi mật khẩu</a></h1></td></tr>
                <tr><td><h1><a href="logout.php">Đăng xuất</a><h1></h1></td></tr>
            </table>
    </div>
       <?php }
        ?>
    </body>
</html>