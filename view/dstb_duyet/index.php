<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thiết bị đã duyệt</title>
    <style>
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

        .modal-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
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
    $con = $p->get_dstb_duyet('Bảo trì', 'Duyệt');
?>
<body>
    <h2>Danh sách thiết bị đã duyệt</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Phiếu</th>
                <th>Mã Thiết Bị</th>
                <th>Tên Thiết Bị</th>
                <th>Mô tả lỗi</th>
                <th>Phương án sửa chữa</th>
                <th>Ngày bảo trì</th>
                <th>Kết quả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            if($con){
                while ($r = $con->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>' . $r["MaPhieu"] . '</td>';
                    echo '<td>' . $r["MaTB"] . '</td>';
                    echo '<td>' . $r["TenTB"] . '</td>';
                    echo '<td>' . $r["MoTaLoi"] . '</td>';
                    echo '<td>' . $r["PhuongAnSuaChua"] . '</td>';
                    echo '<td>' . $r["NgayBaoTri"] . '</td>';
                    echo '<td>' . $r["KetQua"] . '</td>';
                    echo '<td>
                        <button 
                            class="btn btn-blue" 
                            type="button" 
                            onclick="openUpdateModal(this)" 
                            data-maphieu="' . $r["MaPhieu"] . '" 
                            data-ngaybaotri="' . $r["NgayBaoTri"] . '" 
                            data-ketqua="' . $r["KetQua"] . '">
                            Cập nhật
                        </button>
                    </td>';
                    echo '</tr>';
                    $i++;
                }
            }else{
                echo "<script>alert('Không có thiết bị cần bảo trì!');</script>";
                echo '<script>window.location.href="kythuatvien.php"</script>';
            }
            ?>
        </tbody>
    </table>

    <!-- Modal cập nhật -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span>Cập nhật thiết bị</span>
                <button onclick="closeUpdateModal()" style="float: right; background: none; border: none; font-size: 16px;">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="updateMaPhieu" name="maphieu">
                    <label for="updateNgayBaoTri">Ngày bảo trì:</label>
                    <input type="date" id="updateNgayBaoTri" name="ngaybaotri" required>
                    <br><br>
                    <label for="updateKetQua">Kết quả:</label>
                    <select id="updateKetQua" name="ketqua" required>
                        <option value="Chưa sửa">Chưa sửa</option>
                        <option value="Đã sửa">Đã sửa</option>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-green" name="btnUpdate">Lưu</button>
                        <button type="button" class="btn btn-grey" onclick="closeUpdateModal()">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openUpdateModal(element) {
    const modal = document.getElementById('updateModal');
    const maphieu = element.getAttribute('data-maphieu');
    const ngayBaoTri = element.getAttribute('data-ngaybaotri');
    const ketQua = element.getAttribute('data-ketqua');

    console.log({ maphieu, ngayBaoTri, ketQua }); // Kiểm tra giá trị

    document.getElementById('updateMaPhieu').value = maphieu;
    document.getElementById('updateNgayBaoTri').value = ngayBaoTri || '';
    document.getElementById('updateKetQua').value = ketQua || 'Chưa sửa';

    modal.style.display = 'block';
}

function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
}

    </script>
</body>

</html>

<?php
if (isset($_POST["btnUpdate"])) {
    $maphieu = $_POST["maphieu"];
    $ngaybaotri = $_POST["ngaybaotri"];
    // $ngaybaotri = $ngaybaotri->format("Y-m-d");
    $ketqua = $_POST["ketqua"];

    if (!empty($maphieu) && !empty($ngaybaotri) && !empty($ketqua)) {
        $result = $p->update_ketqua($maphieu, $ngaybaotri, $ketqua);

        if ($result) {
            echo "<script>alert('Cập nhật thành công!');</script>";
            echo '<script>window.location.href="kythuatvien.php?dstb_duyet"</script>';
        } else {
            echo "<script>alert('Cập nhật thất bại!');</script>";
        }
    }
}
?>
