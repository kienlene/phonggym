<?php
    session_start();
    if(!isset($_SESSION["dn1"])){
        echo "<script>alert('Vui lòng đăng nhập')</script>";
        echo " <script>window.location.href='index.php'</script> ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân Viên</title>
   <style>
    /* Reset CSS */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Wrapper */
#khung {
    width: 100%;
    height: auto;
    font-family: Arial, sans-serif;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1e88e5;
    color: #fff;
    padding: 15px;
}

#logo {
    margin-right: auto;
}

#logo img {
    height: 50px;
    border-radius: 50%;
}

header input[type="text"] {
    width: 370px;
    padding: 8px 12px;
    border: none;
    border-radius: 20px;
    font-size: 14px;
    margin-right:300px
}

#noidung {
    display: flex;
    align-items: center;
}

#noidung a {
    color: #fff;
    text-decoration: none;
    margin-right: 35px;
    font-size: 20px;
    transition: color 0.3s ease;
}

#noidung a:hover {
    color: #ccc;
}

#avt img {
    height: 40px;
    border-radius: 50%;
    margin-left: 20px;
}

/* Section */
section {
    display: flex;
    height: auto ;
    border-bottom: 1px solid #ddd;
}

/* Article 1 */
#a1 {
    width: 30%;
    background-color: #f1f1f1;
    padding: 20px;
    border-right: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

#a1 a {
    display: block;
    color: #333;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 0;
    transition: color 0.3s ease;
}

#a1 a:hover {
    color: #007bff;
}

#a1 a:not(:last-child) {
    border-bottom: 1px solid #ddd;
}

/* Article 2 */
#a2 {
    width: 70%;
    padding: 20px;
    background-color: #fff;
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
#a2 {
  width: 70%;
  padding: 20px;
  background-color: #fff;
}

.student-info {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.avatar img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-right: 20px;
}

.info p {
  margin-bottom: 5px;
}

.study-info {
  display: flex;
  justify-content: space-between;
}

.study-info .left-col,
.study-info .right-col {
  width: 48%;
  background-color: #f1f1f1;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

#logo {
    display: flex; /* Use flexbox for layout */
    align-items: center; /* Center items vertically */
    
    padding: 2px 4px; /* Padding around the logo */
    border-radius: 5px; /* Rounded corners */
    
}

#logo img {
    width: 60px; /* Set logo width */
    height: auto; /* Maintain aspect ratio */
    margin-right: 15px; /* Space between logo and text */
}

#logo p {
    margin: 0; /* Remove default margin */
}

#logo a {
    text-decoration: none; /* Remove underline */
    color: white; /* Primary color for the text */
    font-size: 24px; /* Font size for the text */
    font-weight: bold; /* Make the text bold */
    transition: color 0.3s; /* Smooth transition for hover effect */
}

#logo a:hover {
    color: red; /* Darker shade on hover */
}

.student-info {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    background-color: #f9f9f9; /* Background sáng cho phần thông tin */
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow nhẹ xung quanh */
    padding: 20px;
    margin-top: 20px; /* Khoảng cách trên */
    transition: all 0.3s ease; /* Hiệu ứng khi di chuột */
}

.student-info:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow đậm hơn khi hover */
    background-color: #eaf2ff; /* Màu nền thay đổi khi hover */
}

.avatar img {
    width: 120px; /* Cân chỉnh kích thước avatar */
    height: 120px;
    border-radius: 50%; /* Bo tròn ảnh */
    margin-right: 30px; /* Khoảng cách giữa ảnh và thông tin */
    border: 4px solid #1e88e5; /* Border màu xanh cho ảnh */
    transition: all 0.3s ease; /* Hiệu ứng chuyển động khi hover */
}

.avatar img:hover {
    transform: scale(1.1); /* Phóng to ảnh khi hover */
}

.info {
    flex-grow: 1; /* Chiếm toàn bộ không gian còn lại */
}

.info p {
    font-size: 16px;
    line-height: 1.6;
    color: #333; /* Màu chữ */
    margin-bottom: 12px;
    font-weight: 500; /* Tạo sự nổi bật cho các thông tin */
}

