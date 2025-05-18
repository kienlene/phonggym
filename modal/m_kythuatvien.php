<?php
    include_once("modal/ketnoi.php");

    class m_kythuatvien{

        // xem danh sách thiết bị

        public function danhsachtb(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from thietbi";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // cập nhật tình trạng thiết bị
        public function tinhtrangtb($matb, $tinhtrang){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "update thietbi
                        set TinhTrang = N'$tinhtrang'
                        where MaTB = $matb       
                        ";
                $tbl = $con->query($str);
                $p->dongketnoi( $con );
                return $tbl;
            }else{
                echo "Lõi truy vấn";
                return false;
            }
        }
        public function phieutt($ngayghinhan, $mota, $phuongan, $trangthai, $ketqua, $manv, $matb){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "insert into phieutinhtrangthietbi(NgayGhiNhan, MoTaLoi, PhuongAnSuaChua, TrangThai, KetQua, MaNV, MaTB)
                        values('$ngayghinhan', N'$mota', N'$phuongan', N'$trangthai', N'$ketqua', $manv, $matb)";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // danh sách thiết bị đã duyệt
        public function dstb_duyet($tinhtrang, $trangthai){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select *
                        from thietbi tb join phieutinhtrangthietbi ptt
                        on tb.MaTB = ptt.MaTB
                        where TinhTrang = N'$tinhtrang'
                              and TrangThai = N'$trangthai'";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // Hàm cập nhật thông tin ngày và kết quả bảo trì
        public function ketqua($maphieu, $ngaybaotri, $ketqua){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "update phieutinhtrangthietbi
                        set NgayBaoTri = N'$ngaybaotri',
                            KetQua = N'$ketqua'
                        where MaPhieu = $maphieu
                        ";  
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // hàm duyệt thiết bị cho quản lý 
        // xem danh sách
        public function dstb_chuaduyet($trangthai){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select *
                        from thietbi tb join phieutinhtrangthietbi ptt
                        on tb.MaTB = ptt.MaTB
                        where TrangThai = N'$trangthai'";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        // duyệt thiết bị (trạng thái)
        public function trangthai($maphieu, $trangthai){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "update phieutinhtrangthietbi
                        set TrangThai = N'$trangthai'
                        where MaPhieu = $maphieu
                        ";  
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

    }
?>