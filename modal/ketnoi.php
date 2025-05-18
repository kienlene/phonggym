<?php
     class clsketnoi{
        public function moketnoi(){
            return mysqli_connect("localhost","root","","gym");
        }
        public function dongketnoi($con){
            $con -> close();
        }
    }
?>