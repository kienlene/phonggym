<?php
    include_once("controller/cthanhvien.php");

    // Khởi tạo đối tượng Cthanhvien
    $cthanhvien = new Cthanhvien();

    // Lấy mã thành viên từ URL
    $maTV = $_REQUEST["suatv"];

    // Lấy thông tin hiện tại của thành viên
    $con = $cthanhvien->getdanhsachthanvienbyma($maTV);
    if ($con) {
        $thanhvien = $con->fetch_assoc();
        $tencu = $thanhvien["TenTV"];
        $emailcu = $thanhvien["Email"];
        $sdtcu = $thanhvien["Sdt"];
        $ngaysinhcu = $thanhvien["NgaySinh"];
        $diachicu = $thanhvien["DiaChi"];
        $goitapcu = $thanhvien['MaGT'];
        $trangthaicu = $thanhvien['TrangThai'];
        $tongtiencu = $thanhvien['TongTien'];
        $avtcu = $thanhvien["HinhAnh"];
    }

    // Xử lý khi form được gửi
    if (isset($_REQUEST["btnsua"])) {
        // Lấy thông tin từ form
        $ten = $_REQUEST['ten'];
        $email = $_REQUEST['email'];
        $sdt = $_REQUEST['sdt'];
        $ngaysinh = $_REQUEST['ngaysinh'];
        $diachi = $_REQUEST['diachi'];
        $goitap = $_REQUEST['goitap'];
        $trangthai = $_REQUEST["trangthai"];
        $tongtien = $_REQUEST["tongtien"];
        $avt = $_FILES["avt"]["name"] ?: $avtcu;  // Giữ ảnh cũ nếu không upload ảnh mới

        // Gọi hàm cập nhật thông tin thành viên
        $result = $cthanhvien->getSuaThanhVien($maTV,$ten, $email, $sdt, $ngaysinh, $diachi, $avt,$trangthai, $goitap,$tongtien);
        
        if ($result) {
            // Nếu có upload ảnh mới, di chuyển ảnh vào thư mục
            if ($_FILES["avt"]["name"]) {
                move_uploaded_file($_FILES["avt"]["tmp_name"], "image/avtKH/$avt");
            }
            echo "<script>alert('Cập nhật thông tin thành viên thành công');</script>";
            echo " <script> window.location.href='nhanvien.php?dstv' </script> ";
        } else {
            echo "<script>alert('Cập nhật thông tin thành viên thất bại');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Thông Tin Khách Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4A90E2; /* Màu xanh dương */
            font-size: 2.5em; /* Kích thước lớn cho tiêu đề */
            margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng đổ */
            font-weight: 700; /* Đậm */
            letter-spacing: 1px; /* Khoảng cách giữa các ký tự */
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px; /* Kích thước chữ cho dễ đọc */
        }
        textarea {
            height: 100px; /* Chiều cao cho textarea */
            resize: vertical; /* Cho phép thay đổi kích thước theo chiều dọc */
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        .submit-button, .reset-button {
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 48%; /* Đặt chiều rộng của nút */
            border: none;
        }
        .submit-button {
            background-color: #5cb85c;
            color: white;
        }
        .submit-button:hover {
            background-color: #4cae4c;
        }
        .reset-button {
            background-color: #d9534f;
            color: white;
        }
        .reset-button:hover {
            background-color: #c9302c;
        }
        img {
            max-width: 100px;
            border-radius: 5px;
            margin-top: 10px;
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
    <h1>Sửa Thông Tin Khách Hàng</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="ten">Họ Tên:</label>
        <input type="text" name="ten" value="<?php echo $tencu; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $emailcu; ?>" required><br>
        
        <label for="sdt">Số Điện Thoại:</label>
        <input type="text" name="sdt" value="<?php echo $sdtcu; ?>" required><br>
        
        <label for="ngaysinh">Ngày Sinh:</label>
        <input type="date" name="ngaysinh" value="<?php echo $ngaysinhcu; ?>" required><br>
        
        <label for="diachi">Địa Chỉ:</label>
        <input type="text" name="diachi" value="<?php echo $diachicu; ?>" required><br>
        
        <label for="avt">Ảnh Đại Diện:</label>
        <input type="file" name="avt"><br>
        <?php
            echo "<img src='image/avtKH/".$avtcu."' alt='Ảnh đại diện'>";
        ?>
        
        <label for="goitap">Gói Tập:</label>
        <select id="goitap" name="goitap" required>
            <?php
                // Lấy danh sách các gói tập từ cơ sở dữ liệu
                $goitapList = $cthanhvien->getgoitap();

                // Kiểm tra nếu danh sách gói tập tồn tại và không rỗng
                if ($goitapList && $goitapList->num_rows > 0) {
                    while ($row = $goitapList->fetch_assoc()) {
                        // Kiểm tra nếu gói tập hiện tại (của khách hàng) trùng với gói trong danh sách
                        $selected = ($row['MaGT'] == $goitapcu) ? "selected" : ""; // Đánh dấu gói tập cũ
                        echo '<option value="' . $row['MaGT'] . '" data-sotien="' . $row['SoTien'] . '" ' . $selected . '>'
                            . $row['TenGT'] . '</option>';
                    }
                }
            ?>
        </select>
<br>
        <label for="tongtien">Tổng Tiền:</label>
        <input type="text" name="tongtien" id="tongtien" readonly value="<?php echo $tongtiencu ; ?>">
        <br>

        <label for="tinhtrang">Tình Trạng:</label>
        <select name="trangthai" required>
            <option value="Còn Tập" <?php echo ($trangthaicu == "Còn Tập") ? "selected" : ""; ?>>Còn Tập</option>
            <option value="Nghỉ" <?php echo ($trangthaicu == "Nghỉ") ? "selected" : ""; ?>>Nghỉ</option>
        </select><br>


        <label for="ghichu">Ghi Chú:</label>
        <textarea name="ghichu" placeholder="Nhập ghi chú tại đây..."></textarea><br>

        <div class="button-group">
            <input type="reset" value="Nhập lại" class="reset-button">
            <input type="submit" value="Cập Nhật Thông Tin" name="btnsua" class="submit-button">
        </div>
        
    </form>
</body>
</html>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const tenInput = form.querySelector('[name="ten"]');
    const sdtInput = form.querySelector('[name="sdt"]');
    const emailInput = form.querySelector('[name="email"]');

    form.addEventListener('submit', function (event) {
        // Kiểm tra tên
        const tenRegex = /^[A-Za-zÀ-ỹ\s]+$/;
        if (!tenRegex.test(tenInput.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Tên không hợp lệ. Vui lòng chỉ nhập chữ cái và khoảng trắng!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
            event.preventDefault();
            return;
        }

        // Kiểm tra số điện thoại
        const sdtRegex = /^0\d{9}$/;
        if (!sdtRegex.test(sdtInput.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
            event.preventDefault();
            return;
        }

        // Kiểm tra email
        // Kiểm tra email
        const emailRegex = /^[^\s@]+@gmail\.com$/;
        if (!emailRegex.test(emailInput.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Email không hợp lệ. Vui lòng nhập email với đuôi @gmail.com!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
            event.preventDefault();
            return;
        }


    });
});

</script>