<?php
include_once("controller/cthanhvien.php");
$p = new Cthanhvien;

if (isset($_REQUEST["btnthem"])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $anh = $_FILES['anh']['name'];
    $trangthai = $_POST['trangthai'];
    $goitap = $_POST['goitap'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $tongtien = $_POST['tongtien'];

    $result = $p->InsertTV($ten, $email, $sdt, $ngaysinh, $diachi, $anh, $trangthai, $goitap, $ngaybatdau, $ngayketthuc, $tongtien);

    if ($result) {
        if ($result == 1) {
            if ($_FILES["anh"]["name"]) {
                move_uploaded_file($_FILES["anh"]["tmp_name"], "image/avtKH/$anh");
            }
            echo "<script>alert('Thêm thông tin thành viên thành công');</script>";
            echo "<script>window.location.href='nhanvien.php?dstv';</script>";
        } else if ($result == -1) {
            echo "Thêm thất bại";
        } else {
            echo "Có lỗi xảy ra!";
        }
    } else {
        echo "Thêm thất bại";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thành Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"], button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: calc(50% - 10px);
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #218838;
        }

        button {
            background-color: red;
            margin-right: 0; /* No margin for the last button */
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="submit"], button {
                width: 100%;
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const goitapSelect = document.getElementById('goitap');
        const tongtienInput = document.getElementById('tongtien');

        goitapSelect.addEventListener('change', function() {
            const selectedOption = goitapSelect.options[goitapSelect.selectedIndex];
            const soTien = selectedOption.getAttribute('data-sotien');
            tongtienInput.value = soTien ? soTien : ''; // Hiển thị số tiền
        });
    });

    function quayVe() {
        window.location.href = 'nhanvien.php';
    }
    

    </script>
</head>
<body>
    <h2>Form Thêm Thành Viên</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="ten">Tên thành viên:</label>
        <input type="text" id="ten" name="ten" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="sdt">Số điện thoại:</label>
        <input type="text" id="sdt" name="sdt" required>

        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="ngaysinh" name="ngaysinh" required>

        <label for="diachi">Địa chỉ:</label>
        <input type="text" id="diachi" name="diachi" required>

        <label for="anh">Ảnh đại diện:</label>
        <input type="file" id="anh" name="anh" accept="image/*">

        <label for="trangthai">Trạng thái:</label>
        <select id="trangthai" name="trangthai" required>
            <option value="Nghỉ">Nghỉ</option>
            <option value="Còn tập">Còn tập</option>
        </select>

        <label for="goitap">Gói tập:</label>
        <select id="goitap" name="goitap" required onchange="updateEndDate()">
            <option value="">-- Chọn gói tập --</option>
            <?php
            $goitapList = $p->getgoitap();
            if ($goitapList && $goitapList != 0) {
                while ($row = $goitapList->fetch_assoc()) {
                    echo '<option value="' . $row['MaGT'] . '" data-sotien="' . $row['SoTien'] . '">'
                        . $row['TenGT'] . '</option>';
                }
            } else {
                echo '<option value="">Không có gói tập nào</option>';
            }
            ?>
        </select>

        <label for="tongtien">Tổng tiền:</label>
        <input type="number" id="tongtien" name="tongtien" readonly>

        <label for="ngaybatdau">Ngày bắt đầu:</label>
        <input type="date" id="ngaybatdau" name="ngaybatdau" required onchange="updateEndDate()">

        <label for="ngayketthuc">Ngày kết thúc:</label>
        <input type="date" id="ngayketthuc" name="ngayketthuc" required>

        <button type="button" onclick="quayVe()">Quay lại</button>
        <input type="submit" value="Thêm" name="btnthem">
        
    </form>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const sdtInput = document.getElementById('sdt');
    const emailInput = document.getElementById('email');
    const ngaySinhInput = document.getElementById('ngaysinh');
    const ngayBatDauInput = document.getElementById('ngaybatdau');
    const ngayKetThucInput = document.getElementById('ngayketthuc');

    form.addEventListener('submit', function (event) {
        // Kiểm tra số điện thoại
        const sdtRegex = /^0\d{9}$/;
        if (!sdtRegex.test(sdtInput.value)) {
            alert('Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng!');
            event.preventDefault();
            return;
        }

        // Kiểm tra email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            alert('Email không hợp lệ. Vui lòng nhập đúng định dạng!');
            event.preventDefault();
            return;
        }

        // Kiểm tra ngày sinh (ngày sinh phải nhỏ hơn ngày hiện tại)
        const ngaySinh = new Date(ngaySinhInput.value);
        const today = new Date();
        if (ngaySinh >= today) {
            alert('Ngày sinh phải nhỏ hơn ngày hiện tại!');
            event.preventDefault();
            return;
        }

        // Kiểm tra ngày bắt đầu (ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại)
        const ngayBatDau = new Date(ngayBatDauInput.value);
        if (ngayBatDau < today) {
            alert('Ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại!');
            event.preventDefault();
            return;
        }

        // Kiểm tra ngày kết thúc (ngày kết thúc phải lớn hơn ngày bắt đầu)
        const ngayKetThuc = new Date(ngayKetThucInput.value);
        if (ngayKetThuc <= ngayBatDau) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
            event.preventDefault();
            return;
        }
    });
});


function updateEndDate() {
    const startDateInput = document.getElementById('ngaybatdau');
    const packageSelect = document.getElementById('goitap');
    const endDateInput = document.getElementById('ngayketthuc');

    // Get selected option's data attribute
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];
    const packageName = selectedOption.text; // Tên gói tập (ví dụ: "Gói 1 Tháng")
    let monthsToAdd = 0;

    // Determine months based on package name
    if (packageName.includes('Gói 1 Tháng')) {
        monthsToAdd = 1;
    } else if (packageName.includes('Gói 3 Tháng')) {
        monthsToAdd = 3;
    } else if (packageName.includes('Gói Gia Đình 6 Tháng')) {
        monthsToAdd = 6;
    } else if (packageName.includes('Gói 1 Năm')) {
        monthsToAdd = 12;
    }

    // Check if both start date and package are selected
    if (startDateInput.value && monthsToAdd > 0) {
        const startDate = new Date(startDateInput.value);
        startDate.setMonth(startDate.getMonth() + monthsToAdd); // Add months

        // Format the date to YYYY-MM-DD
        const year = startDate.getFullYear();
        const month = String(startDate.getMonth() + 1).padStart(2, '0');
        const day = String(startDate.getDate()).padStart(2, '0');

        endDateInput.value = `${year}-${month}-${day}`;
    } else {
        endDateInput.value = ''; // Clear end date if inputs are incomplete
    }
}

</script>