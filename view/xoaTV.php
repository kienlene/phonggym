<?php
    include_once("controller/cthanhvien.php");
    $p = new Cthanhvien();
    if(isset($_REQUEST["xoatv"])){
        $ma = $_REQUEST["xoatv"];
        $con = $p -> getXoaTV($ma);
        if($con){
            echo " <script>alert('Xoa thành viên thành công')</script> ";
            echo " <script> window.location.href='nhanvien.php?dstv' </script> ";
        }
    }
?>