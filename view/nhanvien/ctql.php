<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        
        .employee-info {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: auto;
    text-align: center; /* Đảm bảo căn giữa avatar và tiêu đề */
}

h2 {
    text-align: center;
    color: #333;
}

.avatar-container {
    margin: 20px 0; /* Khoảng cách trên dưới */
}

.avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%; /* Biến ảnh thành hình tròn */
    object-fit: cover; /* Giữ tỷ lệ hình ảnh */
    border: 4px solid #007bff; /* Đường viền màu xanh dương */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng */
}

.info-item {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    margin: 10px 0;
    padding: 10px;
    border-left: 4px solid #007bff;
    background: #f9f9f9;
}

.info-item strong {
    color: #007bff;
    min-width: 200px; /* Đặt độ rộng cố định cho tiêu đề */
    text-align: left; /* Căn trái tiêu đề */
}

.info-item span {
    color: #333;
    margin-left: 20px; /* Giữ khoảng cách giữa tiêu đề và giá trị */
    text-align: left; /* Căn trái nội dung */
}

.edit {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
    font-weight: bold;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, box-shadow 0.3s;
}

.edit:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.edit:active {
    background-color: #004080;
    box-shadow: none;
}


/* CSS căn chỉnh ảnh avatar */
.avatar-container {
    display: flex;           /* Sử dụng flexbox để căn giữa */
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center;     /* Căn giữa theo chiều dọc */
    height: 100%;            /* Chiều cao container, có thể là chiều cao form */
}

.avatar {
    width: 200px;            /* Kích thước avatar */
    height: 200px;           /* Đảm bảo chiều cao bằng chiều rộng */
    border-radius: 50%;      /* Cắt ảnh thành hình tròn */
    object-fit: cover;       /* Cắt ảnh gọn trong khung hình tròn */
    border: 2px solid #ccc;  /* Thêm viền nếu cần */
}


    </style>
</head>
<body>

<div class="employee-info">
    <h2>Thông Tin Quản Lý</h2>
    <!-- <?php
        // include_once("controller/getdangnhap.php");
        // $p = new GetDangNhap();
        // if(isset($_SESSION["dn"])) {
        //     $matk = $_SESSION["manv"];
        //     $con1 = $p -> Lay1NV($matk);
        //     if($con1){
        //         $r1 = $con1 -> fetch_assoc();
        //         $manone = "NV01";
        //         $ten = "Trịnh Ngọc Tuấn Kiệt";
        //         $email = "Kiettrinh392003@gmail.com";
        //         $sdt = "0385267380";
        //         $ngayvaolam = "20/11/2024";
        //         $chucvu = "Quản Lý";
        //         $macv = "1";
        //         $ma = '15'; //tài khoản quản lí
        // //     }
            // echo '<div class="avatar-container"><img src="../GYM/image/avtnv/nv5.jpg" alt="User Avatar" class="avatar"></div>';
            // echo '<div class="info-item"><strong>Mã Nhân Viên:</strong>'.$manone.'</div>';
            // echo '<div class="info-item"><strong>Tên Nhân Viên:</strong> ' . $ten . '</div>';
            // echo '<div class="info-item"><strong>Email:</strong> ' . $email . '</div>';
            // echo '<div class="info-item"><strong>Số Điện Thoại:</strong> ' . $sdt . '</div>';
            // echo '<div class="info-item"><strong>Ngày Vào Làm:</strong> ' . $ngayvaolam . '</div>';
            // echo '<div class="info-item"><strong>Chức Vụ:</strong> ' . $chucvu . '</div>';
            // echo "<a class='edit-button' href='?snv=" . $ma . "'>Sửa thông tin</a>";
        //}
    ?> -->



<?php
include_once("controller/getdangnhap.php");
$p = new GetDangNhap();

// Lấy mã nhân viên từ tham số hoặc thiết lập mặc định
$matk =$_SESSION["manv"];

$con1 = $p->Lay1NV($matk);
if ($con1 && $r1 = $con1->fetch_assoc()) {
    $anh = $r1["HinhAnhNV"];
    $manone = "QL01";
    $ten = $r1["TenNV"];
    $email = $r1["Email"];
    $sdt = $r1["Sdt"];
    $ngayvaolam = $r1["NgayVaoLam"];
    $chucvu = $r1["TenCV"];
    $macv = $r1["MaCV"];

    // Kiểm tra hình ảnh
    $imagePath = "image/avtNV/" . $anh;
    if (!file_exists($imagePath) || empty($anh)) {
        $imagePath = "image/default-avatar.png"; // Ảnh mặc định
    }

    echo '<div class="avatar-container"><img src="' . $imagePath . '" alt="User Avatar" class="avatar"></div>';
    echo '<div class="info-item"><strong>Tên Quản Lý:</strong> ' . $ten . '</div>';
    echo '<div class="info-item"><strong>Email:</strong> ' . $email . '</div>';
    echo '<div class="info-item"><strong>Số Điện Thoại:</strong> ' . $sdt . '</div>';
    echo '<div class="info-item"><strong>Ngày Vào Làm:</strong> ' . $ngayvaolam . '</div>';
    echo '<div class="info-item"><strong>Chức Vụ:</strong> ' . $chucvu . '</div>';
    echo "<a class='edit' href='quanly.php?capnhattt'>Sửa thông tin</a>";
} else {
    echo "<p>Không tìm thấy thông tin nhân viên.</p>";
}
?>


</body>
</html>