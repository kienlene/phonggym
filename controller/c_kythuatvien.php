<?php
    include_once("modal/m_kythuatvien.php");

    class c_kythuatvien{
         
        // xem danh sách thiết bị
        public function get_danhsachtb(){
            $p = new m_kythuatvien();
            $con = $p->danhsachtb();
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

        // cập nhật tình trang
        public function update_tinhtrangtb($matb, $tinhtrang){
            $p = new m_kythuatvien();
            $con = $p->tinhtrangtb($matb, $tinhtrang);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lõi";
                return false;
            }
        }

        // thêm phiếu tình trạng
        public function insert_phieutt($ngayghinhan, $mota, $phuongan, $trangthai, $ketqua, $manv, $matb){
            $p = new m_kythuatvien();
            $con = $p->phieutt($ngayghinhan, $mota, $phuongan, $trangthai, $ketqua, $manv, $matb);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "lỗi";
                return false;
            }
        }
        // danh sách thiết bị duyệt
        public function get_dstb_duyet($tinhtrang, $trangthai){
            $p = new m_kythuatvien();
            $con = $p->dstb_duyet($tinhtrang, $trangthai);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi";
                return false;
            }
        }

        // hàm update kết quả của phiếu tình trạng
        public function update_ketqua($maphieu, $ngaybaotri, $ketqua){
            $p = new m_kythuatvien();
            $con = $p->ketqua($maphieu, $ngaybaotri, $ketqua);   
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

        // lấy danh sách thiết bị chưa duyệt == cho quản lý 
        public function get_dstb_chuaduyet($trangthai){
            $p = new m_kythuatvien();
            $con = $p->dstb_chuaduyet( $trangthai);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi";
                return false;
            }
        }

        // duyệt trạng thái cho thiết bị (Quản lý)
        public function update_trangthai($maphieu, $trangthai){
            $p = new m_kythuatvien();
            $con = $p->trangthai($maphieu, $trangthai);
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
    }
?>