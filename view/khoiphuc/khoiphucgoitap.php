<?php
    include_once("controller/cgoitap.php");
    $p = new cgoitap();
    if(isset($_REQUEST["kpgt"])){
        $manv = $_REQUEST["kpgt"];
        $con = $p -> getkhoiphucgt($manv);
        if($con){
            echo "<script>alert('khôi phục gói tập thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsgt' </script> ";
        }else{
            echo "<script>alert('khôi phục gói tập thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsgt' </script> ";
        }
    }
?>
