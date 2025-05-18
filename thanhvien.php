<?php
session_start();
if(!isset($_SESSION["dn"])){
    echo "<script>alert('Vui lòng đăng nhập')</script>";
    echo " <script>window.location.href='index.php'</script> ";
}
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
/* Footer */
footer {
     background-color: #333;
     color: white;
     padding: 40px 50px;
}
 .footer-content {
     display: flex;
     justify-content: space-between;
     flex-wrap: wrap; /* Allow wrapping for smaller screens */
}
 .footer-section {
     flex: 1; /* Allow sections to grow */
     min-width: 250px; /* Minimum width for responsiveness */
     margin-right: 20px; /* Space between sections */
}
 .footer-section h4 {
     margin-bottom: 15px;
     font-size: 18px;
     border-bottom: 1px solid #ffffff; /* Underline effect */
     padding-bottom: 5px;
}
 .footer-section p {
     margin: 5px 0;
}
 .footer-section a {
     color: #ffffff;
     text-decoration: none;
}
 .footer-section a:hover {
     text-decoration: underline; /* Underline on hover */
}
 .footer-bottom {
     text-align: center;
     margin-top: 20px;
     font-size: 14px;
}
input[type="email"] {
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
}
button {
    padding: 10px 15px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff; /* Button color */
    color: white;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3; /* Darker on hover */
}
.social-media a {
    margin-right: 15px;
    color: #ffffff;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}


/* Navbar */

/* Navbar */
.navbar {
    background-color: #ffffff;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar a.logo {
    display: flex;
    align-items: center;
    text-decoration: none;
}

/* User Dropdown */
.user-dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
    margin-left: 10px;
}

.user-info a {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-info img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ddd;
    transition: transform 0.3s, border-color 0.3s;
}

.user-info img:hover {
    transform: scale(1.1);
    border-color: #007bff;
}

.user-info span {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

/* Dropdown Menu */
.dropdown-menu {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    z-index: 999;
    min-width: 200px;
    transition: opacity 0.3s ease-in-out;
    opacity: 0;
    pointer-events: none;
}

.dropdown-menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.dropdown-menu li {
    border-bottom: 1px solid #f0f0f0;
}

.dropdown-menu li:last-child {
    border-bottom: none;
}

.dropdown-menu li a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s, color 0.3s;
}

.dropdown-menu li a:hover {
    background-color: #007bff;
    color: white;
}

/* Show Dropdown on Hover */
.user-dropdown:hover .dropdown-menu {
    display: block;
    opacity: 1;
    pointer-events: auto;
}
/* thanh điều hướng */
#dieuhuong {
    display: flex; /* Sắp xếp các liên kết thành hàng ngang */
    justify-content: flex-end; /* Căn chỉnh sang bên phải */
    align-items: center; /* Căn giữa theo chiều dọc */
    gap: 15px; /* Khoảng cách giữa các liên kết */
    background-color: transparent; /* Màu nền trong suốt */
    padding: 10px 20px; /* Tạo khoảng cách bên trong */
}

#dieuhuong a {
    text-decoration: none; /* Loại bỏ gạch chân */
    font-size: 16px; /* Kích thước chữ */
    color: #333333; /* Màu chữ trung tính */
    font-weight: bold; /* Chữ đậm */
    padding: 8px 12px; /* Tạo vùng nhấn */
    border-radius: 25px; /* Góc bo tròn */
    transition: background-color 0.3s ease, color 0.3s ease; /* Hiệu ứng chuyển */
}

#dieuhuong a:hover {
    background-color: #007bff; /* Màu nền khi hover */
    color: #ffffff; /* Màu chữ khi hover */
    box-shadow: 0 2px 4px rgba(0, 123, 255, 0.3); /* Hiệu ứng đổ bóng */
}

#dieuhuong a:active {
    background-color: #0056b3; /* Màu nền khi nhấn */
    color: #ffffff; /* Màu chữ khi nhấn */
}
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../GYM/index.css">
</head>

