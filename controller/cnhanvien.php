<?php
    include_once("modal/mnhanvien.php");

    class cnhanvien{
        public function getallsp(){
            $p = new mnhanvien();
            $con = $p -> selectallnv();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo"Lỗi rồi nha";
                return -1;
            }
        }

        public function getallnvxoa(){
            $p = new mnhanvien();
            $con = $p -> selectallnvxoa();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function getallcv(){
            $p = new mnhanvien();
            $con = $p -> selectallcv();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function get1nv($manv){
            $p = new mnhanvien();
            $con = $p -> select1nv($manv);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function getsearchnv($txttk, $txtdanhmuc){
            $p = new mnhanvien();
            $con = $p -> searchnv($txttk, $txtdanhmuc);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function getsearchnvxoa($txttk, $txtdanhmuc){
            $p = new mnhanvien();
            $con = $p -> searchnvxoa($txttk, $txtdanhmuc);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function get1chucvu($machucvu){
            $p = new mnhanvien();
            $con = $p -> select1chucvu($machucvu);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function getupdatenv($manv, $tennv, $email, $sdt, $hinhanh, $ngayvaolam, $matk, $macv) {
            $p = new mnhanvien();
            $con = $p -> updatenv($manv, $tennv, $email, $sdt, $hinhanh, $ngayvaolam, $matk, $macv);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
        

        public function getthemnhanvien($ten, $email, $sdt, $hinhanh, $ngayvaolam, $macv){
            $p = new mnhanvien();
            $con = $p -> themnhanvien($ten, $email, $sdt, $hinhanh, $ngayvaolam, $macv);
            if($con){
                return $con;
            }else{
                return false;
            }
        }
        
        public function getxoanv($manv){
            $p = new mnhanvien();
            $con = $p -> xoanv($manv);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getkhoiphucnv($manv){
            $p = new mnhanvien();
            $con = $p -> khoiphucnv($manv);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
    }
?>