<?php
    include_once("controller/cthietbi.php");
    $p = new cthietbi();
    if(isset($_REQUEST["xoatb"])){
        $matb = $_REQUEST["xoatb"];
        $con = $p -> getxoatb($matb);
        if($con){
            echo "<script>alert('xóa thiết bị thành công')</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        }else{
            echo "<script>alert('xóa thiết bị thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        }
    }
?>
