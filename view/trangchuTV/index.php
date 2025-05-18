<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* Toàn bộ container của các card */
.card-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin: 20px 0;
    gap: 20px;
}

/* Card chung */
.card {
    background-color: #e8f6ff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
    width: 30%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: #333;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}

.card h3 {
    margin-top: 10px;
    font-size: 18px;
    color: #343a40;
    font-weight: bold;
}

.card p {
    font-size: 16px;
    color: #6c757d;
}

.card img {
    margin-bottom: 10px;
}

/* Nút trong card */
.card button {
    background-color: #10DE83;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.card button:hover {
    background-color: #218838;
}

.status-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.status-card {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.status-card:hover {
    transform: translateY(10px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #dc3545;
    color: white;
}

    </style>
</head>

<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p->set_tinhngayhethan($_SESSION["matv"]);
    // $row = $con->fetch_assoc();    
    // $ngaybatdau = $row["NgayBatDau"];
    // $ngayketthuc = $row["NgayKetThuc"];
    // $ngay = date_diff(date_create($ngaybatdau), date_create($ngayketthuc));
    // $thoihan = $ngay->days;

    $layngay = $p->set_tinhngayhethan($_SESSION["matv"]);
    if($layngay) {
        $row = $layngay -> fetch_assoc();
    }
    $ngayhientai = new DateTime();
    $ngayhientai = $ngayhientai->format("Y-m-d");
    $ngayhethan = (new DateTime($row["NgayKetThuc"]))->format("Y-m-d");
    $ngay = date_diff(date_create($ngayhethan), date_create($ngayhientai));
    $ngayconlai = $ngay->days;
?>


<body>
<div class="card-container">
            
    <a href="thanhvien.php?lichsu" class="card" >
        <img src="../GYM/image/lich.png" alt="Lịch sử" class="icon" width="100px">
        <h3>Lịch sử</h3>
    </a>
    
    <a href="thanhvien.php?thoihan" class="card" >
        <img src="../GYM/image/thoihan.png" alt="Thời hạn gói tập" class="icon" width="50px">
        <h3>Thời hạn gói tập</h3>
        <p>
        <?php
                    if($ngayhientai >= $ngayhethan){
                        echo "Cần gia hạn";
                    }else{
                        echo $ngayconlai." ngày";
                    }
                ?>
        </p>

        <button class="btn success">Gia hạn</button>
    </a>

    <a href="thanhvien.php?chuathanhtoan" class="card">
        <img src="../GYM/image/thanhtoan.png" alt="thanhtoan" class="icon" width="60px">
        <h3>Chưa thanh toán</h3>
        <!-- Biểu đồ -->
    </a>
</div>

<div class="status-container">
    <div class="status-card">
        <img src="../GYM/image/traitim.jpg" alt="Tim mạch" class="status-icon" width="50px">
        <p></p>
    </div>
    <div class="status-card">
        <img src="../GYM/image/cobap.jpg" alt="Cơ bắp" class="status-icon" width="50px">
        <p></p>
    </div>
    <div class="status-card">
        <img src="../GYM/image/ta.jpg" alt="Khác" class="status-icon" width="50px">
        <p></p>
    </div>
</div>

<div class="details-card">
    <h3>Chi tiết gói tập</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Gói tập</th>
                <th>Thời hạn</th>
                <th>Giá</th>
                <th>Dịch vụ/tiện ích</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
               
                while($r = $con->fetch_assoc()){
                    $ngaybatdau = $r["NgayBatDau"];
                    $ngayketthuc = $r["NgayKetThuc"];
                    $ngay = date_diff(date_create($ngaybatdau), date_create($ngayketthuc));
                    $thoihan = $ngay->days;
                    echo'<tr>';
                    echo'<td>'.$r["TenGT"].'</td>';
                    echo'<td>'.$thoihan.' ngày'.'</td>';
                    echo'<td>'.number_format($r["SoTien"], 0, ",", ".").' VND'.'</td>';
                    echo'<td>'.$r["DichVu"].'</td>';
                    echo'</tr>';
                }
            ?>
            
        </tbody>
    </table>
    <!-- <a href="#" class="more-link">Xem thêm các gói ưu đãi</a> -->
</div>
</body>
</html>