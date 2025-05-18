<?php   
    $matb = $_REQUEST["stb"];
    include_once("controller/cthietbi.php");
    $p = new cthietbi();
    $con = $p -> get1tb($matb);
    if($con){
        while($r = $con -> fetch_assoc()){
            $tentb = $r["TenTB"];
            $noisanxuat = $r["NoiSanXuat"];
            $tinhtrang = $r["TinhTrang"];
        }
    }else{
        echo "<script>alert ('thiết bị không tồn tại')</script>";
        header("refresh: 0; url=quanly.php?dstb");
    }
?>

<form action="#" method="post" enctype="multipart/form-data">
<table id="a10">
    <br>
    <center><h1>SỬA THIẾT BỊ</h1></center>
    <br>
    <tr>
        <td>Tên Thiết Bị: </td>
        <td><input type="text" name="txttentb" value="<?php if(isset($tentb)) echo $tentb; ?>" required></td>
    </tr>

    <tr>
        <td>Nơi Sản Xuất: </td>
        <td><input type="text" name="txtnsx" value="<?php if(isset($noisanxuat)) echo $noisanxuat; ?>" required></td>
    </tr>

    <tr>
        <td>Tình Trạng</td>
        <td>
            <select name="tinhtrang">
                <option value="Đang Hoạt Động" <?php if($tinhtrang == "Đang Hoạt Động") echo "selected"; ?>>Đang hoạt động</option>
                <option value="Bảo Trì" <?php if($tinhtrang == "Bảo Trì") echo "selected"; ?>>Bảo trì</option>
                <option value="Ngừng Hoạt Động" <?php if($tinhtrang == "Ngừng Hoạt Động") echo "selected"; ?>>Ngưng hoạt động</option>
            </select>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="btnsua" value="Cập Nhật">
            <input type="submit" name="huy" value="Hủy">
        </td>
    </tr>
</table>
</form>

<?php
    include_once("controller/cthietbi.php");
    if(isset($_REQUEST["btnsua"])){
        $p = new cthietbi();
        // $con = $p -> getupdatenv($manv, $_REQUEST["txttennv"], $_REQUEST["txtemail"], $_REQUEST["txtsdt"], $_REQUEST["txtngayvaolam"], $matk, $_REQUEST["chucvu"]);
        $con = $p -> getupdatetb($matb, $_REQUEST["txttentb"], $_REQUEST["txtnsx"], $_REQUEST["tinhtrang"]);
        if($con == 1){
            echo "<script>alert('Sửa thiết bị thành công');</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        } else if($con == -1){
            echo "Không thể kết nối csdl";
        } else {
            echo "Sửa loại sản phẩm thất bại";
        }
    }else if(isset($_REQUEST["huy"])){
        echo " <script> window.location.href='quanly.php?dstb' </script> ";
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