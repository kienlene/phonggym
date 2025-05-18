<?php
include_once("controller/cthanhvien.php");
$p = new Cthanhvien();

if (isset($_REQUEST["timkiemhh"])) {
    $ma = $_REQUEST["texttimkiemhh"];
    $con = $p->gettimkiemkhachhanghh($ma);
} else {
    $con = $p->getdanhsachthanviengoitapnhohon20();
}

if ($con && $con !== 0) {
    // Nếu $con có giá trị và không phải là 0, tức là có kết quả trả về
    echo "<table id='a30' class='member-table'>";
echo "<tr>";
echo "<td>STT</td>";
echo "<td>Mã Thành Viên</td>";
echo "<td>Tên Thành Viên</td>";
echo "<td>Gói Tập</td>";
echo "<td>Buổi tập còn lại</td>";
echo " <td>Trạng Thái Gửi Mail</td> ";
echo " <td>Cập nhật TT Email</td> ";
echo "<td><center>Actions</center></td>";
$stt = 1;
while ($r = $con->fetch_assoc()) {
    $maHD = $r["MaHD"];
    $tinhtrang = "Đã Gửi";
    if (isset($_REQUEST["mahd"])) {
        if ($p->capNhatHD($maHD, $tinhtrang)) {
            echo ' <script>alert("Cập nhật thành công")</script> ';
            echo '<script>window.location.href="nhanvien.php?dstvhh"</script>';
        }
    }
    $tenTV = $r["TenTV"];
    $tenGT = $r["TenGT"];
    $soBuoiConLai = $r["SoBuoiTapConLai"];
    $tinhTrangMail = $r["TinhTrangMail"];

    // Nội dung email mặc định
    $emailSubject = "Thông báo gói tập và buổi tập còn lại";
    $emailBody = "Xin chào, $tenTV.\n\nThông báo về gói tập của bạn: $tenGT.\nSố buổi tập còn lại: $soBuoiConLai.\nNhanh chân gia hạn để nhận ưu đãi 30%!";
    $emailTo = "example@email.com";  // Bạn có thể thay đổi email này nếu muốn gửi đến email mặc định

    // Mã URL để gửi email với nội dung mặc định
    $mailtoLink = "mailto:$emailTo?subject=" . urlencode($emailSubject) . "&body=" . urlencode($emailBody);

    echo "<tr>";
    echo "<td>" . $stt++ . "</td>";
    echo "<td>" . $r["MaTV"] . "</td>";
    echo "<td>" . $r["TenTV"] . "</td>";
    echo "<td>" . $r["TenGT"] . "</td>";
    echo "<td>" . $r["SoBuoiTapConLai"] . "</td>";
    echo " <td>".$r["TinhTrangMail"]."</td> ";
    echo "<td  ><a style='background-color: #FFA500;' href='nhanvien.php?dstvhh&&mahd=".$maHD."' class='email-button'>Cập nhật</a></td>";
    // Hiển thị liên kết gửi email
    echo "<td><a href='$mailtoLink' class='email-button' target='_blank'>Gửi mail</a></td>";
    echo "</tr>";
}
echo "</table>";
} elseif ($con ==0 && $con == True) {
    // Nếu $con là 0, nghĩa là không có thành viên nào có gói tập sắp hết hạn
    echo "thành viên vẫn còn thời gian lớn hơn mức báo động ";
} else {
    // Nếu $con là false, nghĩa là không kết nối được cơ sở dữ liệu
    echo "Không tồn tại thành viên";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        

        .search-container {
            margin: 20px 0; /* Adds space above and below the search form */
        }

        .search-container input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px; /* Rounded corners */
            width: 250px; /* Set a fixed width for the input */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .search-container input[type="text"]:focus {
            border-color: #007BFF; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        .search-container input[type="submit"] {
            padding: 10px 15px; /* Adds padding for the button */
            border: none; /* Remove default border */
            border-radius: 4px; /* Rounded corners */
            background-color: #007BFF; /* Button background color */
            color: white; /* Button text color */
            cursor: pointer; /* Change cursor to pointer on hover */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .search-container input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        /* Đặt phong cách tổng quát */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Container chi tiết khách hàng */
.details-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Tiêu đề */
.details-container h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 15px;
    border-bottom: 2px solid #007BFF;
    padding-bottom: 10px;
}


/* Đặt chung cho tất cả nút */
.details-container a {
    text-decoration: none;
    display: inline-block;
    padding: 10px 20px;
    margin-top: 15px;
    margin-right: 10px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

/* Nút Sửa */
.details-container .edit {
    background-color: #FFC107; /* Màu vàng */
}

.details-container .edit:hover {
    background-color: #FFA000; /* Màu vàng đậm hơn khi hover */
}

/* Nút Xóa */
.details-container .delete {
    background-color: #DC3545; /* Màu đỏ */
}

.details-container .delete:hover {
    background-color: #C82333; /* Màu đỏ đậm hơn khi hover */
}
    /* Phong cách cho nút gửi email */
a.email-button {
    display: inline-block;
    padding: 10px 20px; /* Kích thước nút */
    background-color: #007BFF; /* Màu nền */
    color: white; /* Màu chữ */
    font-weight: bold; /* Đậm chữ */
    text-align: center;
    border-radius: 4px; /* Bo tròn góc */
    text-decoration: none; /* Bỏ gạch chân */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu nền */
}

a.email-button:hover {
    background-color: #0056b3; /* Màu nền khi hover */
    cursor: pointer; /* Con trỏ chuột dạng tay khi hover */
}


</style>
</head>
<body>
    
</body>
</html>