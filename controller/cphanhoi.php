<?php
    include_once("modal/mphanhoi.php");

    class cphanhoi{
        public function getallphanhoi(){
            $p = new mphanhoi();
            $con = $p -> selectallphanhoi();
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

        public function getallphxoa(){
            $p = new mphanhoi();
            $con = $p -> selectallphxoa();
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

        public function get1ph($magt){
            $p = new mphanhoi();
            $con = $p -> select1gt($maph);
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


        public function getsearchph($name, $danhgia){
            $p = new mphanhoi();
            $con = $p -> searchph($name, $danhgia);
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

        public function getsearchphxoa($name, $danhgia){
            $p = new mphanhoi();
            $con = $p -> searchphxoa($name, $danhgia) ;
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

        public function getxoaph($maph){
            $p = new mphanhoi();
            $con = $p -> xoaph($maph);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        public function getkhoiphucph($maph){
            $p = new mphanhoi();
            $con = $p -> khoiphucph($maph);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }

        

        
    }
?>