<?php
    include_once("modal/ketnoi.php");

    class mgoitap{
        public function selectallgoitap(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from goitap where xoa='' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selectallgtxoa(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from goitap where xoa='1' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function select1gt($magt){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * FROM goitap where MaGT='$magt' and xoa='' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selectgtbyname($name){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from goitap where TenGT like '%$name%' and xoa=''  ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function updategt($magt, $tengt, $sotien, $mota, $hinhanh, $dichvu,){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "update goitap set TenGT='$tengt', SoTien='$sotien', MoTa='$mota', HinhAnh='$hinhanh', DichVu='$dichvu' where MaGT = '$magt'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function themgt($tengt, $sotien, $mota, $hinhanh, $dichvu){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = " INSERT INTO goitap (TenGT, SoTien, MoTa, HinhAnh, DichVu) VALUES (N'$tengt', N'$sotien', N'$mota', N'$hinhanh', N'$dichvu' )";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                if($tbl == true){
                    return 1;
                }else{
                    return -1;
                    echo "truy vấn thất bại";
                }
            }else{
                return false;
            }
        }

        public function xoagt($magt){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `goitap` SET `xoa` = 1 WHERE `MaGT` = '$magt'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function khoiphucgt($magt){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `goitap` SET `xoa` = '' WHERE `MaGT` = '$magt'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
    }
?>