
<form action="#" method="post" enctype="multipart/form-data">
<table id="a10">
    <br>
    <center><h1>THÊM GÓI TẬP</h1></center>
    <br>
    <tr>
        <td>Tên Gói Tập: </td>
        <td><input type="text" name="txttengt" required></td>
    </tr>

    <tr>
        <td>Giá Tiền: </td>
        <td><input type="number" name="txtsotien" required ></td>
    </tr>


    <tr>
        <td>Mô Tả: </td>
        <td><input type="text" name="txtmota" required></td>
    </tr>

    <tr>
        <td>HÌnh Ảnh</td>
        <td><input type="file" name="img" required></td>    
    </tr>

    <tr>
        <td>Dịch Vụ</td>
        <td>
            <label><input type="checkbox" name="dichvu[]" value="Gym"> Gym</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Yoga"> Yoga</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Aerobic"> Aerobic</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Kickboxing"> Kickboxing</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Bơi Lội"> Bơi Lội</label><br>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="btnsua" value="Cập Nhật">
            <input type="button" name="btnhuy" value="Hủy" onclick="window.location.href='quanly.php?dsgt';">
        </td>
    </tr>
</table>
</form>

<?php
    include_once("controller/cgoitap.php");
    if(isset($_REQUEST["btnsua"])){
        $p = new cgoitap();
        $dichvuArray = isset($_REQUEST["dichvu"]) ? $_REQUEST["dichvu"] : []; // Kiểm tra nếu dịch vụ được gửi
        $dichvu = implode(",", $dichvuArray); // Chuyển mảng thành chuỗi, phân cách bởi dấu phẩy
        //$con = $p -> getupdategt($magt, $_REQUEST["txttengt"], $_REQUEST["txtsotien"], $_REQUEST["txtmota"], $_REQUEST["txtngaybatdau"], $_REQUEST["txtngayketthuc"], $_FILES["img"], $hinhanh, $dichvu, $_REQUEST["nguoiphutrach"]);
        $con = $p -> getthemgt($_REQUEST["txttengt"], $_REQUEST["txtsotien"], $_REQUEST["txtmota"], $_FILES["img"]["name"], $dichvu, $_REQUEST["nguoiphutrach"]);
        if($con == 1){
            move_uploaded_file($_FILES['img']['tmp_name'],'image/goitap/'.$_FILES["img"]["name"]);
            echo "<script>alert('Thêm gói tập thành công');</script>";
            echo " <script> window.location.href='quanly.php?dsgt' </script> ";
        } else if($con == -1){
            echo "Không thể kết nối csdl";
        } else {
            echo "thêm gói tập thất bại";
        }
    }else if(isset($_REQUEST["btnhuy"])){
        echo " <script> window.location.href='quanly.php?dsgt' </script> ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    /* Thiết lập chung cho bảng */
    #a10 {
        width: 70%;
        max-width: 600px;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }

    /* Định dạng cho tiêu đề */
    h1 {
        color: #333;
        font-size: 24px;
    }

    /* Định dạng ô đầu và ô dữ liệu */
    #a10 td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
        font-size: 16px;
    }

    #a10 tr:first-child td {
        font-weight: bold;
        color: #ffffff;
        background-color: #4CAF50;
    }

    /* Thiết lập cho các ô xen kẽ */
    #a10 tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    #a10 tr:hover {
        background-color: #f1f1f1;
    }

    /* Định dạng cho các trường input text */
    input[type="text"], input[type="date"], select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="number"], input[type="date"], select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, input[type="date"]:focus, select:focus {
        border-color: #4CAF50;
        outline: none;
    }

    /* Định dạng cho các nút */
    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        margin-right: 10px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"] {
        background-color: #4CAF50;
    }

    /* Định dạng cho các nút */
    input[type="button"], input[type="reset"] {
        padding: 10px 20px;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        margin-right: 10px;
        transition: background-color 0.3s ease;
    }

    input[type="button"] {
        background-color: #4CAF50;
    }

    input[type="reset"] {
        background-color: #ff5722;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    input[type="reset"]:hover {
        background-color: #e64a19;
    }
</style>


</head>
<body>
    
</body>
</html>