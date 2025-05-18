<?php   
    $magt = $_REQUEST["sgt"];
    include_once("controller/cgoitap.php");
    $p = new cgoitap();
    $con = $p -> get1gt($magt);
    if($con){
        while($r = $con -> fetch_assoc()){
            $tengt = $r["TenGT"];
            $sotien = $r["SoTien"];
            $mota = $r["MoTa"];
            $hinhanhcu = $r["HinhAnh"];
            $dichvu = explode(",", $r["DichVu"]); // Tách chuỗi dịch vụ thành mảng
        }
    }else{
        echo "<script>alert ('gói tập không tồn tại')</script>";
        header("refresh: 0; url=quanly.php?dsgt");
    }
?>

<form action="#" method="post" enctype="multipart/form-data">
<table id="a10">
    <br>
    <center><h1>SỬA GÓI TẬP</h1></center>
    <br>
    <tr>
        <td>Tên Gói Tập: </td>
        <td><input type="text" name="txttengt" value="<?php if(isset($tengt)) echo $tengt; ?>" required></td>
    </tr>

    <tr>
        <td>Giá Tiền: </td>
        <td><input type="text" name="txtsotien" value="<?php if(isset($sotien)) echo $sotien; ?>" required></td>
    </tr>

    <tr>
        <td>Mô Tả: </td>
        <td><input type="text" name="txtmota" value="<?php if(isset($mota)) echo $mota; ?>" required></td>
    </tr>

    <tr>
        <td>HÌnh Ảnh</td>
        <td><input type="file" name="img">
        <br>
        <center><img src="image/goitap/<?php echo $hinhanhcu ?>" width='100px'/></center>   
        </td>    
    </tr>

    <tr>
        <td>Dịch Vụ</td>
        <td>
            <label><input type="checkbox" name="dichvu[]" value="Gym" <?php if (in_array("Gym", $dichvu)) echo "checked"; ?>> Gym</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Yoga" <?php if (in_array("Yoga", $dichvu)) echo "checked"; ?>> Yoga</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Aerobic" <?php if (in_array("Aerobic", $dichvu)) echo "checked"; ?>> Aerobic</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Kickboxing" <?php if (in_array("Kickboxing", $dichvu)) echo "checked"; ?>> Kickboxing</label><br>
            <label><input type="checkbox" name="dichvu[]" value="Bơi Lội" <?php if (in_array("Bơi Lội", $dichvu)) echo "checked"; ?>> Bơi Lội</label><br>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="btnsua" value="Cập Nhật">
            <input type="submit" name="btnhuy" value="Hủy">
        </td>
    </tr>
</table>
</form>

<?php
include_once("controller/cgoitap.php");

if (isset($_REQUEST["btnsua"])) {
    $p = new cgoitap();

    // Kiểm tra nếu có danh sách dịch vụ được chọn
    $dichvuArray = isset($_REQUEST["dichvu"]) ? $_REQUEST["dichvu"] : [];
    $dichvu = implode(",", $dichvuArray); // Chuyển mảng thành chuỗi phân cách bởi dấu phẩy

    // Kiểm tra nếu có upload hình ảnh mới
    $hinhanh = $_FILES["img"]["name"] ?: $hinhanhcu; // Nếu không upload, giữ hình ảnh cũ

    // Gọi hàm cập nhật gói tập
    $con = $p->getupdategt(
        $magt,
        $_REQUEST["txttengt"], $_REQUEST["txtsotien"], $_REQUEST["txtmota"], $hinhanh, $dichvu, $_REQUEST["nguoiphutrach"]);

    if ($con == 1) {
        // Nếu có upload hình ảnh mới, lưu vào thư mục
        if ($_FILES["img"]["name"]) {
            move_uploaded_file($_FILES["img"]["tmp_name"], "image/goiTap/$hinhanh");
        }
        echo "<script>alert('Sửa gói tập thành công');</script>";
        echo "<script>window.location.href='quanly.php?dsgt'</script>";
    } else if ($con == -1) {
        echo "<script>alert('Không thể kết nối cơ sở dữ liệu');</script>";
    } else {
        echo "<script>alert('Sửa gói tập thất bại');</script>";
    }
} else if (isset($_REQUEST["btnhuy"])) {
    echo "<script>window.location.href='quanly.php?dsgt'</script>";
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