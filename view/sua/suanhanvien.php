<?php   
    $manv = $_REQUEST["snv"];
    include_once("controller/cnhanvien.php");
    $p = new cnhanvien();
    $con = $p -> get1nv($manv);
    if($con){
        while($r = $con -> fetch_assoc()){
            $tennv = $r["TenNV"];
            $email = $r["Email"];
            $sdt = $r["Sdt"];
            $hinhanhcu = $r["HinhAnhNV"];
            $ngayvaolam = $r["NgayVaoLam"];
            $matk = $r["MaTK"];
            $macv = $r["MaCV"];
        }
    }else{
        echo "<script>alert ('nhân viên không tồn tại')</script>";
        header("refresh: 0; url=quanly.php?dstv");
    }
?>

<form action="#" method="post" enctype="multipart/form-data">
<table id="a10">
    <center><h1>SỬA USER</h1></center>
    <tr>
        <td>Tên Nhân Viên: </td>
        <td>
            <input type="text" name="txttennv" value="<?php if(isset($tennv)) echo $tennv; ?>" required 
                pattern="[a-zA-ZÀ-ỹ\s]+" 
                title="Tên chỉ được chứa chữ cái và khoảng trắng.">
        </td>
    </tr>

    <tr>
        <td>Email: </td>
        <td>
            <input type="text" name="txtemail" value="<?php if(isset($email)) echo htmlspecialchars($email); ?>" required 
                pattern="[a-zA-Z0-9._%+-]+@gmail\.com" 
                title="Vui lòng nhập email hợp lệ với đuôi @gmail.com">
        </td>
    </tr>



    <tr>
            <td>SĐT: </td>
            <td>
                <input type="text" name="txtsdt" value="<?php if(isset($sdt)) echo htmlspecialchars($sdt); ?>" required 
                    pattern="0\d{9}" 
                    title="Số điện thoại phải gồm 10 chữ số và bắt đầu bằng 0.">
            </td>
        </tr>

    <tr>
        <td>HÌnh Ảnh</td>
        <td><input type="file" name="img">
        <br>
        <center><img src="image/avtnv/<?php echo $hinhanhcu ?>" width='100px'/></center>   
        </td>    
    </tr>

    <tr>
        <td>NGÀY VÀO LÀM: </td>
        <td><input type="text" name="txtngayvaolam" value="<?php if(isset($ngayvaolam)) echo $ngayvaolam; ?>" required></td>
    </tr>

    <tr>
        <td>CHỨC VỤ</td>
        <td>
        <?php
        include_once("controller/cnhanvien.php");
        $pt = new cnhanvien();
        $kq = $pt -> getallcv();
        if($kq){
            echo "<select name='chucvu'>";
            while($r = $kq -> fetch_assoc()){
                if($r["MaCV"]==$macv){
                    echo "<option value=".$r['MaCV']." selected>".$r['TenCV']."</option>";
                }else{
                    echo "<option value=".$r['MaCV'].">".$r['TenCV']."</option>";
                }        
            }
            echo "</select>";
        }
        ?>
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
include_once("controller/cnhanvien.php");

if (isset($_REQUEST["btnsua"])) {
    $p = new cnhanvien();
    $hinhanh = $_FILES["img"]["name"] ?: $hinhanhcu; // Giữ ảnh cũ nếu không upload ảnh mới

    // Gọi hàm cập nhật thông tin nhân viên trực tiếp với giá trị từ $_REQUEST và $_FILES
    $con = $p->getupdatenv($manv, $_REQUEST["txttennv"], $_REQUEST["txtemail"], $_REQUEST["txtsdt"], $hinhanh, $_REQUEST["txtngayvaolam"], $matk, $_REQUEST["chucvu"]);
    if ($con == 1) {
        // Nếu có upload ảnh mới, di chuyển ảnh vào thư mục
        if ($_FILES["img"]["name"]) {
            move_uploaded_file($_FILES["img"]["tmp_name"], "image/avtNV/$hinhanh");
        }
        echo "<script>alert('Sửa nhân viên thành công');</script>";
        echo "<script>window.location.href='quanly.php?dsnv'</script>";
    } else if ($con == -1) {
        echo "<script>alert('Không thể kết nối cơ sở dữ liệu');</script>";
    } else {
        echo "<script>alert('sửa thất bại do bị trùng số điện thoại');</script>";
    }
} else if (isset($_REQUEST["huy"])) {
    echo "<script>window.location.href='quanly.php?dsnv'</script>";
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
        width: 80%;
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

    input[type="email"], input[type="date"], select {
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