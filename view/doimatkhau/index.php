<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <link rel="stylesheet" href="">
    <style>
        
        .khung{
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; Chiều cao toàn màn hình */
            background-color: #f8f9fa; /* Màu nền nhẹ */
        }
.change-password-container {
    width: 100%;
    max-width: 500px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.change-password-container h2 {
    margin-bottom: 20px;
    color: #333;
}

#change-password-form label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

#change-password-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

#change-password-form button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}
h2{
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(90deg, #007AFF, #00E0FF); /* Gradient xanh biển chuyên nghiệp */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
}
    </style>
</head>

<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p->get_doimatkhau($_SESSION["matk"]);
    if($con){
        $row = $con -> fetch_assoc();
    }
?>
<body>
    <div class="khung">
        <div class="change-password-container">
            <h2>Đổi Mật Khẩu</h2>
            <form id="change-password-form" action="" method="post">
                <label for="current-password">Mật khẩu cũ</label>
                <input type="password" id="current-password" name="mkcu" required>

                <label for="new-password">Mật khẩu mới</label>
                <input type="password" id="new-password" name="mkmoi" required>

                <label for="confirm-password">Xác nhận mật khẩu mới</label>
                <input type="password" id="confirm-password" name="xacnhanmk" required>

                <button type="submit" name="doimk">Cập nhật</button>
                <!-- <p id="error-message" class="error-message"></p> -->
            </form>
        </div>
    </div>
</body>
</html>
<?php
    
    if(isset($_POST["doimk"])){
        $matkhaucu = md5($_POST["mkcu"]);
        $matkhaumoi = $_POST["mkmoi"];
        $xacnhanmk = $_POST["xacnhanmk"];
        if($matkhaumoi == $xacnhanmk){
            if($matkhaucu == $row["MatKhau"]){
                $matkhaumoi = md5($_POST["mkmoi"]);
                $result = $p ->get_capnhatmk($_SESSION["matk"], $matkhaumoi);
                if($result == true){
                    session_destroy();
                    echo '<script>alert("Đổi mật khẩu thành công")</script>';
                    echo " <script> window.location.href='thanhvien.php' </script> ";
                }else{
                    echo '<script>alert("Lỗi truy vấn")</script>';
                }
            }else{
                echo '<script>alert("Mật khẩu cũ không đúng")</script>';
            }
        }else{
            echo '<script>alert("Mật khẩu không trùng khớp")</script>';
        }
    }

?>