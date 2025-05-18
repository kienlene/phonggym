<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Nút thanh toán */
.btn-thanh-toan {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff; /* Màu xanh nhạt */
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

/* Hiệu ứng hover */
.btn-thanh-toan:hover {
    background-color: #0056b3; /* Màu xanh đậm */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Khi bấm vào */
.btn-thanh-toan:active {
    background-color: #003f7f;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
}
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #28a745;
    color: white;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
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
   include_once("controller/c_dangnhap.php");
   $p = new GetDangNhap();
   $con = $p->get_hoadon_ctt($_SESSION["matv"]);
    
?>
<body>
    <div id="lichsu">
    <h2>Chưa thanh toán gia hạn</h2>
    <br>
    <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã hóa đơn</th>
                        <th>Mã gói tập</th>
                        <th>Tên gói tập</th>
                        <th>Số tiền</th>
                        <th>Ngày gia hạn</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        if($con){
                        while($r = $con -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$r["MaHD"].'</td>';
                            echo '<td>'.$r["MaGT"].'</td>';
                            echo '<td>'.$r["TenGT"].'</td>';
                            echo '<td>'.number_format($r["SoTien"], 0, ",", "."). " VND".'</td>';
                            echo '<td>'.$r["NgayLap"].'</td>';
                            echo '<td>'. number_format($r["TongTien"], 0, ",", "."). " VND".'</td>';
                            echo '<td><a href="thanhvien.php?thanhtoan&mahd='.$r["MaHD"].'" class="btn-thanh-toan">Thanh toán</a></td>';
                            echo '</tr>';
                            $i++;
                        }  
                        }else{
                        echo '<script>alert("Không có hóa đơn")</script>';
                        echo '<script>window.location.href="thanhvien.php"</script>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
</body>
</html>