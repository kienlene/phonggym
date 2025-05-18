<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        
        /* CSS cho nút thanh toán */
        /* Khung chính */
/* Khung chính */
#giahan {
    width: 100%;
    max-width: 600px;
    background-color: #ffffff;
    border-radius: 12px;
    padding: 20px 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Đổ bóng nổi bật */
    box-sizing: border-box;
    text-align: center; /* Căn giữa nội dung text */
    margin: 0 auto; /* Căn giữa khung theo chiều ngang */
}

/* Tiêu đề */
#ttgiahan {
    margin-bottom: 20px;
    font-size: 26px;
    font-weight: bold;
    color: #343a40;
    text-align: center;
    text-transform: uppercase;
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(90deg, #007AFF, #00E0FF); /* Gradient xanh biển chuyên nghiệp */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
}

/* Thông tin gói tập */
.package-info h3 {
    font-size: 18px;
    color: #495057;
    margin-bottom: 10px;
    text-align: left;
    font-weight: bold;
}

.package-info p {
    font-size: 16px;
    color: #6c757d;
    margin: 5px 0;
    text-align: left;
}

/* Dropdown và form */
select {
    width: 100%;
    padding: 10px;
    margin: 10px 0 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 14px;
    background-color: #f8f9fa;
    box-sizing: border-box;
}

/* Phần giảm giá và tổng tiền */
#discount-value,
#total-amount-display {
    font-weight: bold;
    color: #343a40;
    font-size: 16px;
    display: inline-block;
    margin: 5px 0;
}

/* Lựa chọn phương thức thanh toán */
.payment-option {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
}

.payment-option label {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.payment-option input[type="radio"] {
    display: none;
}

.payment-option input[type="radio"]:checked + label {
    background-color: #28a745;
}

.payment-option label:hover {
    background-color: #0056b3;
}

/* Nút gia hạn */
#renew-button {
    display: inline-block;
    margin-top: 20px;
    padding: 15px 30px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

#renew-button:hover {
    background-color: #0056b3;
    transform: translateY(-3px); /* Hiệu ứng hover */
}

    </style>
</head>
<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p->set_tinhngayhethan($_SESSION["matv"]);
    if($con) {
        $row = $con -> fetch_assoc();
    }
    $ngayhientai = new DateTime();
    $ngayhientai = $ngayhientai->format("Y-m-d");
    $ngayhethan = (new DateTime($row["NgayKetThuc"]))->format("Y-m-d");
    $ngay = date_diff(date_create($ngayhethan), date_create($ngayhientai));
    $ngayconlai = $ngay->days;
    // Lấy giá trị từ POST nếu form đã gửi
    $selectedDuration = isset($_POST["tggiahan"]) ? (int)$_POST["tggiahan"] : 0; // Lấy số tháng từ POST
$totalAmount = isset($_POST["total-amount"]) ? (float)$_POST["total-amount"] : 0; // Lấy tổng tiền từ POST

// Bảng tỷ lệ ưu đãi (phần trăm) tương ứng với số tháng
$discountRates = [
    1 => 0,    // 0% cho 1 tháng
    2 => 0.03, // 3% cho 2 tháng
    3 => 0.05, // 5% cho 3 tháng
    4 => 0.08, // 8% cho 4 tháng
    5 => 0.10, // 10% cho 5 tháng
    6 => 0.15, // 15% cho 6 tháng
    7 => 0.18, // 18% cho 7 tháng
    8 => 0.20, // 20% cho 8 tháng
    9 => 0.25, // 25% cho 9 tháng
    10 => 0.27, // 28% cho 10 tháng
    11 => 0.30, // 30% cho 11 tháng
    12 => 0.35  // 35% cho 12 tháng
];

// Lấy tỷ lệ ưu đãi dựa trên số tháng, mặc định là 0 nếu không hợp lệ
$discount = isset($discountRates[$selectedDuration]) ? $discountRates[$selectedDuration] : 0;

// Chuyển tỷ lệ ưu đãi sang chuỗi phần trăm
$discountText = ($discount * 100) . "%";

// Tính lại tổng tiền sau khi áp dụng ưu đãi (nếu cần)
if ($totalAmount > 0 && $selectedDuration > 0) {
    $monthlyPrice = $totalAmount / $selectedDuration; // Lấy giá gốc 1 tháng
    $finalAmount = $monthlyPrice * $selectedDuration * (1 - $discount); // Tổng tiền sau ưu đãi
} else {
    $finalAmount = 0; // Tổng tiền là 0 nếu không hợp lệ
}

?>

