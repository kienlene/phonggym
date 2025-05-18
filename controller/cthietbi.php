<?php
    include_once("modal/mthietbi.php");

    class cthietbi{
        public function getalltb(){
            $p = new mthietbi();
            $con = $p -> selectalltb();
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

        public function getalltbxoa(){
            $p = new mthietbi();
            $con = $p -> selectalltbxoa();
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

        public function get1tb($matb){
            $p = new mthietbi();
            $con = $p -> select1tb($matb);
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

        public function getsearchtb($name){
            $p = new mthietbi();
            $con = $p -> selecttbbyname($name);
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

        public function getsearchtbxoa($name){
            $p = new mthietbi();
            $con = $p -> selecttbbynamexoa($name);
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

        public function getupdatetb($matb, $tentb, $noisanxuat, $tinhtrang){
            $p = new mthietbi();
            $con = $p -> updatetb($matb, $tentb, $noisanxuat, $tinhtrang);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getxoatb($matb){
            $p = new mthietbi();
            $con = $p -> xoatb($matb);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getkhoiphuctb($matb){
            $p = new mthietbi();
            $con = $p -> khoiphuctb($matb);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getthemtb($tentb,$nsx,$tinhtrang){
            $p = new mthietbi();
            $con = $p -> themtb($tentb,$nsx,$tinhtrang);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
    }
?>