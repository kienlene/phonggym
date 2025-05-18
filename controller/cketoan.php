<?php
include_once("modal/mketoan.php");

class Cketoan {
    // Hàm lấy danh sách hóa đơn với phân trang
    public function selectdanhsachhoadon($limit, $offset) {
        $model = new Mketoan(); // Gọi lớp Model
        $result = $model->danhsachhoadon($limit, $offset); // Truyền limit và offset vào Model

        if ($result) {
            if ($result->num_rows > 0) {
                return $result; // Trả về kết quả nếu có dữ liệu
            } else {
                return 0; // Trả về 0 nếu không có dữ liệu
            }
        } else {
            return false; // Trả về false nếu có lỗi
        }
    }

    // Hàm đếm tổng số hóa đơn
    public function getdemSoHoaDon() {
        $model = new Mketoan(); // Gọi lớp Model
        $total = $model->demSoHoaDon(); // Gọi hàm đếm tổng số hóa đơn

        if ($total) {
            return $total; // Trả về tổng số hóa đơn
        } else {
            return false; // Trả về false nếu có lỗi
        }
    }

    public function selectdanhsachhoadonchuaTT($limit, $offset) {
        $model = new Mketoan(); // Gọi lớp Model
        $result = $model->danhsachhoadonchuaTT($limit, $offset); // Truyền limit và offset vào Model

        if ($result) {
            if ($result->num_rows > 0) {
                return $result; // Trả về kết quả nếu có dữ liệu
            } else {
                return 0; // Trả về 0 nếu không có dữ liệu
            }
        } else {
            return false; // Trả về false nếu có lỗi
        }
    }
    public function loctheothoigian($start_date, $end_date) {
        $model = new Mketoan(); // Gọi lớp Model
        $result = $model->selectdanhsachhoadonWithTime($start_date, $end_date); // Truyền start_date và end_date vào Model
    
        if (is_array($result) && count($result) > 0) {
            return $result; // Trả về kết quả nếu có dữ liệu
        } else {
            return []; // Trả về mảng rỗng nếu không có dữ liệu
        }
    }
    
    
}
?>
