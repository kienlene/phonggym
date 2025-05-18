<?php
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thông Tin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .khung{
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; Chiều cao toàn màn hình */
            background-color: #f8f9fa; /* Màu nền nhẹ */
        }
.update-info-container {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.update-info-container h2 {
    margin-bottom: 20px;
    color: #333;
}

#update-info-form label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

#update-info-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

#update-info-form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

#update-info-form button:hover {
    background-color: #0056b3;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

.success-message {
    color: green;
    font-size: 14px;
    margin-top: 10px;
}
h2{
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(90deg, #007AFF, #00E0FF); /* Gradient xanh biển chuyên nghiệp */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
}
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
    display: block;
}

    </style>
</head>

<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p -> get_thanhvien($_SESSION["matk"]);
    if($con){
        $row = $con -> fetch_assoc();
    }
    
?>
<body>
    <div class="khung">
    <div class="update-info-container">
        <h2>Cập Nhật Thông Tin Cá Nhân</h2>
        <form id="update-info-form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="tentv">Họ & tên</label>
            <input type="text" id="tentv" name="tentv" value="<?php echo $row["TenTV"]; ?>">
            <span id="errHoTen" class="error-message"></span>

            <label for="eml">Email</label>
            <input type="email" id="eml" name="eml" value="<?php echo $row["Email"]?>">
            <span id="errEmail" class="error-message"></span>

            <label for="sdt">Số điện thoại</label>
            <input type="text" id="sdt" name="sdt" value="<?php echo $row["Sdt"]?>">
            <span id="errSdt" class="error-message"></span>

            <label for="date">Ngày sinh</label>
            <input type="text" id="date" name="date" value="<?php echo $row["NgaySinh"]?>">
            <span id="errNgaySinh" class="error-message"></span>

            <label for="diachi">Địa chỉ</label>
            <input type="text" id="diachi" name="diachi" value="<?php echo $row["DiaChi"]?>">
            <span id="errDiaChi" class="error-message"></span>

            <label for="avt">Ảnh đại diện</label>
            <?php echo '<img src="../GYM/image/'.$row["HinhAnh"].'" width="70px">'; ?>
            <input type="file" id="avt" name="avt">

            <button type="submit" name="btn_capnhattt">Cập nhật</button>

        </form>
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p->get_thanhvien($_SESSION["matk"]);
    if ($con) {
        $row = $con->fetch_assoc();
    }

    if (isset($_POST["btn_capnhattt"])) {
        // Lấy thông tin từ form và lọc dữ liệu
        $matk = $_SESSION["matk"];
        $ten = trim($_POST["tentv"]);
        $email = trim($_POST["eml"]);
        $sdt = trim($_POST["sdt"]);
        $ngaysinh = trim($_POST["date"]);
        $diachi = trim($_POST["diachi"]);
        $avt = $_FILES["avt"]["name"];

        // Lọc và kiểm tra dữ liệu đầu vào
        if (empty($ten) || empty($email) || empty($sdt) || empty($ngaysinh) || empty($diachi)) {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
        } else {
            // kiểm tra file upload có phải hình ảnh ko
            $loai = strtolower(pathinfo($avt, PATHINFO_EXTENSION));
            // danh sách đuôi file
            $ds = ['jpg', 'jpge', 'png', 'gif', 'webp', ''];

            // Xử lý ảnh nếu có
            if ($avt != '') {
                
                // ảnh mới là ảnh được chọn
                $anhmoi = $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], "../GYM/image/$anhmoi");
            } else {
                // Nếu không có ảnh mới, giữ nguyên ảnh cũ
                $anhmoi = $row["HinhAnh"];
            }

            // Cập nhật thông tin vào cơ sở dữ liệu
            if(!in_array($loai, $ds)){
                echo '<script>alert("Chỉ chấp nhân file hình ảnh")</script>';
            }else{
                $capnhat = $p->get_capnhattt($matk, $ten, $email, $sdt, $ngaysinh, $diachi, $anhmoi);
                // Kiểm tra kết quả cập nhật
                if ($capnhat) {
                    echo '<script>alert("Cập nhật thông tin thành công");</script>';
                    echo '<script>window.location.href="thanhvien.php";</script>';
                } else {
                    echo '<script>alert("Cập nhật thất bại");</script>';
                }
            }   
        }
    }

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    // Kiểm tra Họ tên
    function ktHoTen() {
        let hoTen = $("input[name='tentv']").val().trim();
        let btcq = /^[A-Za-zÀ-ỹà-ỹ\s]+$/; // Kiểm tra chỉ chứa chữ và khoảng trắng
        if (hoTen === "") {
            $("#errHoTen").html("Họ tên không được để trống");
            return false;
        } else if (!btcq.test(hoTen)) {
            $("#errHoTen").html("Tên không hợp lệ");
            return false;
        } else {
            $("#errHoTen").html(""); // Xóa lỗi
            return true;
        }
    }

    // Kiểm tra Email
    function ktemail() {
        let email = $("input[name='eml']").val().trim();
        let btcq = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Biểu thức chính quy email
        if (email === "") {
            $("#errEmail").html("Email không được để trống");
            return false;
        } else if (!btcq.test(email)) {
            $("#errEmail").html("Email không hợp lệ");
            return false;
        } else {
            $("#errEmail").html(""); // Xóa lỗi
            return true;
        }
    }

    // Kiểm tra Số điện thoại
    function ktSDT() {
        let sdt = $("input[name='sdt']").val().trim();
        let btcq = /^(03|09|08|07)[0-9]{8}$/; // Kiểm tra số điện thoại hợp lệ
        if (sdt === "") {
            $("#errSdt").html("Số điện thoại không được trống");
            return false;
        } else if (!btcq.test(sdt)) {
            $("#errSdt").html("Số điện thoại phải có định dạng 10 số, bắt đầu bằng 03, 09, 08, 07");
            return false;
        } else {
            $("#errSdt").html(""); // Xóa lỗi
            return true;
        }
    }

    // Kiểm tra Ngày sinh
    function ktNgaySinh() {
        let ngaySinh = $("input[name='date']").val().trim();
        if (ngaySinh === "") {
            $("#errNgaySinh").html("Ngày sinh không được để trống");
            return false;
        } else {
            $("#errNgaySinh").html(""); // Xóa lỗi
            return true;
        }
    }

    // Kiểm tra Địa chỉ
    function ktDiaChi() {
        let diaChi = $("input[name='diachi']").val().trim();
        if (diaChi === "") {
            $("#errDiaChi").html("Địa chỉ không được để trống");
            return false;
        } else {
            $("#errDiaChi").html(""); // Xóa lỗi
            return true;
        }
    }

    // Xử lý khi nhấn nút submit
    $("#update-info-form").submit(function (e) {
     e.preventDefault(); // Ngừng gửi form nếu chưa hợp lệ

     // Kiểm tra tất cả các trường
     if (ktHoTen() && ktemail() && ktSDT() && ktNgaySinh() && ktDiaChi()) {
         // Nếu tất cả các kiểm tra hợp lệ, gửi form
         $(this).unbind('submit').submit(); // Đảm bảo form được gửi
     } else {
         alert("Vui lòng kiểm tra lại thông tin nhập!");
     }
 });


    // Kiểm tra khi người dùng rời khỏi trường nhập liệu (blur)
    $("input[name='tentv']").blur(function () {
        ktHoTen();
    });

    $("input[name='eml']").blur(function () {
        ktemail();
    });

    $("input[name='sdt']").blur(function () {
        ktSDT();
    });

    $("input[name='date']").blur(function () {
        ktNgaySinh();
    });

    $("input[name='diachi']").blur(function () {
        ktDiaChi();
    });
});

function validateForm() {
    var hoTen = document.querySelector("input[name='tentv']").value.trim();
    var email = document.querySelector("input[name='eml']").value.trim();
    var soDienThoai = document.querySelector("input[name='sdt']").value.trim();
    var diaChi = document.querySelector("input[name='diachi']").value.trim();
    var pw = document.querySelector("input[name='txtMK']").value.trim(); // Bạn cần đảm bảo rằng có trường mật khẩu
    var TDN = document.querySelector("input[name='txtTND']").value.trim(); // Trường Tên Đăng Nhập nếu có

    // Kiểm tra thông tin
    if (!hoTen || !email || !soDienThoai || !diaChi || !pw || !TDN) {
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }
    return true;
}




</script>