<?php
    include_once("modal/mgoitap.php");

    class cgoitap{
        public function getallgoitap(){
            $p = new mgoitap();
            $con = $p -> selectallgoitap();
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

        public function getallgtxoa(){
            $p = new mgoitap();
            $con = $p -> selectallgtxoa();
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

        public function get1gt($magt){
            $p = new mgoitap();
            $con = $p -> select1gt($magt);
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

        public function getallhlv(){
            $p = new mgoitap();
            $con = $p -> selecthlv();
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

        public function getgtbyname($name){
            $p = new mgoitap();
            $con = $p -> selectgtbyname($name);
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

        public function getupdategt($magt, $tengt, $sotien, $mota, $hinhanh, $dichvu){
            $p = new mgoitap();
            $kq = $p -> updategt($magt, $tengt, $sotien, $mota, $hinhanh, $dichvu);

                // if($kq -> num_rows > 0){
                    return $kq;
                // }else{
                //     return 0;
                // }
        }

        public function getthemgt($tengt, $sotien, $mota, $hinhanh, $dichvu){
            $p = new mgoitap();
            $con = $p -> themgt($tengt, $sotien, $mota, $hinhanh, $dichvu);
            if($con ==1){
                return $con;
            }else{
                return -1;
            }
        }

        public function getxoagt($magt){
            $p = new mgoitap();
            $con = $p -> xoagt($magt);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getkhoiphucgt($magt){
            $p = new mgoitap();
            $con = $p -> khoiphucgt($magt);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
    }
?>