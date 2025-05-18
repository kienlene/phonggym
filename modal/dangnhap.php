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
        public function select1NV($ma){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            if($con){
                $str = " SELECT * 
                from taikhoan tk inner join nhanvien nv
                on tk.MaTK = nv.MaTK inner join chucvu cv 
                on nv.MaCV = cv.MaCV
                WHERE tk.MaTK = $ma ";
                $tbl = $con ->query($str);
                $p ->dongketnoi($con);
                return $tbl;
            }else{
                echo "truy vấn sai";
                return false;
            }
        }

        public function suaNV($ma,$ten,$hinhanh,$email,$sdt){
            $p= new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = " UPDATE nhanvien 
                SET TenNV = '$ten', HinhAnhNV='$hinhanh', Email='$email', Sdt ='$sdt'
                WHERE MaTK = $ma ";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        public function selectTK1NV($ma){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * from taikhoan
                WHERE MaTK =$ma";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        public function doimatkhau($ma,$mk){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str="UPDATE taikhoan set MatKhau ='$mk'
                WHERE MaTK =$ma";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
    }
?>