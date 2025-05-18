<?php
include_once("modal/ketnoi.php");
class Mketoan {
    // Hàm lấy danh sách hóa đơn với phân trang
    public function danhsachhoadon($limit, $offset) {
        $p = new clsketnoi();
        $con = $p->moketnoi();
        if ($con) {
            // Truy vấn SQL kết hợp với LIMIT và OFFSET để lấy danh sách hóa đơn và tính tổng tiền
            $str = "SELECT *, 
                            SUM(hd.TongTien) OVER() AS TotalAmount
                    FROM thanhvien tv 
                    INNER JOIN hoadon hd ON tv.MaTV = hd.MaTV 
                    INNER JOIN goitap gt ON hd.MaGT = gt.MaGT
                    ORDER BY hd.MaHD ASC
                    LIMIT $limit OFFSET $offset";
            
            $tbl = $con->query($str);
            $p->dongketnoi($con); // Đóng kết nối
            
            return $tbl;
        } else {
            return false;
        }
    }    
    // Hàm đếm tổng số hóa đơn
    public function demSoHoaDon() {
        $p = new clsketnoi();
        $con = $p->moketnoi();
        if ($con) {
            // Truy vấn SQL đếm số lượng hóa đơn
            $sql = "SELECT COUNT(*) AS tong FROM hoadon";
            $result = $con->query($sql);
            $p->dongketnoi($con); // Đóng kết nối
            if ($result) {
                $row = $result->fetch_assoc();
                return $row['tong']; // Trả về tổng số
            }
        }
        return 0; // Trả về 0 nếu không có kết quả
    }

    public function danhsachhoadonchuaTT($limit, $offset) {
        $p = new clsketnoi();
        $con = $p->moketnoi();
        if ($con) {
            // Truy vấn SQL kết hợp với LIMIT và OFFSET để lấy danh sách hóa đơn và tính tổng tiền
            $str = "SELECT *
                    FROM thanhvien tv 
                    INNER JOIN hoadon hd ON tv.MaTV = hd.MaTV 
                    INNER JOIN goitap gt ON hd.MaGT = gt.MaGT
                    WHERE hd.TinhTrangTT like '%Chưa Thanh Toán%'
                    ORDER BY hd.MaHD ASC
                    LIMIT $limit OFFSET $offset";
            
            $tbl = $con->query($str);
            $p->dongketnoi($con); // Đóng kết nối
            
            return $tbl;
        } else {
            return false;
        }
    }   
    public function selectdanhsachhoadonWithTime($start_date, $end_date) {
        $p = new clsketnoi();
        $con = $p->moketnoi();
        if ($con) {
            // Sử dụng prepared statement để truy vấn
            $sql = "SELECT *
                    FROM thanhvien tv 
                    INNER JOIN hoadon hd ON tv.MaTV = hd.MaTV 
                    INNER JOIN goitap gt ON hd.MaGT = gt.MaGT 
                    WHERE NgayLap BETWEEN ? AND ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $start_date, $end_date);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
    
            $stmt->close();
            $p->dongketnoi($con); // Đóng kết nối
    
            return $data;
        } else {
            return false;
        }
    }
    
}
?>
