<?php
    include_once("modal/ketnoi.php");

    class mnhanvien{
        public function selectallnv(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select n.*, cv.TenCV from nhanvien n join chucvu cv on n.MaCV = cv.MaCV  where xoa = '' and n.MaCV <> 5 ORDER BY n.MaNV ASC";
                //$str = "select u.*, r.tenrole from user u join role r on u.idrole=r.idrole";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }

        public function selectallcv(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from chucvu where MaCV <> 5";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function selectallnvxoa(){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select n.*, cv.TenCV from nhanvien n join chucvu cv on n.MaCV = cv.MaCV where xoa='1' and n.MaCV <> 5 ";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function select1nv($manv){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from nhanvien where MaNV='$manv' and xoa='' and MaCV <> 5";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function searchnv($txttk, $txtdanhmuc) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $str = "SELECT n.*, cv.TenCV 
                        FROM nhanvien n 
                        JOIN chucvu cv ON n.MaCV = cv.MaCV 
                        WHERE 1=1 and xoa= ''and n.MaCV <> 5 ";
                // Nếu có từ khóa, thêm điều kiện tìm kiếm theo tên
                if (!empty($txttk)) {
                    $str .= " AND n.TenNV LIKE '%$txttk%'";
                }
                // Nếu có danh mục, thêm điều kiện tìm kiếm theo mã chức vụ
                if (!empty($txtdanhmuc)) {
                    $str .= " AND n.MaCV = '$txtdanhmuc'";
                }
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            } else {
                return false; 
            }
        }

        public function searchnvxoa($txttk, $txtdanhmuc) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $str = "SELECT n.*, cv.TenCV 
                        FROM nhanvien n 
                        JOIN chucvu cv ON n.MaCV = cv.MaCV 
                        WHERE 1=1 and xoa= '1' and MaCV <> 5";
                // Nếu có từ khóa, thêm điều kiện tìm kiếm theo tên
                if (!empty($txttk)) {
                    $str .= " AND n.TenNV LIKE '%$txttk%'";
                }
                // Nếu có danh mục, thêm điều kiện tìm kiếm theo mã chức vụ
                if (!empty($txtdanhmuc)) {
                    $str .= " AND n.MaCV = '$txtdanhmuc'";
                }
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            } else {
                return false; 
            }
        }

        public function select1chucvu($machucvu){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select * from chucvu where MaCV = '$machucvu' and MaCV <> 5";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function updatenv($manv, $tennv, $email, $sdt, $hinhanh, $ngayvaolam, $matk, $macv) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                try {
                    // Kiểm tra trùng số điện thoại nhưng bỏ qua chính thằng nhân viên đang được sửa
                    $checkSDT = "SELECT * FROM nhanvien WHERE Sdt = '$sdt' AND MaNV != '$manv'";
                    $result = $con->query($checkSDT);
                    
                    if ($result->num_rows > 0) {
                        $p->dongketnoi($con);
                        return false; // Trùng số điện thoại
                    }
                    // Cập nhật thông tin nhân viên
                    $str = "UPDATE nhanvien SET TenNV = '$tennv', Email = '$email', Sdt = '$sdt', HinhAnhNV = '$hinhanh', NgayVaoLam = '$ngayvaolam', MaTK = '$matk', MaCV = '$macv' WHERE MaNV = '$manv'";
                            
                    if ($con->query($str)) {
                        $p->dongketnoi($con);
                        return true; // Thành công
                    } else {
                        throw new Exception("Cập nhật nhân viên thất bại.");
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    $p->dongketnoi($con);
                    return false; // Lỗi trong quá trình thực thi
                }
            } else {
                echo "Kết Nối Thất Bại.";
                return false; // Kết nối thất bại
            }
        }
        
        public function themnhanvien($ten, $email, $sdt, $hinhanh, $ngayvaolam, $macv){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                try {
                    // Kiểm tra trùng số điện thoại
                    $checkSDT = "SELECT * FROM nhanvien WHERE Sdt = '$sdt'";
                    $result = $con->query($checkSDT);
                    
                    if ($result->num_rows > 0) {
                        $p->dongketnoi($con);
                        return false;
                    }
                    
                    // Bắt đầu transaction
                    $con->begin_transaction();
                    
                    // 1. Thêm tài khoản vào bảng taikhoan
                    $matkhau = '1'; // Mật khẩu mặc định
                    $matkhau_hash = md5($matkhau); // Mã hóa mật khẩu bằng MD5
                    $maRole = 2; // Giả sử vai trò mặc định là 2 (nhân viên)
                    
                    $str1 = "INSERT INTO taikhoan (TaiKhoan, MatKhau, MaRole) VALUES ('$sdt', '$matkhau_hash', '$maRole')";
                    if (!$con->query($str1)) {
                        throw new Exception("Thêm tài khoản thất bại.");
                    }
                    $last_MaTK = $con->insert_id; // Lấy MaTK tự sinh từ bảng taikhoan
                    
                    // 2. Thêm nhân viên vào bảng nhanvien, sử dụng MaTK từ bảng taikhoan
                    $str2 = "INSERT INTO nhanvien (TenNV, Email, Sdt, HinhAnhNV, NgayVaoLam, MaTK, MaCV, xoa) 
                             VALUES ('$ten', '$email', '$sdt', '$hinhanh', '$ngayvaolam', '$last_MaTK', '$macv', '')";
                    if (!$con->query($str2)) {
                        throw new Exception("Thêm nhân viên thất bại.");
                    }
                    
                    // Commit nếu không có lỗi
                    $con->commit();
                    $p->dongketnoi($con);
                    return true;
                } catch (Exception $e) {
                    // Rollback nếu có lỗi
                    $con->rollback();
                    echo $e->getMessage();
                    $p->dongketnoi($con);
                    return false;
                }
            } else {
                echo "Kết nối thất bại.";
                return false;
            }
        }
        

        public function xoanv($manv){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `nhanvien` SET `xoa` = 1 WHERE `MaNV` = '$manv'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function khoiphucnv($manv){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "UPDATE `nhanvien` SET `xoa` = '' WHERE `MaNV` = '$manv'";
                $tbl = $con -> query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        
    }
?>