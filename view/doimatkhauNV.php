<?php
    include_once("controller/getdangnhap.php");
    $p= new GetDangNhap();
    // lay ma tai khoan dang dang nhap 
    if(isset($_SESSION["dn"])){
        $ma = $_SESSION["manv"];
        $con = $p ->LayTaiKhoan1NV($ma);
        if($con){
            $r = $con->fetch_assoc();
            $matkhaucu = $r["MatKhau"];
        }
        if(isset($_REQUEST["btndmk"])){
            $mkcu = $_REQUEST["mkcu"];
            $mahoamatkhaucu = md5($mkcu);
            $matkhaumoi = $_REQUEST["mkmoi"];
            $nhaplaimatkhaumoi =$_REQUEST["nlmkmoi"];
            $mahoamatkhaumoi = md5($matkhaumoi);
            if($matkhaucu == $mahoamatkhaucu){
                if($matkhaumoi == $nhaplaimatkhaumoi){
                    if($mahoamatkhaumoi != $matkhaucu){
                        $con1 = $p ->updateMK($ma,$mahoamatkhaumoi);
                        if($con1){
                            echo "<script>alert('Đổi mật khẩu thành công');</script>";
                            echo " <script> window.location.href='nhanvien.php' </script> ";
                            session_destroy();
                        }else{
                            echo "<script>alert('Đổi mật khẩu thất bại');</script>";
                        }
                    }else{
                        echo "<script>alert('Mật khẩu mới trùng với mật khẩu cũ');</script>";
                    }
                }else{
                    echo "<script>alert('Mật khẩu nhập không khớp');</script>";
                }
            }else{
                echo "<script>alert('Mật khẩu cũ không đúng');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            width: 100%;
            
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 420px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #343a40;
            font-size: 24px;
        }
        table {
            width: 100%;
            margin: 0 auto;
        }
        td {
            padding: 10px 0;
        }
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 5px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="password"]:focus {
            border-color: #80bdff;
            outline: none;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        input[type="reset"], input[type="submit"] {
            width: 48%; /* Adjusted width for two buttons */
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        input[type="reset"] {
            background-color: #dc3545;
            color: white;
        }
        input[type="reset"]:hover {
            background-color: #c82333;
        }
        @media (max-width: 400px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <center>
    <form action="" method="post">
        <h1>ĐỔI MẬT KHẨU</h1>
        <table>
            <tr>
                <td>Nhập Mật Khẩu Cũ:</td>
            </tr>
            <tr>
                <td><input type="password" name="mkcu" required></td>
            </tr>
            <tr>
                <td>Nhập Mật Khẩu Mới:</td>
            </tr>
            <tr>
                <td><input type="password" name="mkmoi" required></td>
            </tr>
            <tr>
                <td>Nhập Lại Mật Khẩu Mới:</td>
            </tr>
            <tr>
                <td><input type="password" name="nlmkmoi" required></td>
            </tr>
            <tr>
                <td>
                    <div class="button-container">
                        <input type="reset" value="Nhập lại">
                        <input type="submit" value="Đổi Mật Khẩu" name="btndmk">
                    </div>
                </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>