<body>
    <div id="giahan">
        <h2 id="ttgiahan">Gia hạn gói tập</h2>

        <!-- Thông tin gói tập -->
        <div class="package-info">
            <h3>Thông tin gói tập</h3>
            <p><strong>Mã gói tập:</strong> <?php echo $row["MaGT"]?></p>
            <p><strong>Tên gói tập:</strong> <?php echo $row["TenGT"]?></p>
            <p><strong>Thời hạn còn lại:</strong> <span id="remaining-days">
                <?php
                    if($ngayhientai >= $ngayhethan){
                        echo "Cần gia hạn";
                    }else{
                        echo $ngayconlai." ngày";
                    }
                ?>
            </span></p>
            <p>
                <strong>Giá tiền gói tập:</strong>
                <span id="monthly-price" data-price="<?php echo $row['SoTien']; ?>">
                <?php echo number_format($row["SoTien"], 0, ",", ".")." VND"; ?>
                </span>
            </p>
        </div>

        <!-- Lựa chọn thời gian gia hạn và mã giảm giá -->
        <div class="renew-options">
            <form action="" method="post">
            
            <label for="renew-duration"><strong>Chọn thời gian gia hạn:</strong></label>
            <select id="renew-duration" name="tggiahan">
                <option value="0"></option>
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo '<option value="' . $i . '" ' . ($selectedDuration == $i ? 'selected' : '') . '>' . $i . ' tháng</option>';
                    }
                ?>
            </select>
            <br>
            <label for="discount-code">Giảm giá:</label>
            <span id="discount-value"><?php echo $discountText; ?></span>

            <p><strong>Tổng tiền:</strong> 
            <span id="total-amount-display">
                <?php
                    if($totalAmount != 0){
                        echo number_format((float)$totalAmount, 0, ",", ".") . " VND"; 
                        $_SESSION["tiengiahanngay"] = $totalAmount;
                    }
                ?>
            </span>
            </p>
            <input type="hidden" name="total-amount" id="total-amount">
            
            <div class="payment-option">
                <input type="radio" id="pay-now" name="ptthanhtoan" value="ngay">
                <label for="pay-now">Thanh toán ngay</label>
                <br>

                <input type="radio" id="pay-later" name="ptthanhtoan" value="sau">
                <label for="pay-later">Thanh toán sau </label>
            </div>
            <!-- <a href="thanhvien.php?thanhtoan" id="renew-buttonnn">gia hạn</a> -->
            <button id="renew-button" name="btngiahan">Gia hạn</button>

            <!-- Lựa chọn phương thức thanh toán -->
            </form>
        </div>
            
    </div>

</body>
</html>
<!-- Hàm insert hóa đơn -->
<?php 
    $tongtien = isset($_POST["total-amount"]) ? (float)$_POST["total-amount"] : 0;
    
    $layngay = new DateTime();
    $ngaylap = $ngayhientai;
    $ngaybt = $ngaylap;
    $thoigian = 0; // Giá trị mặc định

    if (isset($_POST["tggiahan"])) {
        $selectedDuration = (int)$_POST["tggiahan"]; // Lấy số tháng từ form
        $thoigian = $selectedDuration * 30; // Mỗi tháng có 30 ngày
    }

    $layngay->modify("+{$thoigian} days");
    $ngaykt = $layngay->format("Y-m-d");
    

    if(isset($_POST["btngiahan"])){
        if($_POST["tggiahan"] != 0){
            if(isset($_POST["ptthanhtoan"]) && $_POST["ptthanhtoan"]== "ngay"){
                $tinhtrang = "Đã thanh toán";
                $themhoadon = $p->insert_hoadon($ngaylap, $ngaybt, $ngaykt, $tongtien, $tinhtrang, $row["MaGT"], $row["MaTV"]);
                echo '<script>window.location.href="thanhvien.php?thanhtoan"</script>';
            }elseif(isset($_POST["ptthanhtoan"]) && $_POST["ptthanhtoan"] == "sau"){
                $tinhtrang = "Chưa thanh toán";
                $themhoadon = $p->insert_hoadon($ngaylap, $ngaybt, $ngaykt, $tongtien, $tinhtrang, $row["MaGT"], $row["MaTV"]);
                echo '<script>window.location.href="thanhvien.php?trangchuTV"</script>';
            }
            else{
                echo "<script>alert('Vui lòng chọn phương thức thanh toán');</script>";
            }
        }else{
            echo "<script>alert('Vui lòng chọn thời gian gia hạn');</script>";
        }
    }
        
?>


<!-- hàm tính toán tổng tiền và lưu vào biến -->
<script>
    document.getElementById("renew-duration").addEventListener("change", function() {
    const discountValue = document.getElementById("discount-value");
    const totalAmountDisplay = document.getElementById("total-amount-display");
    const totalAmountInput = document.getElementById("total-amount");
    const monthlyPrice = parseFloat(document.getElementById("monthly-price").getAttribute("data-price"));
    const selectedDuration = parseInt(this.value);

    // Bảng ánh xạ thời gian -> phần trăm ưu đãi
    const discountRates = {
        0: 0,
        1: 0,    // 0% giảm giá
        2: 0.03, // 3% giảm giá
        3: 0.05, // 5% giảm giá
        4: 0.08, // 8% giảm giá
        5: 0.1,  // 10% giảm giá
        6: 0.15, // 15% giảm giá
        7: 0.18, // 18% giảm giá
        8: 0.2,  // 20% giảm giá
        9: 0.25, // 25% giảm giá
        10: 0.27, // 28% giảm giá
        11: 0.3,  // 30% giảm giá
        12: 0.35  // 35% giảm giá
    };

    // Lấy tỷ lệ ưu đãi
    const discount = discountRates[selectedDuration] || 0; // Mặc định là 0 nếu không chọn gì
    discountValue.textContent = (discount * 100) + "%"; // Hiển thị ưu đãi (%)

    // Tính tổng số tiền sau khi áp dụng ưu đãi
    const total = (monthlyPrice * selectedDuration) * (1 - discount);
    totalAmountDisplay.textContent = total.toLocaleString("vi-VN") + " VND"; // Định dạng tiền tệ
    totalAmountInput.value = total; // Lưu vào input ẩn để sử dụng sau
});

</script>
