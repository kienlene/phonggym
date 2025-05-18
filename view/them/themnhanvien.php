
<form action="#" method="post" enctype="multipart/form-data">
    <table id="a10">
        <tr>
            <td colspan="2"><h1>FORM THÊM NHÂN VIÊN</h1></td>
        </tr>

        <tr>
        <td>Tên Nhân Viên: </td>
        <td>
            <input type="text" name="txttennv" value="<?php echo isset($_REQUEST['txttennv']) ? htmlspecialchars($_REQUEST['txttennv']) : ''; ?>" required 
                pattern="[a-zA-ZÀ-ỹ\s]+" 
                title="Tên chỉ được chứa chữ cái và khoảng trắng.">
        </td>
    </tr>


        <tr>
            <td>Email: </td>
            <td>
                <input type="email" name="txtemail" value="<?php echo isset($_REQUEST['txtemail']) ? htmlspecialchars($_REQUEST['txtemail']) : ''; ?>" required 
                    pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" 
                    title="Vui lòng nhập email có đuôi @gmail.com">
            </td>
        </tr>

        <tr>
            <td>SĐT: </td>
            <td>
                <input type="text" name="txtsdt" value="<?php echo isset($_REQUEST['txtsdt']) ? htmlspecialchars($_REQUEST['txtsdt']) : ''; ?>" required 
                    pattern="0\d{9}" 
                    title="Số điện thoại phải gồm 10 chữ số và bắt đầu bằng 0.">
            </td>
        </tr>


        <tr>
            <td>Hình Ảnh: </td>
            <td><input type="file" name="img" <?php echo isset($_REQUEST['img']) ? '' : 'required'; ?>></td>    
        </tr>

        <tr>
            <td>Ngày Vào Làm: </td>
            <td><input type="date" name="ngayvaolam" value="<?php echo isset($_REQUEST['ngayvaolam']) ? htmlspecialchars($_REQUEST['ngayvaolam']) : ''; ?>" required></td>
        </tr>

        <tr>
            <td>Chức Vụ: </td>
            <td>
                <?php
                include_once("controller/cnhanvien.php");
                $pt = new cnhanvien();
                $kq = $pt->getallcv();
                if ($kq) {
                    echo "<select name='chucvu' required>";
                    echo "<option value='' disabled selected>-- Chọn chức vụ --</option>"; // Tùy chọn mặc định trống
                    while ($r = $kq->fetch_assoc()) {
                        $selected = (isset($_REQUEST['chucvu']) && $_REQUEST['chucvu'] == $r['MaCV']) ? 'selected' : '';
                        echo "<option value='" . $r['MaCV'] . "' $selected>" . $r['TenCV'] . "</option>";
                    }
                    echo "</select>";
                }
                ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="btnthem" value="Cập Nhật">
                <!-- Nút Hủy chỉ là nút button để tránh việc gửi form -->
                <input type="button" name="btnhuy" value="Hủy" onclick="window.location.href='quanly.php?dsnv';">
            </td>
        </tr>
    </table>
</form>


<?php
    include_once("controller/cthietbi.php");
    if(isset($_REQUEST["btnthem"])){
        $p = new cnhanvien();
        $con = $p -> getthemnhanvien($_REQUEST["txttennv"], $_REQUEST["txtemail"], $_REQUEST["txtsdt"], $_FILES["img"]["name"], $_REQUEST["ngayvaolam"], $_REQUEST["chucvu"]);

        if($con){
            move_uploaded_file($_FILES['img']['tmp_name'],'image/avtnv/'.$_FILES["img"]["name"]);
            echo "<script>alert('thêm nhân viên thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsnv   ' </script> ";
        }else{
            echo "<script>alert('số điện thoại đã được sử dụng vui lòng sử dụng số điện thoại khác')</script>";
        }
    }else if (isset($_REQUEST["btnhuy"])) {
        // Chuyển hướng về trang quản lý mà không làm gì thêm
        echo "<script>window.location.href='quanly.php?dsnv';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Đặt khung viền và khoảng cách cho toàn bộ form */
        #a10 {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
        }

        /* Định dạng tiêu đề form */
        h1 {
            color: #333;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        /* Định dạng các ô trong bảng */
        #a10 tr {
            height: 50px;
        }

        #a10 td {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #555;
        }

        /* Định dạng ô nhập liệu */
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        /* Định dạng nút */
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-right: 10px;
        }

        input[type="button"], input[type="reset"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-right: 10px;
        }
        
        input[type="button"] {
            background-color: #4CAF50; /* Xanh lá cây */
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Xanh lá cây */
        }

        input[type="reset"] {
            background-color: #f44336; /* Đỏ */
        }

        /* Hiệu ứng hover cho nút */
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="reset"]:hover {
            background-color: #d32f2f;
        }

        /* Định dạng chung cho input */
    input[type="text"], input[type="date"], select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        box-sizing: border-box;
        background-color: #fff;
        color: #333;
    }

    /* Định dạng riêng cho input[type="date"] */
    input[type="date"] {
        -webkit-appearance: none;  /* Tắt giao diện mặc định trên trình duyệt Safari */
        -moz-appearance: none;     /* Tắt giao diện mặc định trên trình duyệt Firefox */
        appearance: none;          /* Tắt giao diện mặc định trên trình duyệt khác */
        background-color: #f9f9f9;
        text-align: center;
    }

    /* Thêm border và màu sắc cho input khi focus */
    input[type="text"]:focus, input[type="date"]:focus, select:focus {
        border-color: #4CAF50; /* Màu xanh khi focus */
        outline: none;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.6);
    }

    /* Tạo hiệu ứng hover cho input */
    input[type="date"]:hover {
        border-color: #45a049;
    }

    </style>
</head>
<body>
    
</body>
</html>