<body>
    <div class="navbar">
        <a href="index.php">
        <img src="../GYM/image/logo.png" alt="Logo" class="logo" width="50px">
        </a>
        <div id="dieuhuong">
            <a href="index.php">Trang chủ</a>
            <a href="dichvu.php">Dịch Vụ</a>
            <a href="gioithieu.php">Về chúng tôi</a>
            <a href="tintuc.php">Tin Tức</a>
            <a href="lienhe.php">Liên hệ</a>

        </div>
    <?php
        include_once("controller/c_dangnhap.php");
        $p = new GetDangNhap();
        $con = $p -> get_thanhvien($_SESSION["matk"]);
        if($con){
            $row = $con -> fetch_assoc();
        }
    ?>
        <div class="user-dropdown">
            <div class="user-info">
                <?php
                    echo '
                        <a href="thanhvien.php?trangchuTV">
                            <img src="../GYM/image/'.$row["HinhAnh"].'" alt="" class="user">
                            <span>'.$row["TenTV"].'</span>
                        </a>
                    ';
                ?>
                
            
            </div>
            <div class="dropdown-menu">
                <ul>
                    <?php
                    echo'
                    <li><a href="thanhvien.php?capnhat">Cập nhật</a></li>
                    <li><a href="thanhvien.php?doimk">Đổi mật khẩu</a></li>
                    <li><a href="thanhvien.php?dangxuat">Đăng xuất</a></li>
                    ';
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
            include_once("view/thongtin/index.php");
        ?>

        <div class="main-content">
            <?php

                if(isset($_SESSION["dn"])){
                    if(isset($_REQUEST["trangchuTV"])){
                        include_once("view/trangchuTV/index.php");
                    }elseif(isset($_REQUEST["capnhat"])){
                        include_once("view/capnhattt/index.php");
                    }elseif(isset($_REQUEST["dangxuat"])) {
                        include_once("view/dangxuat/index.php");
                    }elseif(isset($_REQUEST["phanhoi"])) {
                        include_once("view/phanhoi/index.php");
                    }elseif(isset($_REQUEST["doimk"])) {
                        include_once("view/doimatkhau/index.php");
                    }elseif(isset($_REQUEST["lichsu"])) {
                        include_once("view/lichsu/index.php");
                    }elseif(isset($_REQUEST["thoihan"])) {
                        include_once("view/giahan/index.php");
                    }elseif(isset($_REQUEST["thanhtoan"])){
                        include_once("view/thanhtoan/index.php");
                    }elseif(isset($_REQUEST["chuathanhtoan"])) {
                        include_once("view/chuathanhtoan/index.php");
                    }
                    else{
                        include_once("view/trangchuTV/index.php");
                    }
                // include_once("view/lichsu/index.php");
                // include_once("view/giahan/index.php");
                // include_once("view/doimatkhau/index.php");
                // include_once("view/phanhoi/index.php");
                // include_once("view/capnhattt/index.php");
                }
                
            ?>
        </div>
    </div>
    <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Công ty</h4>
                    <p>Công ty Cổ phần Lifestyle Việt Nam</p>
                    <p>Địa chỉ: 51 Đội Quyết, Xuân Diệu, Tây Hồ, Hà Nội</p>
                    <p>Mã số thuế: 10000901</p>
                    <p>Email: <a href="mailto:info@lifefitness.com.vn">info@lifefitness.com.vn</a></p>
                </div>
                <div class="footer-section">
                    <h4>Liên kết nhanh</h4>
                    <p><a href="#">Điều khoản & điều kiện</a></p>
                    <p><a href="#">Quy định bảo mật</a></p>
                    <p><a href="#">Tin tức</a></p>
                    <p><a href="#">Liên hệ</a></p>
                    <p><a href="#">Dịch vụ</a></p>
                </div>
                <div class="footer-section">
                    <h4>Liên hệ chúng tôi</h4>
                    <p>Đăng ký nhận bản tin:</p>
                    <input type="email" placeholder="Nhập email của bạn" />
                    <button>Đăng ký</button>
                    <p>Follow us:</p>
                    <div class="social-media">
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">YouTube</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Công ty Cổ phần Lifestyle Việt Nam. Bảo lưu mọi quyền.</p>
            </div>
        </footer>
</body>

</html>