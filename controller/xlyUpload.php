<?php
    class clsUpload
    {
        public function Upload($file,$hinhanh)
        {
            if(!$this->checkSize($file["size"]))
            {
                return -1;
            }
            if(!$this->checkType($file["type"]))
                return -2;
            // $new_name = $this->setDes($file["name"],$hinhanh);
            $new_name = $file["name"];
            if(move_uploaded_file($file["tmp_name"], 'image/goitap/'.$new_name))
            {
                return $new_name;
            }
            return 0;
        }
        
        public function checkSize($size)
        {
            $cont = 3*1024*1024;
            if($size<$cont)
                return true;
            return false;
        }
        
        public function checkType($type)
        {
            $arrType = array("image/jpeg","image/img","image/png");
            if(in_array($type,$arrType))
            {
                return true;
            }
            else
            {
                echo "<script>alert('chỉ được đăng ảnh thôi bạn ơi !!!')</script>";
                header("refresh:0; admin.php");
            }
        }
        public function setDes($name, $hinhanh)
        {
            $folder ="image/";
            $name_arr = explode(".",$name);
            $ext = ".".$name_arr[count($name_arr)-1];
            // Đổi tên file thanh mssv và_thoi gian upload file
            return $folder. $hinhanh. $ext;
        }
    }
?>