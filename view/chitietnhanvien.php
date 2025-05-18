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
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .info-item {
            margin: 10px 0;
            padding: 10px;
            border-left: 4px solid #007bff;
            background: #f9f9f9;
        }

        .info-item strong {
            color: #007bff;
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
.avatar1 {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin: 10px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    border: 3px solid #007BFF;
}

    </style>
</head>
<body>

<div class="employee-info">
    <h2>Thông Tin Nhân Viên</h2>
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
            echo "<img src='image/avtNV/" . $anh . "' alt='Avatar' class='avatar1'>";
            echo '<div class="info-item"><strong>Mã Nhân Viên:</strong> ' . $manone. '</div>';
            echo '<div class="info-item"><strong>Tên Nhân Viên:</strong> ' . $ten . '</div>';
            echo '<div class="info-item"><strong>Email:</strong> ' . $email . '</div>';
            echo '<div class="info-item"><strong>Số Điện Thoại:</strong> ' . $sdt . '</div>';
            echo '<div class="info-item"><strong>Ngày Vào Làm:</strong> ' . $ngayvaolam . '</div>';
            echo '<div class="info-item"><strong>Chức Vụ:</strong> ' . $chucvu . '</div>';
            echo "<a class='edit' href='ketoan.php?chitietnhanvien&suanv=" . $_SESSION["manv"] . "'>Sửa thông tin</a>" ;
        }else if(isset($_SESSION["dn2"])) {
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
            echo "<img src='image/avtNV/" . $anh . "' alt='Avatar' class='avatar1'>";
            echo '<div class="info-item"><strong>Mã Nhân Viên:</strong> ' . $manone. '</div>';
            echo '<div class="info-item"><strong>Tên Nhân Viên:</strong> ' . $ten . '</div>';
            echo '<div class="info-item"><strong>Email:</strong> ' . $email . '</div>';
            echo '<div class="info-item"><strong>Số Điện Thoại:</strong> ' . $sdt . '</div>';
            echo '<div class="info-item"><strong>Ngày Vào Làm:</strong> ' . $ngayvaolam . '</div>';
            echo '<div class="info-item"><strong>Chức Vụ:</strong> ' . $chucvu . '</div>';
            echo "<a class='edit' href='kythuatvien.php?chitietnhanvien&suanv=" . $_SESSION["manv"] . "'>Sửa thông tin</a>" ;
        } 
        else if(isset($_SESSION["dn4"])) {
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
            echo "<img src='image/avtNV/" . $anh . "' alt='Avatar' class='avatar1'>";
            echo '<div class="info-item"><strong>Mã Nhân Viên:</strong> ' . $manone. '</div>';
            echo '<div class="info-item"><strong>Tên Nhân Viên:</strong> ' . $ten . '</div>';
            echo '<div class="info-item"><strong>Email:</strong> ' . $email . '</div>';
            echo '<div class="info-item"><strong>Số Điện Thoại:</strong> ' . $sdt . '</div>';
            echo '<div class="info-item"><strong>Ngày Vào Làm:</strong> ' . $ngayvaolam . '</div>';
            echo '<div class="info-item"><strong>Chức Vụ:</strong> ' . $chucvu . '</div>';
            echo "<a class='edit' href='nhanvien.php?chitietnhanvien&suanv=" . $_SESSION["manv"] . "'>Sửa thông tin</a>" ;
        } 
    ?>
</div>

</body>
</html>