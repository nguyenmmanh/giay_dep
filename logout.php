<html>
    <head>
        <style>
            .user-logout{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px; 
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['txtTK']);
        ?>
        <div class="user-logout">
            <h1>Đăng xuất tài khoản thành công</h1>
            <a href="index.php">Đăng nhập lại</a>
        </div>
    </body>
</html>