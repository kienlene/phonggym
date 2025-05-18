<?php
    include_once("controller/cgoitap.php");
    $p = new cgoitap();

    // Xử lý tìm kiếm
    if (isset($_REQUEST["search"])) {
        $con = $p->getgtbyname($_REQUEST["txtsearch"]);
        $t = $_REQUEST["txtsearch"];

        // Kiểm tra kết quả tìm kiếm
        if (!$con || $con->num_rows == 0) {
            echo "<script>alert('Không tìm thấy gói tập tương ứng');</script>";
            echo "<script>window.location.href = 'quanly.php?dsgt';</script>";
            exit(); // Dừng script sau khi chuyển hướng
        }
    } else {
        $con = $p->getallgoitap();
    }
?>

<!-- Form tìm kiếm và nút thêm gói tập -->
<form action="" method="post" class="search-form">
    <input type="text" name="txtsearch" placeholder="Nhập từ khóa tìm kiếm">
    <input type="submit" name="search" value="Tìm Kiếm">
    <a class='add-button' href='?themgt'>Thêm Gói Tập</a>
</form>

<?php
    // Hiển thị danh sách gói tập
    if ($con) {
        echo "<br>";
        echo "<center><h1 style='font-size: 30px;'>DANH SÁCH GÓI TẬP</h1></center>";
        echo "<div class='study-info'>";
        echo "<a class='add-button1' href='?dsxoagt'>Danh Sách Xóa Gói Tập</a>";
        echo "</div>";
        echo "<article id='a3'>";
        echo "<table id='a30'>";
        echo "<tr>";
        echo "<th style='width: 50px;'>Mã GT</th>";
        echo "<th style='width: 200px;'>TÊN GÓI TẬP</th>";
        echo "<th>SỐ TIỀN</th>";
        echo "<th>HÌNH ẢNH</th>";
        echo "<th>DỊCH VỤ</th>";
        echo "<th style='width: 200px;'>Sửa | Xóa</th>";
        echo "</tr>";

        while ($r = $con->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $r["MaGT"] . "</td>";
            echo "<td><a href='?ctgt=" . $r["MaGT"] . "'>" . $r["TenGT"] . "</a></td>";
            echo "<td>" . $r["SoTien"] . "</td>";
            echo "<td><img src='image/goitap/" . $r["HinhAnh"] . "' width='50px'></td>";
            echo "<td>" . $r["DichVu"] . "</td>";
            echo "<td>
                    <a class='edit-button' href='?sgt=" . $r["MaGT"] . "'>sửa</a> 
                    <a class='delete-button' href='?xoagt=" . $r["MaGT"] . "' onclick='return confirm(\"Bạn có muốn xóa gói tập này?\")'>xóa</a>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</article>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
        #a30{
            border: 1px solid black;
            
        }
        tr, td{
            border: 1px solid black;
        }
    </style> -->

    <style>
        /* Đặt kiểu chung cho toàn bộ trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        h1 {
            color: #333;
        }

        #a30 {
            width: 95%;
            max-width: 1500px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: auto;
            max-height: 1000px;
        }

        #a30 th, #a30 td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        #a30 th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        #a30 tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #a30 tr:hover {
            background-color: #f1f1f1;
        }

        /* Link sửa, xóa */
        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            width: 200px;
        }

        a:hover {
            color: #ff5722;
        }

       /* Nút thêm nhân viên */
    .add-button {
        padding: 8px 16px; /* Kích thước padding giống nút Tìm Kiếm */
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        /* cursor: pointer; */
        text-align: center;
        transition: background-color 0.3s;
        min-width: 200px;
        margin-left: 560px;
    }

.add-button:hover {
    background-color: #45a049;
}

        /* Định dạng chung cho cả hai nút */
    .edit-button, .delete-button {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
    }

    /* Định dạng nút "Sửa" */
    .edit-button {
        background-color: #4CAF50; /* Màu xanh lá */
    }

    .edit-button:hover {
        background-color: #45a049; /* Màu xanh đậm hơn khi hover */
        transform: scale(1.05); /* Hiệu ứng phóng to nhẹ khi hover */
    }

    /* Định dạng nút "Xóa" */
    .delete-button {
        background-color: #ff5722; /* Màu đỏ cam */
        margin-left: 5px; /* Khoảng cách giữa hai nút */
    }

    .delete-button:hover {
        background-color: #e64a19; /* Màu đỏ đậm hơn khi hover */
        transform: scale(1.05); /* Hiệu ứng phóng to nhẹ khi hover */
    }    

    /* CSS Styling */
.search-form {
    display: flex;
    align-items: center;
    gap: 10px;
    /* background-color: #f9f9f9; */
    padding: 15px;
    border-radius: 8px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    max-width: 500px;
    /* Thêm các thuộc tính để căn lên trên cùng bên trái */
    position: absolute;
    top: 120px; /* Khoảng cách từ đỉnh trang */
    left: 350px; /* Khoảng cách từ bên trái trang */
}

.search-form input[type="text"] {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    flex-grow: 1;
    font-size: 16px;
    transition: border-color 0.3s;
}

.search-form select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    font-size: 16px;
    transition: border-color 0.3s;
}

.search-form input[type="submit"] {
    padding: 8px 16px;
    border: none;
    background-color: #4CAF50;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.search-form input[type="text"]:focus,
.search-form select:focus {
    border-color: #4CAF50;
    outline: none;
}

.search-form input[type="submit"]:hover {
    background-color: #45a049;
}
.add-button1 {
        padding: 8px 16px; /* Kích thước padding giống nút Tìm Kiếm */
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        /* cursor: pointer; */
        text-align: center;
        transition: background-color 0.3s;
        min-width: 200px;
        margin-left: 460px;
    }

    </style>
</head>
<body>
<!-- <form action="" method="post" class="search-form">
    <input type="text" name="txtsearch" placeholder="Nhập từ khóa tìm kiếm">
    
    <input type="submit" name="search" value="Tìm Kiếm">

    <a class='add-button' href='?themgt'>Thêm Gói Tập</a>
</form> -->

<br>
</body>
</html>