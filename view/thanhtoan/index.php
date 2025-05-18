<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        /* Đặt giao diện trung tâm */
        .khung {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; Chiều cao toàn màn hình */
            background-color: #f8f9fa; /* Màu nền nhẹ */
        }
    
        .payment-container {
            max-width: 500px;
            width: 100%;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .payment-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        
        .payment-info p {
            font-size: 18px;
            margin: 10px 0;
            color: #555;
        }
        
        .payment-info p strong {
            color: #333;
        }
        
        .btn-confirm {
            width: 100%;
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        
        .btn-confirm:hover {
            background-color: #218838;
        }

        /* thông báo */
        /* Định dạng cho thông báo */
.notification {
    display: none;
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    transition: opacity 0.5s ease;
}

/* Hiệu ứng hiện thông báo */
.notification.show {
    display: block;
    opacity: 1;
}

.notification.hide {
    opacity: 0;
    transition: opacity 0.5s ease;
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

    </style>
</head>

<?php
    if(isset($_REQUEST["mahd"])){
        include_once("controller/c_dangnhap.php");
        $p = new GetDangNhap();
        $con = $p->get_hoadon_theoma($_REQUEST["mahd"]);
        if($con) {
            $row = $con -> fetch_assoc();
        }
    }
?>

<body>
<div class="khung">
        <div class="payment-container">
            <h2>Thông tin thanh toán</h2>
            <div class="payment-info">
                <p><strong>Số tiền:</strong>
                <?php  
                    if(isset($_REQUEST["mahd"]))
                        echo number_format($row["TongTien"], 0, ",", "."). " VND";
                    else
                        echo number_format((float)$_SESSION["tiengiahanngay"], 0, ",", ".") . " VND";
                ?>    
                </p>
                <p><strong>Ngân hàng:</strong>
                    MB Bank
                </p>
                <p><strong>Số tài khoản:</strong>
                    2403032003
                </p>
                <p><strong>Tên chủ tài khoản:</strong>
                    PHONG GYM CR7
                </p>

                <img src="../GYM/image/nganhang.jpg" alt="" width="200px">
            </div>

            <form method="post" action="">
                <input type="hidden" name="total-amount" value="">
                <button type="submit" id="btnxacnhan" name="btnxacnhan" class="btn-confirm">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
    <div id="success-message" class="notification">Thanh toán thành công!</div>

    
</body>

</html>
<?php
    if(isset($_REQUEST["btnxacnhan"])){
        if(isset($_REQUEST["mahd"])){
            $mahd = $_REQUEST["mahd"];
            $thanhtoan = $p->update_thanhtoan($mahd);
            if($thanhtoan){
                echo '<script>window.location.href="thanhvien.php"</script>';
            }
        }else{
            echo '<script>window.location.href="thanhvien.php"</script>';
        }
    }

?>
<script>

    // Hàm hiển thị thông báo
function showNotification(message) {
    const notification = document.getElementById("success-message");
    notification.textContent = message; // Đặt thông báo
    notification.classList.add("show");

    // Tự động ẩn thông báo sau 3 giây
    setTimeout(() => {
        notification.classList.add("hide");
        setTimeout(() => {
            notification.classList.remove("show", "hide");
        }, 2000); // Thời gian ẩn dần
    }, 3000);
}

// Gọi hàm này khi nhấn nút Gia hạn
document.getElementById("btnxacnhan").addEventListener("click", function (event) {
    //event.preventDefault(); // Ngăn điều hướng ngay lập tức
    showNotification("Thanh toán thành công!");
    // Chuyển hướng sau 3 giây
    
});

</script>