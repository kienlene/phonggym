<?php
    include_once("modal/mthanhvien.php");
    class Cthanhvien{
        public function getdanhsachthanvien(){
            $p = new mthanhvien();
            $con = $p -> danhsachkhachhang();
            if($con){
                if($con->num_rows >0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return false;
            }
        }

        public function getdanhsachthanvienbyma($ma){
            $p = new mthanhvien();
            $con = $p -> danhsachkhachhangbyma($ma);
            if($con){
                if($con->num_rows >0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return false;
            }
        }

        public function getgoitap(){
            $p = new mthanhvien();
            $con = $p -> selectgoitap();
            if($con){
                if($con->num_rows >0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return false;
            }
        }

        public function gettimkiemkhachhang($makh){
            $p = new mthanhvien();
            $con = $p -> timkiemkhachhang($makh);
            if($con){
                if($con->num_rows>0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return false;
            }
        }
        public function getchitietkhachhang($makh){
            $p = new mthanhvien();
            $con = $p -> chitietkhachhang($makh);
            if($con){
                if($con->num_rows>0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Looix !!";
                return false;
            }
        }
        public function InsertTV($ten, $email, $sdt, $ngaysinh, $diachi, $anh, $trangthai, $goitap, $ngaybatdau, $ngayketthuc, $tongtien){
            $p = new mthanhvien();
            $con = $p ->themTV($ten, $email, $sdt, $ngaysinh, $diachi, $anh, $trangthai, $goitap, $ngaybatdau, $ngayketthuc, $tongtien);
            if($con){
                return $con;
            }else{
                echo "Lỗi thêm";
                return false;
            }
        } 
        public function getXoaTV($ma){
            $p = new mthanhvien();
            $con = $p ->xoaTV($ma);
            if($con){
                return $con;
            }else{
                return -1;
            }
        }
        public function getSuaThanhVien($maTV,$ten, $email, $sdt, $ngaysinh, $diachi, $avt,$trangthai, $goitap,$tongtien) {
            $p = new mthanhvien();
            $result = $p->suaThanhVien($maTV, $ten, $email, $sdt, $ngaysinh, $diachi, $avt, $trangthai,$goitap,$tongtien);
            
            if ($result) {
                return true; // Sửa thành công
            } else {
                return false; // Sửa không thành công
            }
        }
        public function getdanhsachthanviengoitapnhohon20(){
            $p = new mthanhvien();
            $con = $p -> danhsachthanhviencogoitapnhohon20ngay();
            if($con){
                if($con->num_rows >0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi rồi nè";
                return false;
            }
        }
        public function gettimkiemkhachhanghh($ma){
            $p = new mthanhvien();
            $con = $p -> timkiemtvhh($ma);
            if($con){
                if($con->num_rows>0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                
                return false;
            }
        }

        public function capNhatHD($ma,$tinhtrang) {
            $p = new mthanhvien();
            $result = $p->updateHD($ma,$tinhtrang);
            
            if ($result) {
                return true; // Sửa thành công
            } else {
                echo "Looix";
                return false; // Sửa không thành công
            }
        }
        public function get_lichsu($matv){
            $p = new mthanhvien();
            $con = $p -> lichsu($matv);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi";
                return false;
            }
        }

    }
?>