
<form action="#" method="post" enctype="multipart/form-data">
<table id="a10">
    <tr>
        <td colspan="2"><h1>FORM THÊM THIẾT BỊ</h1></td>
    </tr>

    <tr>
        <td>Tên Thiết Bị: </td>
        <td><input type="text" name="txttentb" required></td>
    </tr>

    <tr>
        <td>Nơi Sản Xuất: </td>
        <td><input type="text" name="txtnsx" required></td>
    </tr>

    <tr>
        <td>Tình Trạng</td>
        <td>
            <select name="tinhtrang" required>
                <option value="" disabled selected>-- Chọn tình trạng --</option>
                <option value="Đang Hoạt Động">Đang hoạt động</option>
                <option value="Bảo Trì">Bảo trì</option>
                <option value="Ngưng Hoạt Động">Ngưng hoạt động</option>
            </select>
        </td>
    </tr>


    <tr>
        <td></td>
        <td>
            <input type="submit" name="btnthem" value="Cập Nhật">
            <input type="button" name="btnhuy" value="Hủy" onclick="window.location.href='quanly.php?dstb';">
        </td>
    </tr>
</table>
</form>

<?php
    include_once("controller/cthietbi.php");
    if(isset($_REQUEST["btnthem"])){
        $p = new cthietbi();
        $con = $p -> getthemtb($_REQUEST["txttentb"],$_REQUEST["txtnsx"],$_REQUEST["tinhtrang"]);
        if($con){
            echo "<script>alert('thêm thiết bị thành công')</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        }else{
            echo "<script>alert('thêm thiết bị that bai')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Đặt khung viền và khoảng cách cho toàn bộ form */
        #a10 {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
        }

        /* Định dạng tiêu đề form */
        h1 {
            color: #333;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        /* Định dạng các ô trong bảng */
        #a10 tr {
            height: 50px;
        }

        #a10 td {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #555;
        }

        /* Định dạng ô nhập liệu */
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        /* Định dạng nút */
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Xanh lá cây */
        }

        input[type="button"], input[type="reset"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-right: 10px;
        }

        input[type="button"] {
            background-color: #4CAF50; /* Xanh lá cây */
        }

        input[type="reset"] {
            background-color: #f44336; /* Đỏ */
        }

        /* Hiệu ứng hover cho nút */
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="reset"]:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    
</body>
</html>