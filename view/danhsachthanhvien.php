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
            padding: 12px;
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

        .actions a {
            text-decoration: none;
            border: 1px solid transparent;
            border-radius: 4px;
            padding: 5px 10px; /* Add some padding */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .actions a.view-detail {
            color: blue; /* Đặt màu chữ cho nút "Xem Chi tiết" là màu đen */
        }

        .actions a.view-detail:hover {
            background-color: #e9f5ff; /* Thay đổi màu nền khi hover */
        }

        .actions a.edit {
            background-color: #FFC107; /* Yellow background for Edit button */
            color: white; /* Text color */
        }

        .actions a.edit:hover {
            background-color: #FFA000; /* Darker shade on hover */
        }

        .actions a.delete {
            background-color: #DC3545; /* Red background for Delete button */
            color: white; /* Text color */
        }

        .actions a.delete:hover {
            background-color: #C82333; /* Darker shade on hover */
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

/* Phong cách cho avatar */
.avatar1 {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin: 10px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    border: 3px solid #007BFF;
}

/* Thông tin chi tiết khách hàng */
.details-container p {
    font-size: 16px;
    color: #555;
    margin: 8px 0;
    line-height: 1.6;
}

.details-container p strong {
    color: #007BFF;
}

/* Responsive cho thiết bị nhỏ */
@media (max-width: 600px) {
    .details-container {
        padding: 15px;
    }
    .details-container h2 {
        font-size: 20px;
    }
    .details-container p {
        font-size: 14px;
    }
    .avatar {
        width: 100px;
        height: 100px;
    }
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
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    font-family: Arial, sans-serif;
    width: 100%;
    text-align: left;
    border-radius: 8px 8px 0 0;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
    font-weight: bold;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}
</style>



    </style>
</head>
<body>
    <?php
        include_once("controller/cthanhvien.php");
        $p = new Cthanhvien();
        if(isset($_REQUEST["timkiem"])){
            $makh = $_REQUEST["texttimkiem"];
            $con = $p->gettimkiemkhachhang($makh);
        }else if(isset($_REQUEST["cttv"])){
            $makh = $_REQUEST["cttv"];
            $con1 = $p -> getchitietkhachhang($makh);
        }else{
            $con = $p->getdanhsachthanvien();
        }
        if (isset($con) && $con) {
            echo "<table id='a30' class='member-table'>";
            echo "<tr>";
            echo "<td>STT</td>";
            echo "<td>Mã Thành Viên</td>";
            echo "<td>Tên Thành Viên</td>";
            echo "<td>Gói Tập</td>";
            echo "<td><center>Actions</center></td>";
            $stt = 1;
            while ($r = $con->Fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $stt++ . "</td>";
                echo "<td>" . $r["MaTV"] . "</td>";
                echo "<td>" . $r["TenTV"] . "</td>";
                echo "<td>" . $r["TenGT"] . "</td>";
                echo "<td class='actions'>
                    <a class='view-detail' href='nhanvien.php?cttv=" . $r["MaTV"] . "'>Xem Chi tiết</a>
                    <a class='edit' href='nhanvien.php?suatv=" . $r["MaTV"] . "'>Sửa</a>
                    <a class='delete' href='nhanvien.php?xoatv=" . $r["MaTV"] ."' onclick= ' return confirm(\"Bạn có chắc muốn xóa thành viên này\")'  >Xóa</a>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        }else if ( isset($con)&& $con == 0) {
            echo "Không có dữ liệu KH";
        }else if(isset($con1) &&$con1 ){
            $customer = $con1->fetch_assoc();
            $ma = $customer["MaTV"];
            echo "<div class='details-container'>";
            echo "<h2>Chi Tiết Khách Hàng</h2>";
            echo "<img src='image/avtKH/" . $customer["HinhAnh"] . "' alt='Avatar' class='avatar1'>";
            echo "<p><strong>Mã Thành Viên:</strong> " . $customer["MaTV"] . "</p>";
            echo "<p><strong>Tên Thành Viên:</strong> " . $customer["TenTV"] . "</p>";
            echo "<p><strong>Email:</strong> " . $customer["Email"] . "</p>";
            echo "<p><strong>SĐT:</strong> " . $customer["Sdt"] . "</p>";
            echo "<p><strong>Ngày Sinh:</strong> " . $customer["NgaySinh"] . "</p>";
            echo "<p><strong>Địa Chỉ:</strong> " . $customer["DiaChi"] . "</p>";
            echo "<p><strong>Gói Tập:</strong> " . $customer["TenGT"] . "</p>";
            echo "<a class='edit' href='nhanvien.php?suatv=" . $customer["MaTV"] . "'>Sửa Thông Tin</a>
                 <a class='delete' href='nhanvien.php?xoatv=" . $customer["MaTV"] . "' onclick='return confirm(\"Bạn có chắc muốn xóa thành viên này?\")'>Xóa</a>";
            echo "</div>";
            // lấy thông tin luyện tập thành viên
            echo "<br>";
            echo "<br>";
            echo " <center>
            <h2>Chi Tiết Tập Luyện</h2>
            </center> ";
            
            if (isset($ma)) {
                $con2 = $p->get_lichsu($ma);
                echo '<table class="styled-table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Mã Lịch Sử</th>';
                echo '<th>Ngày Vào</th>';
                echo '<th>Giờ Vào</th>';
                echo '<th>Giờ Ra</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                if ($con2) {
                    while ($r2 = $con2->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $r2["maLS"] . '</td>';
                        echo '<td>' . $r2["ngayVao"] . '</td>';
                        echo '<td>' . $r2["gioVao"] . '</td>';
                        echo '<td>' . $r2["gioRa"] . '</td>';
                        echo '</tr>';
                    }
                } else if ($con2 == 0) {
                    echo '<tr><td colspan="4">Chưa có dữ liệu tập luyện</td></tr>';
                } else {
                    echo '<tr><td colspan="4">Lỗi CSDL</td></tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
            
        }
         else {
            echo "Lỗi kết nối csdl";
        }
    ?>
</body>
</html>
