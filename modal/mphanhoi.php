<?php
    include_once("modal/ketnoi.php");

    class mphanhoi{
        public function selectallphanhoi(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select ph.*, tv.TenTV from phanhoi ph join thanhvien tv on ph.MaTV = tv.MaTV where xoa='' ORDER BY ph.MaPH ASC";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selectallphxoa(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select ph.*, tv.TenTV from phanhoi ph join thanhvien tv on ph.MaTV = tv.MaTV where xoa='1' ORDER BY ph.MaPH ASC";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function select1ph($maph){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * FROM phanhoi where maPH='$maph' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function searchph($name, $danhgia) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
        
            if ($con) {
                // Khởi tạo câu truy vấn cơ bản
                $str = "SELECT ph.*, tv.TenTV 
                        FROM phanhoi ph 
                        JOIN thanhvien tv ON ph.MaTV = tv.MaTV 
                        WHERE 1=1 AND xoa = ''";
        
                // Nếu có tên thành viên, thêm điều kiện tìm kiếm
                if (!empty($name)) {
                    $str .= " AND tv.TenTV LIKE '%$name%'";
                }
        
                // Nếu có đánh giá, thêm điều kiện tìm kiếm
                if (!empty($danhgia)) {
                    $str .= " AND ph.DanhGia = '$danhgia'";
                }
        
                // Thực thi câu truy vấn
                $tbl = $con->query($str);
        
                // Đóng kết nối
                $p->dongketnoi($con);
        
                // Trả về kết quả
                return $tbl;
            } else {
                echo "Lỗi kết nối cơ sở dữ liệu!";
                return false;
            }
        }

        public function searchphxoa($name, $danhgia) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
        
            if ($con) {
                // Khởi tạo câu truy vấn cơ bản
                $str = "SELECT ph.*, tv.TenTV 
                        FROM phanhoi ph 
                        JOIN thanhvien tv ON ph.MaTV = tv.MaTV 
                        WHERE 1=1 AND xoa = '1'";
        
                // Nếu có tên thành viên, thêm điều kiện tìm kiếm
                if (!empty($name)) {
                    $str .= " AND tv.TenTV LIKE '%$name%'";
                }
        
                // Nếu có đánh giá, thêm điều kiện tìm kiếm
                if (!empty($danhgia)) {
                    $str .= " AND ph.DanhGia = '$danhgia'";
                }
        
                // Thực thi câu truy vấn
                $tbl = $con->query($str);
        
                // Đóng kết nối
                $p->dongketnoi($con);
        
                // Trả về kết quả
                return $tbl;
            } else {
                echo "Lỗi kết nối cơ sở dữ liệu!";
                return false;
            }
        }

        public function xoaph($maph){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `phanhoi` SET `xoa` = 1 WHERE `maPH` = '$maph'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
    
        public function khoiphucph($maph){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `phanhoi` SET `xoa` = '' WHERE `maPH` = '$maph'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        
    }
?>