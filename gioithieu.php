<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../GYM/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../GYM/js/jquery-3.7.1.min.js"></script>
    <script src="../GYM/js/bootstrap.min.js"></script>
    <script src="../GYM/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
}

header {
    margin-bottom: 20px;
}

.banner {
    position: relative;
    text-align: center;
    color: white;
}

.banner img {
    width: 100%;
    height: auto;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
}

.about, .vision-mission, .facilities, .classes, .team {
    padding: 20px;
    margin: 20px 0;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #007bff;
}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

h2 {
    margin-top: 20px;
    font-size: 1.5em;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
}

ul {
    margin: 10px 0;
}

.facility-gallery, .class-list, .team-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.facility, .class, .member {
    flex: 1 1 calc(25% - 15px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.facility img, .class img, .member img {
    width: 100%;
    height: auto;
}

.facility p, .class p {
    padding: 10px;
    text-align: center;
}

.member {
    text-align: center;
}

.member h3 {
    margin: 10px 0;
}

.navbar-search {
    margin-left: 15px;
}

@media (max-width: 768px) {
    .facility, .class, .member {
        flex: 1 1 calc(50% - 15px);
    }
}

@media (max-width: 576px) {
    .facility, .class, .member {
        flex: 1 1 100%;
    }
}
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
}

header {
    margin-bottom: 20px;
}

.banner {
    position: relative;
    text-align: center;
    color: white;
}

.banner img {
    width: 100%;
    height: auto;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
}

.about, .vision-mission, .facilities, .classes, .team {
    padding: 20px;
    margin: 20px 0;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #007bff;
}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

h2 {
    margin-top: 20px;
    font-size: 1.5em;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
}

ul {
    margin: 10px 0;
}

.facility-gallery, .class-list, .team-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.facility, .class, .member {
    flex: 1 1 calc(25% - 15px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s;
}

.facility img, .class img, .member img {
    width: 100%;
    height: 200px; /* Set a fixed height for uniformity */
    object-fit: cover; /* Maintain the aspect ratio while covering the area */
    transition: transform 0.3s;
}

.facility p, .class p {
    padding: 10px;
    text-align: center;
}

.member {
    text-align: center;
    flex: 1 1 calc(33% - 15px); /* Adjust for three members in a row */
}

.member img {
    height: 450px; /* Uniform height for all trainer images */
}

.member h3 {
    margin: 10px 0;
}

/* Hover effects */
.facility:hover img, .class:hover img, .member:hover img {
    transform: scale(1.1);
}

.navbar-search {
    margin-left: 15px;
}

@media (max-width: 768px) {
    .facility, .class, .member {
        flex: 1 1 calc(50% - 15px);
    }
}

@media (max-width: 576px) {
    .facility, .class, .member {
        flex: 1 1 100%;
    }
}
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
    <div class="container-fluid px-0"></div>
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
        <main>
            <section class="banner">
                <img src="../GYM/image//gym_banner.jpg">
                <div class="banner-text">
                    <h1>Vươn Tới Sức Mạnh Đỉnh Cao!</h1>
                    <p>Khám phá không gian tập luyện hoàn hảo tại <b>GYM CR7</b></p>
                </div>
            </section>

            <section class="about">
                <h1>Chào mừng đến với GYM CR7</h1>
                <p>
                    Chúng tôi tin rằng sức khỏe là tài sản quý giá nhất của mỗi người. Với GYM CR7, bạn không chỉ đến để tập luyện, mà còn bước vào một cộng đồng sôi động, nơi bạn được truyền cảm hứng để sống khỏe mạnh và tràn đầy năng lượng mỗi ngày.
                </p>
                <p>
                    Được thành lập với mục tiêu nâng cao chất lượng cuộc sống của mọi người, GYM CR7 mang đến môi trường luyện tập chuyên nghiệp, thân thiện, và luôn sẵn sàng đồng hành cùng bạn trên hành trình chinh phục sức khỏe.
                </p>
                <p>
                    <b>Tại đây, bạn sẽ tìm thấy:</b>
                    <ul style="list-style-type:none;">
                        <li>&#9900; Không gian tập luyện hiện đại và thoải mái.</li>
                        <li>&#9900; Sự hỗ trợ tận tình từ đội ngũ huấn luyện viên giàu kinh nghiệm.</li>
                        <li>&#9900; Các chương trình tập luyện đa dạng, phù hợp với mọi lứa tuổi và cấp độ.</li>
                    </ul>
                </p>
            </section>

            <section class="vision-mission">
                <h2>Tầm Nhìn</h2>
                <p>
                    Tầm nhìn của chúng tôi là trở thành trung tâm thể dục thể hình hàng đầu tại thành phố Hồ Chí Minh và là lựa chọn số một của những người yêu thích sức khỏe và thể thao.
                </p>
                <p>
                    Chúng tôi định hướng không chỉ là nơi tập luyện, mà còn là một cộng đồng giúp mỗi cá nhân đạt được sự cân bằng hoàn hảo giữa thể chất và tinh thần. Với những nỗ lực không ngừng, GYM CR7 mong muốn:
                </p>
                <ul>
                    <li>Thúc đẩy lối sống lành mạnh và ý thức chăm sóc sức khỏe trong cộng đồng.</li>
                    <li>Mở rộng hệ thống cơ sở vật chất đạt chuẩn quốc tế.</li>
                    <li>Đáp ứng nhu cầu cá nhân hóa của từng hội viên với các dịch vụ và chương trình tập luyện tối ưu.</li>
                </ul>

                <h2>Sứ Mệnh</h2>
                <p>
                    Sứ mệnh của chúng tôi là mang đến cơ hội tập luyện đẳng cấp và dịch vụ chăm sóc toàn diện cho mọi khách hàng. Với đội ngũ huấn luyện viên giàu kinh nghiệm cùng trang thiết bị tối tân, GYM CR7 cam kết hỗ trợ bạn:
                </p>
                <ul>
                    <li>Đạt được mục tiêu sức khỏe và thể hình một cách an toàn, khoa học.</li>
                    <li>Cảm nhận sự khác biệt trong từng bài tập nhờ các phương pháp hiện đại.</li>
                    <li>Tìm thấy động lực và niềm vui mỗi ngày khi tham gia tập luyện.</li>
                </ul>
                <p>
                    Chúng tôi không chỉ dừng lại ở việc nâng cao sức mạnh thể chất, mà còn chú trọng tạo ra giá trị tinh thần, giúp bạn trở nên tự tin hơn và hạnh phúc hơn trong cuộc sống.
                </p>
            </section>

            <section class="facilities">
                <h2>Cơ sở vật chất hiện đại</h2>
                <div class="facility-gallery">
                    <div class="facility">
                        <img src="../GYM/image/equipment.jpg" alt="Trang thiết bị hiện đại">
                        <p>Trang thiết bị hiện đại đáp ứng mọi bài tập.</p>
                    </div>
                    <div class="facility">
                        <img src="../GYM/image/cardio_area.jpg" alt="Khu vực Cardio">
                        <p>Khu vực Cardio rộng rãi với máy móc nhập khẩu.</p>
                    </div>
                    <div class="facility">
                        <img src="../GYM/image/weight_area.jpg" alt="Khu vực tạ tự do">
                        <p>Khu vực tạ tự do dành cho người tập luyện chuyên nghiệp.</p>
                    </div>
                    <div class="facility">
                        <img src="../GYM/image/locker_room.jpg" alt="Phòng thay đồ">
                        <p>Phòng thay đồ tiện nghi và sạch sẽ.</p>
                    </div>
                </div>
            </section>

            <section class="classes">
                <h2>Các Lớp Tập Đa Dạng</h2>
                <div class="class-list">
                    <div class="class">
                        <img src="../GYM/image/yoga_class.jpg" alt="Lớp Yoga">
                        <h3>Lớp Yoga</h3>
                        <p>Thư giãn cơ thể và tinh thần với các bài tập yoga chuyên sâu.</p>
                    </div>
                    <div class="class">
                        <img src="../GYM/image/zumba_class.jpg" alt="Lớp Zumba">
                        <h3>Lớp Zumba</h3>
                        <p>Đốt cháy calo qua từng điệu nhảy sôi động.</p>
                    </div>
                    <div class="class">
                        <img src="../GYM/image/kickboxing_class.jpg" alt="Lớp Kickboxing">
                        <h3>Lớp Kickboxing</h3>
                        <p>Cải thiện sức mạnh và sức bền với kickboxing.</p>
                    </div>
                    <div class="class">
                        <img src="../GYM/image/personal_training.jpg" alt="Huấn luyện cá nhân">
                        <h3>Huấn Luyện Cá Nhân</h3>
                        <p>Chương trình thiết kế riêng cho từng cá nhân.</p>
                    </div>
                </div>
            </section>

            <section class="team">
                <h2>Đội Ngũ Huấn Luyện Viên</h2>
                <div class="team-container">
                    <div class="member">
                        <img src="../GYM/image/avt1.jpg" alt="Huấn luyện viên 1">
                        <h3>Nguyễn Văn A</h3>
                        <p>Chuyên gia về fitness và dinh dưỡng, 15 năm kinh nghiệm.</p>
                    </div>
                    <div class="member">
                        <img src="../GYM/image/avt5.jpg" alt="Huấn luyện viên 2">
                        <h3>Phạm Văn B</h3>
                        <p>Chuyên gia Yoga quốc tế, đạt nhiều chứng chỉ uy tín.</p>
                    </div>
                    <div class="member">
                        <img src="../GYM/image/hlv3.jpg" alt="Huấn luyện viên 3">
                        <h3>Trần Văn C</h3>
                        <p>Nhà vô địch kickboxing, luôn mang đến động lực tập luyện.</p>
                    </div>
                </div>
            </section>
        </main>
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