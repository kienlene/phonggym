<?php
    include_once("modal/m_dangnhap.php");
    class GetDangNhap{
        public function getDangNhapTK($user,$pass){
            $p = new dangNhap();
            $con = $p -> dangnhapTK($user,$pass);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        // hàm lấy danh sách tài khoản để đổi mật khẩu
        public function get_doimatkhau($matk){
            $p = new dangNhap();
            $con = $p -> doimatkhau($matk);
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

        // hàm cập nhật mật khẩu trên database
        public function get_capnhatmk($matk, $matkhau){
            $p = new dangNhap();
            $con = $p -> capnhatmk($matk, $matkhau);
            if($con){
                if($con){
                    return true;
                }else{
                    return 0;
                }
            }else{
                echo "loi";
                return false;
            }
        }

        // hàm lấy thành viên dựa trên mã tài khoản
        public function get_thanhvien($matk){
            $p = new dangNhap();
            $con = $p -> thanhvien($matk);
            if($con){
                if($con ->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi";
                return false;
            }
        }

        // hàm cập nhật thông tin cá nhân lên database
        public function get_capnhattt($matk, $ten, $email, $sdt, $date, $diachi, $avt){
            $p = new dangNhap();
            $con = $p -> capnhattt($matk, $ten, $email, $sdt, $date, $diachi, $avt);
            if($con){
                if($con){
                    return true;
                }else{
                    return 0;
                }
            }else{
                echo "loi";
                return false;
            }
        }

        // hàm xem lịch sử
        public function get_lichsu($matv){
            $p = new dangNhap();
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

        // lấy gói tập của thành viên
        public function get_goitap($matv){
            $p = new dangNhap();
            $con = $p -> goitap($matv);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else {
                echo "lỗi";
            }
        }

        // tính ngày hết hạn, lấy hóa đơn mới nhất
        public function set_tinhngayhethan($matv){
            $p = new dangNhap();
            $con = $p -> tinhngayhethan($matv);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else {
                echo "lỗi";
                return false;
            }
        }

        // lấy hóa đơn chưa thanh toán
        public function get_hoadon_ctt($matv){
            $p = new dangNhap();
            $con = $p -> hoadon_ctt($matv);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else {
                echo "lỗi";
            }
        }

         // cập nhật tình trạng thanh toán
         public function update_thanhtoan($mahd){
            $p = new dangNhap();
            $con = $p -> thanhtoan($mahd);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi";
                return false;
            }
        }

        // lấy hóa đơn theo mã hóa đơn
        public function get_hoadon_theoma($mahd){
            $p = new dangNhap();
            $con = $p -> hoadon_theoma($mahd);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else {
                echo "lỗi";
            }
        }

        // hàm thêm phản hồi
        public function insert_phanhoi($tieude, $noidung, $danhgia, $hinhanh, $matv){
            $p = new dangNhap();
            $con = $p -> phanhoi( $tieude, $noidung, $danhgia, $hinhanh, $matv);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi";
            }
        }

        // insert hóa đơn
        public function insert_hoadon($ngaylap, $ngaybatdau, $ngayketthuc, $tongtien, $tinhtrang, $magt, $matv){
            $p = new dangNhap();
            $con = $p -> hoadon($ngaylap, $ngaybatdau, $ngayketthuc, $tongtien, $tinhtrang, $magt, $matv);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi";
            }
        }
    }
?>