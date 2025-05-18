<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../GYM/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../GYM/js/jquery-3.7.1.min.js"></script>
    <script src="../GYM/js/bootstrap.min.js"></script>
    <script src="../GYM/js/bootstrap.bundle.min.js"></script>
    <style>
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
    
    <div class="container-fluid px-0">
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
    <br> <br> <br> <br>
        <main class="container mx-auto mt-10">
            <h2 class="text-4xl text-center mb-8"><b>Liên hệ với chúng tôi</b></h2>
            <div class="container">
                <div class="card mx-auto shadow-lg" style="max-width: 30rem;">
                    <div class="card-body">
                        <form id="contactForm" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label class="form-label">Họ và Tên</label>
                                <input type="text" id="fullName" class="form-control" onblur="handleBlur('fullName')"
                                    oninput="handleInput('fullName')">
                                <div id="fullNameError" class="text-danger small"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" onblur="handleBlur('email')"
                                    oninput="handleInput('email')">
                                <div id="emailError" class="text-danger small"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số Điện Thoại</label>
                                <input type="text" id="phoneNumber" class="form-control" onblur="handleBlur('phoneNumber')"
                                    oninput="handleInput('phoneNumber')">
                                <div id="phoneNumberError" class="text-danger small"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tin Nhắn</label>
                                <textarea id="message" class="form-control" rows="4" onblur="handleBlur('message')"
                                    oninput="handleInput('message')"></textarea>
                                <div id="messageError" class="text-danger small"></div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <br>
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
        const fieldValidationState = {};
        const validators = {
            fullName: {
                validate: (value) => /^[a-zA-ZÀ-ỹ\s]+$/.test(value),
                emptyMessage: "Vui lòng nhập họ và tên.",
                invalidMessage: "Họ và tên chỉ được chứa chữ cái và khoảng trắng.",
            },
            email: {
                validate: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
                emptyMessage: "Vui lòng nhập email.",
                invalidMessage: "Email không hợp lệ.",
            },
            phoneNumber: {
                validate: (value) => /^[0-9]{10,11}$/.test(value),
                emptyMessage: "Vui lòng nhập số điện thoại.",
                invalidMessage: "Số điện thoại không hợp lệ.",
            },
            message: {
                validate: (value) => value.trim() !== "",
                emptyMessage: "Vui lòng nhập tin nhắn.",
                invalidMessage: "Tin nhắn không hợp lệ.",
            },
        };
        function validateField(fieldId) {
            const { validate, emptyMessage, invalidMessage } = validators[fieldId];
            const value = document.getElementById(fieldId).value.trim();
            const errorEl = document.getElementById(`${fieldId}Error`);

            if (!value) {
                errorEl.innerText = emptyMessage;
                return false;
            } else if (!validate(value)) {
                errorEl.innerText = invalidMessage;
                return false;
            } else {
                errorEl.innerText = "";
                return true;
            }
        }
        function handleBlur(fieldId) {
            if (!validateField(fieldId)) {
                fieldValidationState[fieldId] = true;
            }
        }
        function handleInput(fieldId) {
            if (fieldValidationState[fieldId]) validateField(fieldId);
        }
        function validateForm() {
            let isValid = true;
            Object.keys(validators).forEach((fieldId) => {
                if (!validateField(fieldId)) {
                    fieldValidationState[fieldId] = true;
                    isValid = false;
                }
            });
            if (isValid) {
                alert("Thông tin của bạn đã được gửi thành công!");
                document.getElementById("contactForm").reset();
                Object.keys(fieldValidationState).forEach((key) => (fieldValidationState[key] = false));
            }
            return false;
        }
    </script>
</body>