<?php
    include_once("controller/getdangnhap.php");
    $p = new GetDangNhap();
    $ma = $_REQUEST["suanv"];
    // Lấy thông tin hiện tại của nhân viên
    $con = $p ->Lay1NV($ma);
    if($con){
        $r = $con -> fetch_assoc();
        $tenNVCu = $r["TenNV"];
        $Emailcu = $r["Email"];
        $sdtcu = $r["Sdt"];
        $avtcu = $r["HinhAnhNV"];
    }
    if(isset($_REQUEST["btnsua"])){
        $ma = $_REQUEST["suanv"];
        $ten = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $sdt = $_REQUEST["phone"];
        $avt = $_FILES["avt"]["name"] ?: $avtcu;
        $con1 = $p ->updateNV($ma,$ten,$avt,$email,$sdt);
        if($con == true){
            if ($_FILES["avt"]["name"]) {
                move_uploaded_file($_FILES["avt"]["tmp_name"], "image/avtnv/$avt");
            }
            echo "<script>alert('Cập nhật thông tin nhân viên thành công');</script>";
            if(isset($_SESSION["dn1"])){
                echo " <script> window.location.href='ketoan.php?chitietnhanvien' </script> ";
            }else if(isset($_SESSION["dn4"])){
                echo " <script> window.location.href='nhanvien.php?chitietnhanvien' </script> ";
            }
        }else{
            echo " <script>alert('Sửa thất bại')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Thông Tin Nhân Viên</title>
    <style>
        img {
            max-width: 100px;
            border-radius: 5px;
            margin-top: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .save-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .save-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Chỉnh Sửa Thông Tin Nhân Viên</h2>
    <form action="" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="avt">Ảnh Đại Diện:</label>
            <input type="file" name="avt"><br>
            <?php
                echo "<img src='image/avtnv/".$avtcu."' alt='Ảnh đại diện'>";
            ?>
            <label for="name">Tên Nhân Viên</label>
            <input type="text" id="name" name="name" value="<?php echo $tenNVCu; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $Emailcu; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $sdtcu; ?>" required>
        </div>
        <button type="submit" class="save-button" name="btnsua" >Lưu Thay Đổi</button>
    </form>
</div>

</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');

    form.addEventListener('submit', function (event) {
        // Kiểm tra tên nhân viên (chỉ cho phép chữ cái và khoảng trắng)
        const nameRegex = /^[A-Za-zÀ-ỹ\s]+$/;
        if (!nameRegex.test(nameInput.value)) {
            alert('Tên nhân viên không hợp lệ. Vui lòng nhập chữ cái và khoảng trắng!');
            event.preventDefault(); // Ngừng gửi form
            return;
        }

        // Kiểm tra email (phải có đuôi @gmail.com)
        const emailRegex = /^[^\s@]+@gmail\.com$/;
        if (!emailRegex.test(emailInput.value)) {
            alert('Email không hợp lệ. Vui lòng nhập địa chỉ email có đuôi @gmail.com!');
            event.preventDefault(); // Ngừng gửi form
            return;
        }


        // Kiểm tra số điện thoại (định dạng số điện thoại Việt Nam)
        const phoneRegex = /^0\d{9}$/;
        if (!phoneRegex.test(phoneInput.value)) {
            alert('Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng số điện thoại!');
            event.preventDefault(); // Ngừng gửi form
            return;
        }
    });
});

</script>