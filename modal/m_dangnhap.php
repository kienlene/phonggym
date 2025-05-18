<?php
    include_once("modal/ketnoi.php");
    class dangNhap{
        public function dangnhapTK($user,$pass){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            if($con){
                $str = "select * from taikhoan where TaiKhoan ='$user' and MatKhau='$pass'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo"truy van sai";
                return false;
            }
        }

        // hàm lấy tài khoản để đổi mật khẩu
        public function doimatkhau($matk){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "select * from taikhoan where MaTK = $matk";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo "truy van sai";
                return false;
            }
        }
        // hàm đổi mật khẩu trên database
        public function capnhatmk($matk, $matkhau){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            if($con){
                $str = "update taikhoan set MatKhau = N'$matkhau' where MaTK = $matk";
                $tbl = $con ->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "truy van sai";
                return false;
            }

        }

        // hàm lấy thành viên dựa trên mã tài khoản
        public function thanhvien($matk){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "select * from thanhvien where MaTK = $matk";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo "truy vấn sai";
                return false;
            }
        }

        // hàm thêm phản hồi
        public function phanhoi($tieude, $noidung, $danhgia, $hinhanh, $matv,){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset("utf8");
            if($con){
                $str = "insert into phanhoi(TieuDe, noiDung, DanhGia, HinhAnhDanhGia, MaTV)
                        values(N'$tieude', N'$noidung', $danhgia, N'$hinhanh', $matv)
                        ";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // hàm gia hạn gói tập

        // hàm cập nhật thông tin
        public function capnhattt($matk, $ten, $email, $sdt, $date, $diachi, $avt){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "update thanhvien 
                        set TenTV = N'$ten',
                            Email = N'$email',
                            Sdt = N'$sdt',
                            NgaySinh = N'$date',
                            DiaChi = N'$diachi',
                            HinhAnh = N'$avt'
                        where MaTK = $matk";
                $tbl = $con ->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "truy van sai";
                return false;
            }
        }

        // hàm xem lịch sử
        public function lichsu($matv){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset("utf8");
            if($con){
                $str = "select * from lichsu where MaTV = $matv";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Truy vấn sai";
                return false;
            }

        }

        // hàm lấy thông tin gói tập của thành viên trong hóa đơn
        public function goitap($matv){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "select * from hoadon hd join goitap gt on hd.MaGT = gt.MaGT 
                    join thanhvien tv on hd.MaTV = tv.MaTV where hd.MaTV = $matv";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "loi truy van";
                return false;
            }
        }

        // lấy hóa đơn mới nhất 
        public function tinhngayhethan($matv){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "SELECT *
                        FROM hoadon hd
                        JOIN goitap gt ON hd.MaGT = gt.MaGT 
                        JOIN thanhvien tv ON hd.MaTV = tv.MaTV 
                        WHERE hd.MaTV = $matv
                        ORDER BY hd.NgayLap DESC, hd.MaHD DESC
                        LIMIT 1";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "loi truy van";
                return false;
            }
        }

        // Lấy thông tin hóa đơn chưa thanh toán
        public function hoadon_ctt($matv){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "select * from hoadon hd join goitap gt on hd.MaGT = gt.MaGT 
                    join thanhvien tv on hd.MaTV = tv.MaTV where hd.MaTV = $matv and hd.TinhTrangTT = 'Chưa thanh toán'";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "loi truy van";
                return false;
            }
        }

        // cập nhật tình trạng thanh toán khi chọn thanh toán của hóa đơn chưa thanh toán
        public function thanhtoan($mahd){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "update hoadon
                        set TinhTrangTT = 'Đã thanh toán'
                        where MaHD = $mahd";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // lấy thông tin hóa đơn theo mã hóa đơn
        public function hoadon_theoma($mahd){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con ->set_charset("utf8");
            if($con){
                $str = "select * from hoadon hd join goitap gt on hd.MaGT = gt.MaGT 
                    join thanhvien tv on hd.MaTV = tv.MaTV where hd.MaHD = $mahd";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "loi truy van";
                return false;
            }
        }

        // insert hóa đơn gia hạn gói tập
        public function hoadon($ngaylap, $ngaybatdau, $ngayketthuc, $tongtien, $tinhtrang, $magt, $matv ){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset("utf8");
            if($con){
                $str = "insert into hoadon(NgayLap, NgayBatDau, NgayKetThuc, TongTien, TinhTrangTT, MaGT, MaTV)
                        values(N'$ngaylap', N'$ngaybatdau', N'$ngayketthuc', $tongtien, N'$tinhtrang', $magt, $matv)";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

    }
?>