<?php
    include_once("controller/cnhanvien.php");
    $p = new cnhanvien();
    if(isset($_REQUEST["kpnv"])){
        $manv = $_REQUEST["kpnv"];
        $con = $p -> getkhoiphucnv($manv);
        if($con){
            echo "<script>alert('khôi phục nhân viên thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsnv' </script> ";
        }else{
            echo "<script>alert('khôi phục nhân viên thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsnv' </script> ";
        }
    }
?>
