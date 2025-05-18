<?php
    include_once("controller/cnhanvien.php");
    $p = new cnhanvien();
    if(isset($_REQUEST["xoanv"])){
        $manv = $_REQUEST["xoanv"];
        $con = $p -> getxoanv($manv);
        if($con){
            echo "<script>alert('xóa nhân viên thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsnv' </script> ";
        }else{
            echo "<script>alert('xóa nhân viên thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsnv' </script> ";
        }
    }
?>
