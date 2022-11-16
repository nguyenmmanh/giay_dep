<html>
    <head>
<style>
    body{
    font-family: arial;
    padding: 0;
    margin: 0;
    font-size: 14px;
}
h1{
    text-align: center;
}
.main-content{
    float: left;
    width: 900px;
    margin-left: 20px;
}
.main-content h1{
    margin: 0;
    text-align: left;
    background: #99FFCC;
    color: black;
    font-size: 18px;
    font-weight: normal;
    line-height: 40px;
    border-radius: 10px 10px 0 0;
    padding: 0 10px;
}
.content-box{
    border: 1px solid #99FFCC;
    padding: 20px;
}

.product-form input {
    margin-bottom: 10px;
    line-height: 32px;
    border-radius: 5px;
	border: 1px solid #99FFCC;
	width:500px ;
    height: 25px
}
.product-form select{
    margin-bottom: 10px;
    line-height: 32px;
    border-radius: 5px;
	border: 1px solid #99FFCC;
	width:500px ;
    height: 25px
} 

.product-form textarea {
    width: 500px;
    border: 1px solid #99FFCC;
    height: 200px;
}
.product-form input[type=file] {
border: none;
width: 500px;
height: 40px;
}
.product-form input[type=submit] {
    float: right;
    background: url('image/save.png') center center no-repeat;
    background-size: 40px 40px;
    height: 40px;
    width: 40px;
    border: 0;
    cursor: pointer;
}
.product-form img{
    width: 100px;
    padding: 5px;
    height: 80px;
}
.box-content{
    margin: 0 auto;
    width: 800px;
    border: 1px solid #99FFCC;
    text-align: center;
    padding: 20px;
}

</style>
    </head>
    <body>
        <?php
        include 'header-admin.php'; 
        ?>
        <div class="main-content">
            <h1>Sửa sản phẩm</h1>
            <div class="content-box">
                <?php
                
                $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
                mysqli_query($kn,"set names 'utf8'");
                //if(!isset($_POST['submit'])){
                $kq=mysqli_query($kn,"select * from sanpham where MaSP='".$_GET['MaSP']."'") or die ("Không thể thực hiện câu lệnh 1");
                $product=mysqli_fetch_array($kq);
                //}
                //$hl=mysqli_query($kn,"select * loaithang where MaHang='".$product['']."'")
                if(isset($_POST['submit'])){
                    //if (&&isset($_POST['name'])&&isset($_POST['type'])&&isset($_POST['price'])&&isset($_POST['number'])&&isset($_POST['content'])) {
                        $name=$_POST['name'];
                        $type=$_POST['type'];
                        $price= $_POST['price'];
                        $number=$_POST['number'];
                        $content=$_POST['content'] ;
                        $tenfile=$_FILES['image']['name'];
                        $thumuc="image"."/".$tenfile;
                       
                        $sql="UPDATE sanpham SET TenSP = '" .$name. "',MaHang = '" .$type. "', DonGia = '".$price."',SoLuong =  '" .$number."',Anh =  '" . $thumuc . "', ThongTin = '".$content. "' WHERE MaSP ='".$_GET['MaSP']."'";
                        $result = mysqli_query($kn, $sql) or die ("không thực hiện được câu lệnh");
                        move_uploaded_file($_FILES['image']['tmp_name'],$thumuc);
                        $tb="";
                        if($result){
                            ?>
                            <div class="box-content">
                                <h2><?php $tb= "Sửa sản phẩm thành công" ; echo $tb?></h2>
                                <a href="product_listing.php">Danh sách sản phẩm</a>
                            </div>
                        <?php }
                        else{
                            ?>
                            <div class="box-content">
                                <h2><?php $tb="Sửa sản phẩm không thành công" ; echo $tb?></h2>
                                <a href="product_listing.php">Danh sách sản phẩm</a>
                            </div>
                        <?php } ?>
                    <?php    }
                    if(empty($tb)) {
                     ?>      
                <div class="product-form">
                <table align="center">
                <form method="POST" action="" name="form" enctype="multipart/form-data">   
                    <tr><td colspan="2" align="right"><input type="submit" name="submit" title="Lưu sản phẩm" value=""/></td></tr>
                    <tr><td><div class="clear-both"></div></td></tr>
                    <tr>
                        <td><label>Tên sản phẩm: </label></td>
                        <td><input type="text" name="name" value="<?=$product['TenSP']?>"/></td>
                        
                    </tr>
                    <tr>
                        <td><label>Loại sản phẩm:</label></td>
                        <td><select name="type">
                            <option value="1">Giày Nam</option>
                            <option value="2">Dép Nam</option>
                            <option value="3">Giày Nữ</option>
                            <option value="4">Dép Nữ</option>
                            <option value="5">Vớ</option>
                            <option value="6">Đế Lót</option>
                        </select></td>
                        
                    </tr>
                    <tr>
                        <td><label>Giá sản phẩm: </label></td>
                        <td><input type="text" name="price" value="<?=$product['DonGia']?>" /></td>
                        
                    </tr>
                   <tr>
                        <td><label>Số lượng: </label></td>
                        <td><input type="text" name="number" value="<?=$product['SoLuong']?>" /></td>
                        
                    <tr>
                    <tr>
                        <td><label>Ảnh đại diện: </label></td>
                        <td>
                            <img src="<?=$product['Anh']?>"/>
                            <input type="file" name="image" />
                        </td>
                        
                    </tr>
                    
                        
                    </tr>
                    <tr>
                        <td><label>Nội dung: </label></td>
                        <td><textarea name="content" id="product-content"><?=$product['ThongTin']?></textarea></td>
                        
                    </tr>
                    
                </form>
                    </table>
                    </div>
                <div class="clear-both"></div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('product-content');
                </script>
                <?php } ?>
            </div>
        </div>
    </body>
</html>