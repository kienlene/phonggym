<?php
    include_once("modal/dangnhap.php");
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
        public function Lay1NV($ma){
            $p = new dangNhap();
            $con = $p -> select1NV($ma);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Loi to cha ba luaaaaaaaaaaaaaaaaaaaaaa";
                return false;
            }
        }
        public function updateNV($ma,$ten,$hinhanh,$email,$sdt){
            $p = new dangNhap();
            $con = $p -> suaNV($ma,$ten,$hinhanh,$email,$sdt);
            if($con){
                return $con;
            }else{
                return -1;
            }
        }
        public function LayTaiKhoan1NV($ma){
            $p = new dangNhap();
            $con = $p -> selectTK1NV($ma);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Loi to cha ba luaaaaaaaaaaaaaaaaaaaaaa";
                return false;
            }
        }
        public function updateMK($ma,$mk){
            $p = new dangNhap();
            $con = $p -> doimatkhau($ma,$mk);
            if($con){
                return $con;
            }else{
                return -1;
            }
        }
        
    }
?>