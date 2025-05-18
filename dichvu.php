<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch Vụ Phòng Gym</title>
    <style>
        /* CSS cho giao diện */
        header {
                background-color: #ffffff;
                border-bottom: 2px solid #e5e5e5;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 50px;
                position: fixed; /* Make the header fixed */
                top: 0; /* Position it at the top */
                left: 0; /* Align it to the left */
                right: 0; /* Align it to the right */
                z-index: 1000; /* Ensure it is above other content */
            }

            header .logo-container {
                display: flex;
                align-items: center; /* Center vertically */
            }

            header img {
                height: 50px; /* Height of the logo */
                margin-right: 10px; /* Space between the logo and the text */
            }

            header .tengym {
                font-size: 24px; /* Adjust font size */
                font-weight: bold; /* Make the text bold */
                color: #333; /* Text color */
                text-decoration: none; /* Remove underline */
                transition: color 0.3s; /* Smooth transition for color change */
            }

            header .tengym:hover {
                color: #007bff; /* Change color on hover */
            }      
            header {
                background-color: #ffffff;
                border-bottom: 2px solid #e5e5e5;
                display: flex;
                justify-content: space-between;
                padding: 10px 50px;
                align-items: center;
            }
            header .logo-container {
                display: flex;
                align-items: center; /* Center vertically */
            }

            header img {
                height: 50px; /* Height of the logo */
                margin-right: 10px; /* Space between the logo and the text */
            }
            header nav a {
                margin-left: 20px;
                text-decoration: none;
                color: #333;
                font-weight: bold;
            }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        
        .navbar {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
        }
        
        .navbar img {
            width: 50px;
            height: auto;
            margin-right: 20px;
        }
        
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        
        .navbar ul li {
            margin-right: 20px;
        }
        
        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }
        
        .navbar ul li a:hover {
            color: #ff5e5e;
        }
        
        .container {
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }
        
        .section-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #ff5e5e;
            display: inline-block;
            padding-bottom: 5px;
        }
        
        .service-item {
            margin-bottom: 30px;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .service-item img {
            width: 150px;
            height: auto;
            border-radius: 8px;
        }
        
        .service-info h3 {
            font-size: 20px;
            color: #333;
            margin: 0;
        }
        
        .service-info p {
            color: #666;
        }
        
        .service-info a {
            text-decoration: none;
            color: #ff5e5e;
            font-weight: bold;
        }
        a {
                text-decoration: none;
                color: inherit;
            }

            a:hover {
                color: #007bff;
                text-decoration: underline;
            }
            .floating-buttons {
                position: fixed;
                right: 20px;
                bottom: 20px;
                display: flex;
                flex-direction: column;
                gap: 10px;
                z-index: 1000;
                }

                .floating-buttons a {
                display: block;
                width: 50px;
                height: 50px;
                }

                .floating-buttons img {
                width: 100%;
                height: 100%;
                border-radius: 50%; /* Bo tròn icon */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease;
                }

                .floating-buttons img:hover {
                transform: scale(1.1); /* Phóng to khi hover */
                }
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
            /* Navbar */
            .user-dropdown {
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                    margin-left: 10px;
                    top: 15px;
                }

                .user-info a{
                    display: flex;
                    align-items: center;
                    gap: 2px; /* Khoảng cách giữa ảnh và tên */
                }

                .user-info img {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%; /* Bo tròn ảnh */
                    object-fit: cover;
                    border: 2px solid #ddd;
                    transition: transform 0.3s;
                }

                .user-info img:hover {
                    transform: scale(1.1); /* Phóng to nhẹ khi hover */
                    border-color: #007bff; /* Thay đổi màu viền khi hover */
                }

                .user-info span {
                    font-size: 16px;
                    font-weight: bold;
                    color: #333;
                    
                }

                .dropdown-menu {
                    display: none; /* Ẩn menu dropdown ban đầu */
                    position: absolute;
                    top: 100%; /* Đặt menu bên dưới */
                    right: 0; /* Canh phải */
                    background-color: #ffffff;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    overflow: hidden;
                    z-index: 999; /* Đảm bảo hiển thị trên các thành phần khác */
                    transition: opacity 0.3s ease-in-out;
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
                    border-bottom: none; /* Bỏ viền mục cuối */
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
                
                /* Hiển thị dropdown khi hover */
                .user-dropdown:hover .dropdown-menu {
                    display: block;
                    opacity: 1;
                }
    </style>
</head>

<body>
    <!-- Thanh điều hướng -->
    <header>
        <div class="logo-container">
            <img src="../GYM/image/logo.jpg" alt="Gym Logo">
            <a class="tengym" href="index.php">GYM CR7</a>
        </div>
        <nav>
            <a href="index.php">Trang chủ</a>
            <a href="dichvu.php">Dịch Vụ</a>
            <a href="gioithieu.php">Về chúng tôi</a>
            <a href="tintuc.php">Tin Tức</a>
            <a href="lienhe.php">Liên hệ</a>
            <?php
            // Chèn navbar nếu tồn tại $_SESSION["matk"]
        if (isset($_SESSION["matk"])) {
            include_once("controller/c_dangnhap.php");
            $p = new GetDangNhap();
            $con = $p->get_thanhvien($_SESSION["matk"]);
            if ($con) {
                $row = $con->fetch_assoc();
            }
            ?>
            <div class="user-dropdown">
                <div class="user-info">
                    <a href="thanhvien.php">
                        <img src="../GYM/image/<?php echo $row["HinhAnh"]; ?>" alt="User Image">
                        <span><?php echo $row["TenTV"]; ?></span>
                    </a>
                </div>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="thanhvien.php?capnhat">Cập nhật</a></li>
                        <li><a href="thanhvien.php?doimk">Đổi mật khẩu</a></li>
                        <li><a href="thanhvien.php?dangxuat">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <?php
        }
            ?>

            <?php
                if(!isset($_SESSION["dn"])){
                    echo '<a href="index.php?trangdangnhap">Đăng nhập</a>';
                }
            ?>
            <?php
                if(isset($_REQUEST["dangxuat"])){
                    include_once("view/dangxuat.php");
                }
            ?>
        </nav>
    </header>

    <!-- Phần dịch vụ -->
    <div class="container">
        <h6 class="section-title">Dịch Vụ Phòng Gym</h6>

        <!-- Danh sách các dịch vụ -->
        <div class="service-item">
            <img src="../GYM/image/a1.jpg" alt="Huấn luyện viên cá nhân">
            <div class="service-info">
                <h3>Tập luyện cá nhân (Personal Training)</h3>
                <p>Đội ngũ huấn luyện viên chuyên nghiệp sẽ xây dựng chương trình luyện tập phù hợp với mục tiêu của bạn.</p>
                <a href="chitiet1.php">Xem chi tiết</a>
            </div>
        </div>

        <div class="service-item">
            <img src="../GYM/image/a2.jpg" alt="Các lớp nhóm">
            <div class="service-info">
                <h3>Các lớp nhóm</h3>
                <p>Tham gia các lớp yoga, zumba, pilates và nhiều lớp khác để tăng cường sức khỏe và sự linh hoạt.</p>
                <a href="chitiet2.php">Xem chi tiết</a>
            </div>
        </div>

        <div class="service-item">
            <img src="../GYM/image/a3.jpg" alt="Dịch vụ xông hơi và massage">
            <div class="service-info">
                <h3>Dịch vụ xông hơi và massage</h3>
                <p>Giúp thư giãn và hồi phục cơ bắp sau buổi tập luyện căng thẳng.</p>
                <a href="chitiet3.php">Xem chi tiết</a>
            </div>
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