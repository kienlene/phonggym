<?php
    include_once("controller/cphanhoi.php");
    $p = new cphanhoi();
    if(isset($_REQUEST["kpph"])){
        $manv = $_REQUEST["kpph"];
        $con = $p -> getkhoiphucph($manv);
        if($con){
            echo "<script>alert('khôi phục phản hồi thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsph' </script> ";
        }else{
            echo "<script>alert('khôi phục phản hồi thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsph' </script> ";
        }
    }
?>
