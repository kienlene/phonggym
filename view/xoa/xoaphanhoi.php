<?php
    include_once("controller/cphanhoi.php");
    $p = new cphanhoi();
    if(isset($_REQUEST["xoaph"])){
        $matb = $_REQUEST["xoaph"];
        $con = $p -> getxoaph($matb);
        if($con){
            echo "<script>alert('xóa phản hồi thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsph' </script> ";
        }else{
            echo "<script>alert('xóa phản hồi thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsph' </script> ";
        }
    }
?>
