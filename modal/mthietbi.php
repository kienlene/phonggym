<?php
    include_once("modal/ketnoi.php");

    class mthietbi{
        public function selectalltb(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * FROM thietbi where xoa='' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selectalltbxoa(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * FROM thietbi where xoa='1'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function select1tb($matb){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "SELECT * FROM thietbi where MaTB='$matb' and xoa='' ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selecttbbyname($name){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from thietbi where TenTB like '%$name%' and xoa=''  ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selecttbbynamexoa($name){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from thietbi where TenTB like '%$name%' and xoa='1'  ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function updatetb($matb, $tentb, $noisanxuat, $tinhtrang){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "update thietbi set TenTB='$tentb', NoiSanXuat='$noisanxuat', TinhTrang='$tinhtrang' where MaTB = '$matb'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function themtb($tentb,$nsx,$tinhtrang){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "INSERT INTO thietbi (TenTB, NoiSanXuat, TinhTrang) value (N'$tentb', N'$nsx', N'$tinhtrang')";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function xoatb($matb){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `thietbi` SET `xoa` = 1 WHERE `MaTB` = '$matb'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function khoiphuctb($matb){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `thietbi` SET `xoa` = '' WHERE `MaTB` = '$matb'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
    }
?>