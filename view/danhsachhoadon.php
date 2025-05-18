<?php
    include_once("controller/cketoan.php");

    $p = new Cketoan();
    $limit = 5; // Số lượng hóa đơn mỗi trang
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Lấy số trang hiện tại từ URL (mặc định là 1)
    $offset = ($page - 1) * $limit; // Tính toán offset

    // Lấy danh sách hóa đơn với phân trang
    $result = $p->selectdanhsachhoadon($limit, $offset);

    // Lấy tổng số hóa đơn để tính tổng số trang
    $totalHoaDon = $p->getdemSoHoaDon();
    $totalPages = ceil($totalHoaDon / $limit); // Tổng số trang
?>

<?php if ($result): ?>
    <center>
        <h2>Danh Sách Hóa Đơn</h2>
        <hr>
        <br>
        <!-- Nút In toàn bộ hóa đơn -->
        <button onclick="window.print();" class="print-btn">In toàn bộ hóa đơn</button>
    </center>
    <br>
    <table id="40" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Số thứ tự</th>
            <th>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Ngày lập</th>
            <th>Ngày bắt đầu tập</th>
            <th>Ngày kết thúc</th>
            <th>Tình trạng thanh toán</th>
            <th>Tên gói tập</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = $offset + 1; // Biến đếm số thứ tự bắt đầu từ offset + 1
        $totalAmount = 0; // Khởi tạo biến tổng tiền
        while ($row = $result->fetch_assoc()) {
            $doanhthu = $row['TotalAmount'];
            $totalAmount += $row['TongTien']; // Cộng dồn tổng tiền từ các hóa đơn theo trang
        ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td><?php echo $row['MaHD']; ?></td>
                <td><?php echo $row['TenTV']; ?></td>
                <td><?php echo $row['NgayLap']; ?></td>
                <td><?php echo $row['NgayBatDau']; ?></td>
                <td><?php echo $row['NgayKetThuc']; ?></td>
                <td><?php echo $row['TinhTrangTT']; ?></td>
                <td><?php echo $row['TenGT']; ?></td>
                <td><?php echo number_format($row['TongTien'], 0, ',', '.'); ?> VND</td>
            </tr>
        <?php
        }
        ?>
        <!-- Dòng tổng tiền -->
        <tr>
            <td colspan="8" style="text-align: right; font-weight: bold;">Tổng tiền</td>
            <td><?php echo number_format($totalAmount, 0, ',', '.'); ?> VND</td>
        </tr>
    </tbody>
</table>
<br>
<center>
    <div class="total-revenue">
        <span class="label">Tổng doanh thu: </span>
        <span class="amount"><?php echo number_format($doanhthu, 0, ',', '.'); ?> VND</span>
    </div>
</center>

<!-- Nút phân trang -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="ketoan.php?xemhoadon&page=<?php echo $page - 1; ?>">Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="ketoan.php?xemhoadon&page=<?php echo $i; ?>" <?php if ($i == $page) echo 'style="font-weight: bold;"'; ?>>
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="ketoan.php?xemhoadon&page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>
</div>

<?php else: ?>
    <p>Không có hóa đơn nào!</p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <style>
            table {
                width: 100%;
                border-collapse: collapse; /* Loại bỏ khoảng cách giữa các ô */
                margin: 20px 0;
                font-size: 16px;
                text-align: left;
            }

            table th, table td {
                border: 1px solid #ddd; /* Viền ô */
                padding: 10px; /* Khoảng cách nội dung */
            }

            table th {
                background-color: #f4f4f4; /* Màu nền cho tiêu đề */
                color: #333; /* Màu chữ tiêu đề */
                font-weight: bold; /* In đậm tiêu đề */
                text-align: center; /* Canh giữa tiêu đề */
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9; /* Màu nền xen kẽ cho các dòng chẵn */
            }

            table tr:nth-child(odd) {
                background-color: #fff; /* Màu nền cho các dòng lẻ */
            }

            table tr:hover {
                background-color: #eaeaea; /* Màu nền khi hover vào dòng */
            }

            table td {
                text-align: center; /* Canh giữa nội dung ô */
            }

            #40 {
                border: 2px solid #007BFF; /* Viền bảng chính */
                border-radius: 5px; /* Bo góc bảng */
                overflow: hidden; /* Loại bỏ phần thừa nếu có */
            }
            h2{
                color: blue;
            }
            hr{
                width: 250px;
            }
            /* Container phân trang */
            .pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }

            /* Style cho các liên kết phân trang */
            .pagination a {
                text-decoration: none;
                padding: 10px 15px;
                margin: 0 5px;
                background-color: #f1f1f1;
                color: #333;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }

            /* Hover effect khi rê chuột */
            .pagination a:hover {
                background-color: #007bff;
                color: #fff;
            }

            /* Style cho trang hiện tại */
            .pagination a.active {
                background-color: #007bff;
                color: white;
                font-weight: bold;
            }

            /* Disable liên kết nếu không có trang để đến */
            .pagination a.disabled {
                color: #ccc;
                pointer-events: none;
                cursor: not-allowed;
            }
            /* CSS cho phần hiển thị tổng doanh thu */
            .total-revenue {
                background-color: #f1f1f1;  /* Màu nền nhẹ */
                padding: 20px;               /* Khoảng cách xung quanh */
                border-radius: 8px;          /* Bo góc nhẹ */
                display: inline-block;       /* Để không chiếm toàn bộ chiều rộng */
                text-align: center;          /* Căn giữa nội dung */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Đổ bóng nhẹ cho box */
                margin-top: 20px;            /* Khoảng cách phía trên */
                font-family: 'Arial', sans-serif; /* Font chữ dễ đọc */
            }

            .total-revenue .label {
                font-size: 18px;             /* Kích thước chữ cho "Tổng doanh thu" */
                font-weight: bold;           /* Đậm chữ */
                color: #333;                 /* Màu chữ tối cho dễ đọc */
            }

            .total-revenue .amount {
                font-size: 24px;             /* Kích thước chữ lớn cho số tiền */
                font-weight: bold;           /* Đậm chữ */
                color: #007bff;              /* Màu xanh nổi bật cho số tiền */
                margin-left: 10px;           /* Khoảng cách giữa chữ và số tiền */
                display: inline-block;       /* Đảm bảo số tiền không bị xuống dòng */
            }
            /* CSS cho nút In */
            .print-btn {
                background-color: #007bff; /* Màu nền xanh */
                color: white; /* Màu chữ trắng */
                border: none; /* Bỏ border */
                padding: 10px 20px; /* Khoảng cách bên trong nút */
                font-size: 16px; /* Kích thước chữ */
                cursor: pointer; /* Con trỏ chuột khi hover */
                border-radius: 5px; /* Bo góc */
                margin-bottom: 20px; /* Khoảng cách dưới nút */
            }

            .print-btn:hover {
                background-color: #0056b3; /* Màu nền khi hover */
            }

</style>

    </style>
</head>
<body>
    
</body>
</html>