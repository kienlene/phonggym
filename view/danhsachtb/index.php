<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thiết bị</title>
    <style>
        /* CSS cho bảng */
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th,
        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }
        
        th {
            background-color: #007bff;
            color: white;
        }
        /* CSS cho modal */
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        
        .modal-footer {
            margin-top: 20px;
            text-align: right;
        }
        
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-blue {
            background-color: #007bff;
            color: white;
        }
        
        .btn-green {
            background-color: #28a745;
            color: white;
        }
        
        .btn-red {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-grey {
            background-color: #6c757d;
            color: white;
        }

        /* Căn chỉnh modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6); /* Nền mờ */
    backdrop-filter: blur(5px); /* Hiệu ứng mờ nền */
}

/* Khung modal */
.modal-content {
    background-color: #ffffff;
    margin: 10% auto; /* Căn giữa */
    padding: 20px;
    border-radius: 15px; /* Góc bo tròn */
    width: 40%; /* Độ rộng modal */
    max-width: 600px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
    animation: fadeIn 0.3s ease-out; /* Hiệu ứng xuất hiện */
}

/* Header của modal */
.modal-header {
    background-color: #007bff; /* Màu header */
    color: white;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
    border-radius: 15px 15px 0 0;
    text-align: center;
    position: relative;
}

/* Nút đóng */
.modal-header button {
    position: absolute;
    right: 15px;
    top: 10px;
    background: none;
    border: none;
    font-size: 20px;
    color: white;
    cursor: pointer;
}

.modal-header button:hover {
    color: #ccc; /* Hiệu ứng hover */
}

/* Nội dung modal */
.modal-body {
    padding: 20px;
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

/* Footer của modal */
.modal-footer {
    margin-top: 20px;
    text-align: right;
}

/* Nút trong modal */
.modal-footer .btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Nút lưu */
.modal-footer .btn-green {
    background-color: #28a745;
    color: white;
}

.modal-footer .btn-green:hover {
    background-color: #218838;
}

/* Nút hủy */
.modal-footer .btn-grey {
    background-color: #6c757d;
    color: white;
}

.modal-footer .btn-grey:hover {
    background-color: #5a6268;
}

/* Hiệu ứng xuất hiện của modal */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Input và textarea */
.modal-body input,
.modal-body select,
.modal-body textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.modal-body input:focus,
.modal-body select:focus,
.modal-body textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}


    </style>
</head>
<?php
    include_once("controller/c_kythuatvien.php");
    $p = new c_kythuatvien();
    $con = $p->get_danhsachtb();
    
