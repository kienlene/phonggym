
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../GYM/css/thongtin.css">
    <style>
/* Sidebar */
.sidebar {
    background-color: #f9f9f9;
    padding: 20px;
    width: 350px; /* Giữ nguyên chiều rộng */
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); /* Tạo đổ bóng rõ ràng hơn */
    text-align: center;
    font-family: 'Roboto', sans-serif; /* Font chữ hiện đại */
    transition: all 0.3s ease-in-out;
}

.sidebar:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25); /* Hiệu ứng nổi hơn khi hover */
    /* transform: translateY(-3px); */
}

/* Ảnh đại diện */
.sidebar .avt_thongtin {
    border-radius: 50%; /* Ảnh tròn */
    width: 90px; /* Kích thước ảnh đại diện */
    height: 90px;
    object-fit: cover;
    margin-bottom: 15px;
    border: 2px solid #007bff; /* Viền xanh nổi bật */
    transition: transform 0.3s ease-in-out;
}

.sidebar .avt_thongtin:hover {
    transform: scale(1.1); /* Phóng to nhẹ khi hover ảnh */
}

/* Thông tin */
.sidebar .info {
    margin-bottom: 15px; /* Khoảng cách giữa các đoạn */
    font-size: 18px;
    color: #333; /* Màu chữ tối nhẹ */
    line-height: 1.6; /* Khoảng cách dòng dễ đọc */
    text-align: left; /* Căn trái văn bản */
}

.sidebar .info strong {
    font-weight: bold; /* Làm nổi bật tiêu đề */
    color: royalblue; /* Màu xanh nhấn mạnh */
}

.sidebar .info span {
    display: block;
    margin-top: 5px; /* Khoảng cách nhỏ cho mỗi dòng */
    font-size: 13px;
    color: #555; /* Màu phụ cho nội dung */
}

/* Nút bấm */
.sidebar .btn {
    display: inline-block;
    padding: 12px 20px;
    margin-top: 15px;
    border-radius: 8px;
    background-color: #007bff; /* Nền xanh */
    color: #fff;
    font-size: 15px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.sidebar .btn:hover {
    background-color: #0056b3; /* Đổi màu xanh đậm khi hover */
    transform: scale(1.1); /* Phóng to nhẹ */
}

/* Responsive cho màn hình nhỏ */
@media (max-width: 768px) {
    .sidebar {
        width: 90%; /* Sidebar chiếm toàn bộ chiều rộng màn hình */
        padding: 15px;
    }

    .sidebar .avt_thongtin {
        width: 70px;
        height: 70px;
    }

    .sidebar .info {
        font-size: 13px;
    }

    .sidebar .btn {
        font-size: 14px;
    }
}

    </style>
</head>
<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p -> get_thanhvien($_SESSION["matk"]);
    if($con){
        $row = $con -> fetch_assoc();
        $_SESSION["matv"] = $row["MaTV"];
    }
    
?>

<body>
    
        <div class="sidebar">
            <?php
                
                echo'<img src="../GYM/image/'.$row["HinhAnh"].'" class="avt_thongtin" width="50px">';
            
            
            ?>
            <div class="info">
                <p><strong>Họ & Tên:</strong> <?php echo $row["TenTV"];?></p>
                <p><strong>Ngày sinh:</strong> <?php echo $row["NgaySinh"];?></p>
                <p><strong>Số điện thoại:</strong> <?php echo $row["Sdt"];?></p>
                <p><strong>Email:</strong> <?php echo $row["Email"];?></p>
            </div>
            <!-- <a href="thanhvien.php?capnhat" class="btn">Chỉnh sửa</a> -->
            <a href="thanhvien.php?phanhoi" class="btn">Phản hồi</a>
        </div>
        
</body>
</html>