<?php
    include_once("controller/cphanhoi.php");
    $p = new cphanhoi();

    // Xử lý tìm kiếm
    if (isset($_REQUEST["search"])) {
        // Gọi phương thức tìm kiếm
        $con = $p->getsearchph($_REQUEST["txtsearch"], $_REQUEST["txtdanhmuc"]);
        $t = $_REQUEST["txtsearch"];
        $dm = $_REQUEST["txtdanhmuc"];

        // Kiểm tra kết quả trả về từ getsearchnv
        if (!$con || $con->num_rows == 0) {
            echo "<script>alert('Không tìm thấy phản hồi tương ứng');</script>";
            echo "<script>window.location.href = 'quanly.php?dsph';</script>";
            exit(); // Dừng script sau khi chuyển hướng
        }
    } else {
        $con = $p->getallphanhoi();
    }
?>

<!-- Form tìm kiếm phản hồi -->
<form action="" method="post" class="search-form">
    <input type="text" name="txtsearch" placeholder="Tìm Kiếm Theo Tên KH">
    <select name="txtdanhmuc">
        <option value="">Theo Đánh Giá</option>
        <option value="1">1 Sao</option>
        <option value="2">2 Sao</option>
        <option value="3">3 Sao</option>
        <option value="4">4 Sao</option>
        <option value="5">5 Sao</option>
    </select>
    <input type="submit" name="search" value="Tìm Kiếm">
</form>

<?php
    // Hiển thị danh sách phản hồi
    if ($con) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 style='font-size: 30px;'>DANH SÁCH PHẢN HỒI</h1></center>";
        echo "<div class='study-info'>";
        echo "<a class='add-button1' href='?dsxoaph'>Danh Sách Xóa Phản Hồi</a>";
        echo "</div>";
        echo "<article id='a3'>";
        echo "<table id='a30'>";
        echo "<tr>";
        echo "<th style='width: 50px;'>Mã PH</th>";
        echo "<th style='width: 200px;'>TIÊU ĐỀ</th>";
        echo "<th>NỘI DUNG</th>";
        echo "<th>ĐÁNH GIÁ</th>";
        echo "<th>HÌNH ẢNH</th>";
        echo "<th>TÊN KH</th>";
        echo "<th style='width: 200px;'>Sửa | Xóa</th>";
        echo "</tr>";

        while ($r = $con->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $r["maPH"] . "</td>";
            echo "<td><a href='?ctgt=" . $r["maPH"] . "'>" . $r["TieuDe"] . "</a></td>";
            echo "<td>" . $r["noiDung"] . "</td>";
            echo "<td>" . $r["DanhGia"] . "</td>";
            echo "<td><img src='image/phanhoi/" . $r["HinhAnhDanhGia"] . "' width='50px'></td>";
            echo "<td>" . $r["TenTV"] . "</td>";
            echo "<td>
                    <a class='delete-button' href='?xoaph=" . $r["maPH"] . "' onclick='return confirm(\"Bạn có muốn ẩn phản hồi này?\")'>Ẩn Phản Hồi</a>
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
        margin-left: 400px;
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
        margin-left: 450px;
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


    </style>
</head>
<body>
<!-- <form action="" method="post" class="search-form">
    <input type="text" name="txtsearch" placeholder="Tìm Kiếm Theo Tên KH">
    <select name="txtdanhmuc">
        <option value="">Theo Đánh Giá</option>
        <option value="1">1 Sao</option>
        <option value="2">2 Sao</option>
        <option value="3">3 Sao</option>
        <option value="4">4 Sao</option>
        <option value="5">5 Sao</option>
    </select>

    <input type="submit" name="search" value="Tìm Kiếm">

    

    <!-- <a class='add-button' href='?themgt'>Thêm Gói Tập</a> -->
<!-- </form> --> 
<br>

</body>
</html>