?>
<body>

    <h2>Danh sách thiết bị</h2>

    <input type="text" id="search" placeholder="Tìm thiết bị theo mã..." onkeyup="searchDevice()" />

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Thiết Bị</th>
                <th>Tên Thiết Bị</th>
                <th>Nơi sản xuất</th>
                <th>Tình Trạng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody id="deviceTable">


            <?php
            $i = 1;
            if($con){
                while($r = $con->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$r["MaTB"].'</td>';
                        echo '<td>'.$r["TenTB"].'</td>';
                        echo '<td>'.$r["NoiSanXuat"].'</td>';
                        echo '<td>'.$r["TinhTrang"].'</td>';
                        echo '<td>
                        <form method="post">
                            <button 
                                class="btn btn-blue" 
                                type="button" 
                                onclick="openModal(this)" 
                                data-tinhtrang="'.$r["TinhTrang"].'"
                                name="btnghinhan"
                                value="'.$r["MaTB"].'">
                                Ghi nhận
                            </button>

                            <button 
                                class="btn btn-red" 
                                type="button" 
                                onclick="openMaintenanceModal(this)" 
                                data-matb="'.$r["MaTB"].'"
                                data-tentb="'.$r["TenTB"].'">
                                Yêu cầu bảo trì
                            </button>
                        </form>
                      </td>';
                    $i++;
                }
            }else{
                echo "<script>alert('Không có thiết bị!');</script>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal -->
    <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Ghi nhận thiết bị</span>
                    <button onclick="closeModal()" style="float: right; background: none; border: none; font-size: 16px;">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Đặt toàn bộ modal trong một form -->
                    <form action="" method="post">
                        <!-- Trường ẩn để lưu Mã Thiết Bị -->
                        <input type="hidden" id="hiddenMaTB" name="matb">

                        <label for="status">Chọn tình trạng:</label>
                        <select id="status" name="tinhtrang" required>
                            <option value="">-- Chọn tình trạng --</option>
                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Bảo trì">Bảo trì</option>
                            <option value="Ngừng hoạt động">Ngừng hoạt động</option>
                        </select>
                        <br /><br />
                        <label for="description">Nhập mô tả:</label>
                        <textarea id="description" rows="4" cols="50" name="mota" placeholder="Nhập mô tả..."></textarea>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-green" name="btnluu">Lưu</button>
                            <button type="button" class="btn btn-grey" onclick="closeModal()">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal yêu cầu bảo trì -->
        <div id="maintenanceModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Yêu cầu bảo trì thiết bị</span>
                    <button onclick="closeMaintenanceModal()" style="float: right; background: none; border: none; font-size: 16px;">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <!-- Trường ẩn để lưu Mã Thiết Bị -->
                        <input type="hidden" id="hiddenMaTBMaintenance" name="matb">
                        
                        <label for="mota">Mô tả lỗi</label>
                        <textarea name="motaloi" id="motaloi" rows="4" cols="50" placeholder="Mô tả lỗi thiết bị" required></textarea>
                        <br>
                        <label for="maintenanceDescription">Phương án sữa chữa</label>
                        <textarea id="maintenanceDescription" rows="4" cols="50" name="phuongan" placeholder="Phương án sửa chưa thiết bị" required></textarea>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-green" name="btnycbt">Gửi yêu cầu</button>
                            <button type="button" class="btn btn-grey" onclick="closeMaintenanceModal()">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Mở modal
        // Mở modal và hiển thị tình trạng hiện tại
        function openModal(element) {
            const modal = document.getElementById('modal');
            const statusSelect = document.getElementById('status');
            const hiddenMaTB = document.getElementById('hiddenMaTB');

            // Lấy tình trạng và mã thiết bị từ thuộc tính data
            const currentStatus = element.getAttribute('data-tinhtrang');
            const maTB = element.value;

            // Đặt giá trị vào các trường
            statusSelect.value = currentStatus || '';
            hiddenMaTB.value = maTB;

            // Hiển thị modal
            modal.style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }


        // Lưu dữ liệu (chỉ minh họa)
        function saveData() {
            const status = document.getElementById('status').value;
            const description = document.getElementById('description').value;

            closeModal();
        }

        // Tìm kiếm thiết bị
        function searchDevice() {
            const input = document.getElementById('search').value.toLowerCase();
            const rows = document.getElementById('deviceTable').getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                const deviceId = cells[1] ?.innerText || '';

                if (deviceId.toLowerCase().includes(input)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        // Mở modal yêu cầu bảo trì
        function openMaintenanceModal(element) {
            const modal = document.getElementById('maintenanceModal');
            const hiddenMaTB = document.getElementById('hiddenMaTBMaintenance');
            const maintenanceDescription = document.getElementById('maintenanceDescription');
        
            // Lấy mã thiết bị từ thuộc tính data
            const maTB = element.getAttribute('data-matb');
        
            // Đặt giá trị vào trường ẩn
            hiddenMaTB.value = maTB;
        
            // Hiển thị modal
            modal.style.display = 'block';
        }

        function closeMaintenanceModal() {
            document.getElementById('maintenanceModal').style.display = 'none';
        }
    </script>
</body>
</html>
<!-- Khi nhấn nút lưu thì tình trang thiết bị sẽ được cập nhật -->
<?php
    if (isset($_POST["btnluu"])) {
        $matb = $_POST["matb"]; // Nhận giá trị MaTB từ trường ẩn
        $tinhtrang = $_POST["tinhtrang"]; // Nhận giá trị tình trạng
        $mota = $_POST["mota"]; // Mô tả (nếu cần lưu)

        if (!empty($matb) && !empty($tinhtrang)) {
            // Gọi hàm cập nhật
            $result = $p->update_tinhtrangtb($matb, $tinhtrang);

            if ($result) {
                echo "<script>alert('Cập nhật thành công!');</script>";
                echo '<script>window.location.href="kythuatvien.php?dstb"</script>';
            } else {
                echo "<script>alert('Cập nhật thất bại!');</script>";
            }
        } else {
            echo "<script>alert('Vui lòng chọn tình trạng!');</script>";
        }
}
?>

<!-- thêm phiếu tình trạng -->
<?php
    if (isset($_POST["btnycbt"])) {
        $ngayghinhan = new DateTime();
        $ngayghinhan = $ngayghinhan->format("Y-m-d");
        $mota = $_POST["motaloi"];
        $phuongan = $_POST["phuongan"];
        $trangthai = 'Chưa duyệt';
        $ketqua = 'Chưa sửa';
        $manv = $_SESSION["manone"];
        $matb = $_POST["matb"];
        
        if(!empty($matb) && !empty($mota) && !empty($phuongan)) {
            $ptt = $p->insert_phieutt($ngayghinhan, $mota, $phuongan, $trangthai, $ketqua, $manv, $matb);

            if ($ptt) {
                echo "<script>alert('Yêu cầu bảo trì thành công!');</script>";
                echo '<script>window.location.href="kythuatvien.php?dstb"</script>';
            }else{
                echo "<script>alert('Yêu cầu thất bại!');</script>";
            }
        }
    }

?>