<?php
    include_once("controller/cthietbi.php");
    $p = new cthietbi();
    if(isset($_REQUEST["kptb"])){
        $manv = $_REQUEST["kptb"];
        $con = $p -> getkhoiphuctb($manv);
        if($con){
            echo "<script>alert('khôi phục thiết bị thành công')</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        }else{
            echo "<script>alert('khôi phục thiết bị thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dstb' </script> ";
        }
    }
?>
