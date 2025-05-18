<?php
    include_once("controller/cgoitap.php");
    $p = new cgoitap();
    if(isset($_REQUEST["xoagt"])){
        $magt = $_REQUEST["xoagt"];
        $con = $p -> getxoagt($magt);
        if($con){
            echo "<script>alert('xóa gói tập thành công')</script>";
            echo " <script> window.location.href='quanly.php?dsgt' </script> ";
        }else{
            echo "<script>alert('xóa gói tập thất bại')</script>";
            echo " <script> window.location.href='quanly.php?dsgt' </script> ";
        }
    }
?>
