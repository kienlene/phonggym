<?php
    
    include_once("controller/getdangnhap.php");
    $p = new GetDangNhap();
    if(isset($_REQUEST["btndangnhap"])){
        $user = $_REQUEST["user"];
        $pass = md5($_REQUEST["pass"]);
        $con = $p ->getDangNhapTK($user,$pass);
        if($con == true){
            $r = $con -> fetch_assoc();
            $matk = $r["MaTK"];
            $role = $r["MaRole"];
            $_SESSION["dn"]=1;
            if($role == 3){
                $_SESSION["matk"]=$r["MaTK"];
                
                // echo "<script>alert('Đăng nhập thành công');</script>";
                echo " <script> window.location.href='thanhvien.php' </script> ";
            }else if($role == 2){
                if(isset($matk)){
                    $con1 = $p -> Lay1NV($matk);
                    if($con1 == true){
                        $r1 = $con1 -> fetch_assoc();
                        $manone = $r1["MaNV"];
                        $ten = $r1["TenNV"];
                        $email = $r1["Email"];
                        $sdt = $r1["Sdt"];
                        $ngayvaolam = $r1["NgayVaoLam"];
                        $chucvu = $r1["TenCV"];
                        $macv = $r1["MaCV"];
                        if($macv == 1){
                            $_SESSION["dn1"]=1;
                            $_SESSION["manone"] =$manone;
                            $_SESSION["manv"] = $matk;
                            $_SESSION["ten"] = $ten;
                            $_SESSION["email"] = $email;
                            $_SESSION["Sdt"] = $sdt;
                            $_SESSION["ngayvaolam"] = $ngayvaolam;
                            $_SESSION["chucvu"] = $chucvu;
                            $_SESSION["macv"] = $macv;
                            echo "<script>alert('Đăng nhập thành công');</script>";
                            echo " <script> window.location.href='ketoan.php' </script> ";
                        }else if($macv == 2){
                            // thêm phần này
                            $_SESSION["dn2"]=1;
                            $_SESSION["manv"]=$r["MaTK"];
                            $_SESSION["tenktv"] = $ten;
                            $_SESSION["manone"] = $manone;
                            echo "<script>alert('Đăng nhập thành công');</script>";
                            echo " <script> window.location.href='kythuatvien.php' </script> ";
                        }else if($macv == 3){
                            echo "<script>alert('Đăng nhập thành công');</script>";
                            echo " <script> window.location.href='huanluanvien.php' </script> ";
                        }else if($macv == 4){
                            $_SESSION["dn4"]=1;
                            $_SESSION["manone"] =$manone;
                            $_SESSION["manv"] = $matk;
                            $_SESSION["ten"] = $ten;
                            $_SESSION["email"] = $email;
                            $_SESSION["Sdt"] = $sdt;
                            $_SESSION["ngayvaolam"] = $ngayvaolam;
                            $_SESSION["chucvu"] = $chucvu;
                            $_SESSION["macv"] = $macv;
                            echo "<script>alert('Đăng nhập thành công');</script>";
                            echo " <script> window.location.href='nhanvien.php' </script> ";
                        }
                    }
                }else{
                    echo "Loi roi nhe";
                }
            }else if($role == 1){
                $con2 = $p -> Lay1NV($matk);
                if($con2 == true){
                    $r2 = $con2->fetch_assoc();
                    $_SESSION["manv"] = $r2["MaTK"];
                    $_SESSION["ten"] = $r2["TenNV"];
                    $_SESSION["manone"] = $r2["MaNV"];
                }
                echo "<script>alert('Đăng nhập thành công');</script>";
                echo " <script> window.location.href='quanly.php' </script> ";
            }
        } else {
            echo "<script>alert('Sai tài khoản hoặc mật khẩu');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        /* Reset CSS */
/* Reset CSS */
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url('../GYM/image/nendn.jpg') no-repeat center center/cover;
    font-family: Arial, sans-serif;
}

/* Form Container */
.form-container {
    background-color: rgba(255, 255, 255, 0.9); /* Nền trắng mờ */
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Hiệu ứng đổ bóng */
    padding: 40px;
    width: 400px;
}

/* Logo Container */
.logo-container {
    text-align: center;
    margin-bottom: 20px;
}

.logo {
    width: 100px;
    height: auto;
}

/* Title */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Labels */
label {
    font-weight: bold;
    color: #555;
}

/* Input Fields */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    background-color: #f9f9f9; /* Màu nền nhạt */
}

/* Submit Button */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #e53935; /* Màu đỏ rực */
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Submit Button Hover */
input[type="submit"]:hover {
    background-color: #b71c1c; /* Tông đỏ đậm hơn */
}

/* Forgot Password Link */
.forgot-password {
    display: block;
    text-align: right;
    color: #e53935;
    text-decoration: none;
    font-size: 14px;
    margin-top: 10px;
}

.forgot-password:hover {
    color: #b71c1c;
}

/* Thông báo */
.notification {
    display: none;
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    transition: opacity 0.5s ease;
}

/* Hiệu ứng hiện thông báo */
.notification.show {
    display: block;
    opacity: 1;
}

.notification.hide {
    opacity: 0;
    transition: opacity 0.5s ease;
}

    </style>
</head>
<body>
    <div class="form-container"> <!-- Thêm div này -->
        <!-- Logo -->
        <div class="logo-container">
            <a href="index.php">
            <img src="../GYM/image/logo.jpg" alt="Logo" class="logo"> <!-- Đặt đường dẫn tới logo -->
            </a>
        </div>
        <form method="post" action="">
            <label for="user">Tên Đăng Nhập:</label>
            <input type="text" id="user" name="user" required><br>
            
            <label for="pass">Mật Khẩu:</label>
            <input type="password" id="pass" name="pass" required><br>
            
            <input type="submit" name="btndangnhap" value="Đăng Nhập">
        </form>
    </div>
    <div id="success-message" class="notification">Đăng nhập thành công!</div>
</body>
</html>
<script>
    // Hàm hiển thị thông báo
    function showNotification(message) {
    const notification = document.getElementById("success-message");
    notification.textContent = message; // Đặt thông báo
    notification.classList.add("show");

    // Tự động ẩn thông báo sau 3 giây
    setTimeout(() => {
        notification.classList.add("hide");
        setTimeout(() => {
            notification.classList.remove("show", "hide");
        }, 500); // Thời gian ẩn dần
    }, 3000);
}

// Gọi hàm này khi nhấn nút Gia hạn
document.getElementById("btnxacnhan").addEventListener("click", function (event) {
    event.preventDefault(); // Ngăn điều hướng ngay lập tức
    showNotification("Thanh toán thành công!");
    // Chuyển hướng sau 3 giây
    setTimeout(() => {
        window.location.href = "thanhvien.php";
    }, 2000);
});
</script>