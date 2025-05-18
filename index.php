<?php
session_start();
if(isset($_SESSION["dn"])){
    if(isset($_SESSION["dn1"])){
        echo "<script> window.location.href='ketoan.php' </script>";
    } else if($_SESSION["dn4"]){
        echo "<script> window.location.href='nhanvien.php' </script>";
    }
}
if (isset($_REQUEST["trangdangnhap"])) {
    include_once("view/trangdangnhap.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gym Classes</title>
        <style>
            /* Header */
            /* Header */
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
           
            body {
                width: 100%;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            /* Header */
            header {
                background-color: #ffffff;
                border-bottom: 2px solid #e5e5e5;
                display: flex;
                padding: 10px 50px;
                align-items: center;
                justify-content: space-between; /* Đẩy các mục sang hai đầu */
                align-items: center; /* Canh giữa theo chiều dọc */

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
            /* Banner */
            .banner {
                position: relative;
                text-align: center;
                color: white;
            }
            .banner img {
                width: 100%;
                height: 500px;
                object-fit: cover;
            }
            .banner h1 {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 50px;
            }
            /* Section */
            .section {
                background-color: #ffffff;
                padding: 20px;
                text-align: center;
            }
            .section h2 {
                font-size: 24px;
                color: #555;
                margin-bottom: 20px;
            }
            .section .stats {
                display: flex;
                justify-content: space-around;
                padding: 20px;
            }
            .section .stat-box {
                width: 150px;
                text-align: center;
            }
            .section .stat-box img {
                width: 50px;
            }
            .section .stat-box h3 {
                font-size: 20px;
                margin: 10px 0;
            }
            /* News */
            .news {
                display: flex;
                justify-content: space-between;
                padding: 50px;
                background-color: #f0f0f0;
            }
            .news-box {
                width: 48%;
                height: auto;
                border: 1px solid #ccc;
                background-color: white;
                text-align: left;
                padding: 20px;
                font-size: 18px;
            }
            .news-title {
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 10px;
            }
            .news-content {
                margin-bottom: 10px;
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
            .news {
                display: flex;
                justify-content: space-between;
                padding: 50px;
                background-color: #f0f0f0;
            }

            .news-box {
                width: 48%;
                border: 1px solid #ccc;
                background-color: white;
                text-align: left;
                padding: 20px;
                font-size: 18px;
            }

            .news-title {
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 10px;
            }

            .news-content {
                display: flex; /* Use flexbox to align image and text */
                margin-bottom: 20px; /* Space between news items */
            }

            .news-content img {
                width: 80px; /* Set a smaller width for the images */
                height: auto; /* Maintain aspect ratio */
                margin-right: 10px; /* Space between image and text */
            }

            .news-content p {
                flex: 1; /* Allow the text to take remaining space */
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
    <div class="floating-buttons">
        <a href="https://www.facebook.com/" target="_blank" class="btn-facebook">
            <img src="../GYM/image/fb.png" alt="Facebook">
        </a>
        <a href="https://zalo.me/" target="_blank" class="btn-zalo">
            <img src="../GYM/image/zalo1.jpg" alt="Zalo">
        </a>
        <a href="https://www.tiktok.com/" target="_blank" class="btn-tiktok">
            <img src="../GYM/image/tiktok1.jpg" alt="TikTok">
        </a>
    </div>
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

    <div class="banner">
        <img src="../GYM/image/banner.jpg" alt="Gym Banner">
    </div>

    <div class="section">
        <h2>Quy Mô</h2>
        <div class="stats">
            <div class="stat-box">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Members">
                <h3>Thành viên</h3>
                <p>1000+</p>
            </div>
            <div class="stat-box">
                <img src="https://cdn-icons-png.flaticon.com/512/1085/1085151.png" alt="Trainers">
                <h3>Huấn luyện viên</h3>
                <p>100+</p>
            </div>
            <div class="stat-box">
                <img src="https://cdn-icons-png.flaticon.com/512/1006/1006555.png" alt="Courses">
                <h3>Khóa học</h3>
                <p>50+</p>
            </div>
            <div class="stat-box">
                <img src="https://cdn-icons-png.flaticon.com/512/809/809509.png" alt="Equipment">
                <h3>Thiết bị</h3>
                <p>100+</p>
            </div>
            <div class="stat-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3261/3261334.png" alt="Achievements">
                <h3>Thành tích</h3>
                <p>100+</p>
            </div>
        </div>
    </div>

    <div class="news">
        <div class="news-box">
            <div class="news-title">Tin đã đăng</div>
            <div class="news-content">
                <img src="../GYM/image/yoga_class.jpg" alt="Lớp Yoga">
                <a href="#"><p>Chúng tôi đã khai trương một lớp tập yoga mới vào thứ Hai vừa qua. Đừng bỏ lỡ cơ hội tham gia!</p></a>
            </div>
            <div class="news-content">
                <img src="../GYM/image/weight_area.jpg" alt="Khuyến mãi tháng 12">
                <a href="#"><p>Chương trình khuyến mãi tháng 12: Giảm giá 30% cho tất cả các gói thành viên mới!</p></a>
               
            </div>
            <div class="news-content">
                <img src="../GYM/image/zumba_class.jpg" alt="Chạy sáng">
                <a href="#"><p>Tham gia buổi chạy sáng thứ 7 hàng tuần cùng cộng đồng yêu thể thao của GYM CR7.</p></a>
            </div>
        </div>
        <div class="news-box">
            <div class="news-title">Tin nổi bật</div>
            <div class="news-content">
                <img src="../GYM/image/trainer1.jpg" alt="Huấn luyện viên Nguyễn Văn A">
                <a href="#"><p>Huấn luyện viên nổi tiếng Nguyễn Văn A sẽ có buổi giao lưu tại GYM CR7 vào cuối tuần này.</p></a>
            </div>
            <div class="news-content">
                <img src="../GYM/image/trainer2.jpg" alt="Lớp Kickboxing">
                <a href="#"><p>Lớp Kickboxing sẽ được tổ chức vào thứ Tư và thứ Sáu hàng tuần. Đăng ký ngay để tham gia!</p></a>
            </div>
            <div class="news-content">
                <img src="../GYM/image/trainer3.jpg" alt="Lớp tập tạ">
                <a href="#"><p>Lớp tập tạ chuyên sâu dành cho mọi trình độ sẽ khai giảng vào tuần sau. Hãy sẵn sàng để bứt phá!</p></a>
            </div>
            <div class="news-content">
                <img src="../GYM/image/equipment.jpg" alt="Lớp Zumba">
                <a href="#"><p>Trải nghiệm lớp Zumba miễn phí vào cuối tuần này! Một cách tuyệt vời để vừa vui vừa khỏe.</p></a>
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
    <?php
}
?>
<script>
    window.addEventListener("scroll", function () {
  const buttons = document.querySelector(".floating-buttons");
  if (window.scrollY > 100) {
    buttons.style.opacity = "1";
  } else {
    buttons.style.opacity = "0";
  }
});

</script>