.info p span {
    font-weight: 600; /* Làm đậm các nhãn thông tin */
    color: #1e88e5; /* Màu xanh cho các nhãn */
}

.study-info {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    margin-bottom: 20px;
}

.study-info .left-col, .study-info .right-col {
    width: 48%;
    background-color: #f1f1f1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.study-info .left-col h3, .study-info .right-col h3 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.study-info .left-col p, .study-info .right-col p {
    font-size: 16px;
    color: #555;
}
/* Định dạng cho liên kết */
.menu-link {
    text-decoration: none;
    padding: 5px;
    color: black;
}

/* Định dạng cho liên kết khi hover hoặc focus */
.menu-link:hover, .menu-link:focus {
    background-color: #f0f0f0;
    text-decoration: underline;
    color: #007BFF;
}

/* Định dạng cho liên kết đã chọn */
.menu-link.active {
    background-color: #d3e0ea; /* Màu nền khi chọn */
    color: #0056b3; /* Màu chữ khi chọn */
    font-weight: bold;
}
/* Container của avatar và menu */
.avatar-container {
    position: relative;
    display: inline-block;
}

/* Hình ảnh avatar */
.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
}

.avatar-container {
    position: relative;
    display: inline-block;
}

#ten{
    float: left;
    margin-top:10px;
}
.welcome-message {
    background-color: #f0f8ff;
    border: 1px solid #007bff;
    border-radius: 8px;
    padding: 20px;
    margin: 20px 0;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.welcome-message h2 {
    color: #007bff;
    font-size: 1.8rem;
}

.welcome-message .user-name {
    font-weight: bold;
    color: #d9534f; /* Màu sắc nổi bật cho tên người dùng */
}

.welcome-message p {
    font-size: 1.2rem;
    margin: 10px 0;
}

.welcome-message .welcome-image {
    width: 100px; /* Kích thước hình ảnh */
    height: auto;
    margin-top: 10px;
    border-radius: 50%; /* Bo tròn hình ảnh */
}
/* DROPDOWMN */
.user-dropdown {
      position: relative;
      display: inline-block;
      cursor: pointer;
      margin-left: 10px;
      top: 5px;
}

  .user-info a{
      display: flex;
      align-items: center;
      gap: 2px; /* Khoảng cách giữa ảnh và tên */
      color: white;
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
    <div id="khung">
        <header>
            <div id="logo">
                <a href="ketoan.php"><img src="../GYM/image/logo.jpg" alt="" srcset=""></a>
                <p style="float:right"><a href="ketoan.php">GYM CR7</a></p>
            </div>
            
           
            <div id="noidung">
                <a href="ketoan.php">Trang chủ</a>
                <a href="ketoan.php?thongbao">Thông báo</a>
                <?php
                    include_once("controller/getdangnhap.php");
                    $p = new GetDangNhap();
                    if(isset($_SESSION["dn1"])) {
                        $matk = $_SESSION["manv"];
                        $con1 = $p -> Lay1NV($matk);
                        if($con1){
                            $r1 = $con1 -> fetch_assoc();
                            $anh = $r1["HinhAnhNV"];
                            $manone = $r1["MaNV"];
                            $ten = $r1["TenNV"];
                            $email = $r1["Email"];
                            $sdt = $r1["Sdt"];
                            $ngayvaolam = $r1["NgayVaoLam"];
                            $chucvu = $r1["TenCV"];
                            $macv = $r1["MaCV"];
                        }

                    }
                ?>
            <div class="user-dropdown">
                <div class="user-info">
                    <?php
                        echo '
                            <a href="nhanvien.php">
                                <img src="../GYM/image/avtNV/'.$anh.'" alt="" class="user">
                                <span>'.$ten.'</span>
                            </a>
                        ';
                    ?> 
                </div>
                <div class="dropdown-menu">
                    <ul>
                        <?php
                        echo'
                        <li><a style="color: black;" href="ketoan.php?chitietnhanvien">Cập nhật</a></li>
                        <li><a style="color: black;" href="ketoan.php?doimatkhau">Đổi mật khẩu</a></li>
                        <li><a style="color: black;" href="ketoan.php?dangxuat">Đăng xuất</a></li>
                        ';
                        ?>  
                    </ul>
                </div>
            </div>
                
            </div>
        </header>
        <section>
            <article id="a1">
            <a href="ketoan.php?xemhoadon">Danh Sách Hóa Đơn</a>
            <a href="ketoan.php?khchuatt">Danh Sách Hóa Đơn Chưa Thanh Toán</a>
            <a href="ketoan.php?dangxuat" >Đăng xuất</a>
            </article>
            <article id="a2">
    <?php
        if(isset($_REQUEST["chitietnhanvien"])){
            if(isset($_REQUEST["suanv"])){
                include_once("view/suathongtincanhannhanvien.php");
            } else {
                include_once("view/chitietnhanvien.php");
            }
        }else if(isset($_REQUEST["doimatkhau"])){
            include_once("view/doimatkhauNV.php");
        }else if(isset($_REQUEST["dangxuat"])){
            include_once("view/dangxuat.php");
        }else if(isset($_REQUEST["xemhoadon"])){
            if(isset($_REQUEST["page"])){
                include_once("view/danhsachhoadon.php");
            }else{
                include_once("view/danhsachhoadon.php");
            }  
        }else if(isset($_REQUEST["khchuatt"])){
            if(isset($_REQUEST["page"])){
                include_once("view/danhsachhoadonchuathanhtoan.php");
            }else{
                include_once("view/danhsachhoadonchuathanhtoan.php");
            } 
        }elseif(isset($_REQUEST["thongbao"])){
            include_once("view/thongbao.php");
        }
    ?>
    
    <?php
        // Kiểm tra nếu không phải đang xem chi tiết nhân viên thì mới hiển thị phần thông tin chào mừng
        if (!isset($_REQUEST["chitietnhanvien"]) && 
            !isset($_REQUEST["doimatkhau"]) && 
            !isset($_REQUEST["xemhoadon"])&&
            !isset($_REQUEST["khchuatt"])&&
            !isset($_REQUEST["thongbao"])) {
    ?>
        <div class="student-info">
            <div class="avatar">
                <!-- Thêm ảnh đại diện ở đây nếu cần -->
            </div>
            <div class="info">
                <?php
                    if (isset($_SESSION["dn1"])) {
                        $ten = $_SESSION["ten"];
                        echo "<div class='welcome-message'>";
                        echo "<h2>Chào mừng trở lại, <span class='user-name'>$ten</span>!</h2>";
                        echo "<p>Chúc bạn một ngày làm việc tốt lành!</p>";
                        echo "<img src='../GYM/image/hi.jpg' alt='Welcome Image' class='welcome-image'>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    <?php
        }
    ?>
</article>

        </section>
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
    </div>
    <script>
        // Lắng nghe sự kiện click trên tất cả các liên kết
        document.querySelectorAll('.menu-link').forEach(function(link) {
            link.addEventListener('click', function() {
                // Lưu trạng thái liên kết được chọn vào localStorage
                localStorage.setItem('selectedLink', this.href);
            });
        });

        // Khi trang được tải lại, kiểm tra xem có liên kết nào được chọn không
        window.addEventListener('load', function() {
            const selectedLink = localStorage.getItem('selectedLink');
            if (selectedLink) {
                // Lấy tất cả các liên kết
                document.querySelectorAll('.menu-link').forEach(function(link) {
                    // Kiểm tra xem URL của liên kết có khớp với liên kết đã chọn không
                    if (link.href === selectedLink) {
                        // Thêm lớp 'active' vào liên kết đã chọn
                        link.classList.add('active');
                    } else {
                        // Xóa lớp 'active' khỏi các liên kết còn lại
                        link.classList.remove('active');
                    }
                });
            }
        });

        document.querySelectorAll('.avatar-container').forEach(container => {
        container.addEventListener('mouseenter', () => {
            const menu = container.querySelector('.menu-drop');
            const rect = menu.getBoundingClientRect();

            // Kiểm tra nếu menu tràn ra ngoài màn hình
            if (rect.right > window.innerWidth) {
                menu.style.left = 'auto';
                menu.style.right = '0';
            }

            if (rect.bottom > window.innerHeight) {
                menu.style.top = 'auto';
                menu.style.bottom = '100%';
            }
        });
});


    </script>
</body>
</html>