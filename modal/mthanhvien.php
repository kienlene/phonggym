<?php
    include_once("modal/ketnoi.php");
    class mthanhvien{
        public function danhsachkhachhang(){
            $p =new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select DISTINCT tv.MaTV, tv.TenTV, gt.TenGT
                from thanhvien tv INNER join hoadon hd on tv.MaTV = hd.MaTV INNER join goitap gt on hd.MaGT = gt.MaGT
                where TrangThai like '%Còn Tập%'
                order by tv.MaTV asc, hd.NgayLap desc ";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }

        public function danhsachkhachhangbyma($ma){
            $p =new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str = "select *, tv.HinhAnh 
                from thanhvien tv INNER join hoadon hd on tv.MaTV = hd.MaTV INNER join goitap gt on hd.MaGT = gt.MaGT
                where tv.MaTV= $ma
                order by tv.MaTV asc ";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }



        public function timkiemkhachhang($makh){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str= "select DISTINCT tv.MaTV, tv.TenTV, gt.TenGT
                from thanhvien tv INNER join hoadon hd on tv.MaTV = hd.MaTV INNER join goitap gt on hd.MaGT = gt.MaGT 
                where tv.MaTV = $makh";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        public function chitietkhachhang($makh){
            $p = new clsketnoi();
            $con = $p -> moketnoi();
            if($con){
                $str= "select tv.HinhAnh, tv.MaTV, tv.TenTV, gt.TenGT,hd.NgayKetThuc, tv.Email, tv.Sdt,tv.NgaySinh,tv.DiaChi 
                from thanhvien tv INNER join hoadon hd on tv.MaTV = hd.MaTV INNER join goitap gt on hd.MaGT = gt.MaGT 
                where tv.MaTV = $makh";
                $tbl = $con ->query($str);
                $p -> dongketnoi($con);
                return $tbl;
            }else{
                echo "Lỗi truy vấn";
                return false;
            }
        }
        public function selectgoitap(){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            if($con){
                $str = "select * from goitap";
                $tbl = $con ->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        // thêm TV
        public function themTV($ten, $email, $sdt, $ngaysinh, $diachi, $anh, $trangthai, $goitap, $ngaybatdau, $ngayketthuc, $tongtien) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
        
            if ($con) {
                // Kiểm tra trùng số điện thoại
                $checkSDT = "SELECT * FROM thanhvien WHERE Sdt = N'$sdt'";
                $result = $con->query($checkSDT);
                
                if ($result->num_rows > 0) {
                    echo "Số điện thoại đã tồn tại.";
                    $p->dongketnoi($con);
                    return -1;
                }
        
                // Bắt đầu thêm dữ liệu
                $con->begin_transaction(); // Bắt đầu transaction
                try {
                    // 1. Thêm vào bảng `taikhoan`
                    $tenTk = $sdt;
                    $matkhau = md5(1); // Mã hóa mật khẩu "1"
                    $marole = 3;
        
                    $sqlTaiKhoan = "INSERT INTO taikhoan (TaiKhoan, MatKhau, MaRole) VALUES (N'$tenTk', N'$matkhau', $marole)";
                    if (!$con->query($sqlTaiKhoan)) {
                        throw new Exception("Thêm tài khoản thất bại.");
                    }
                    $matk = $con->insert_id; // Lấy mã tài khoản vừa tạo
        
                    // 2. Thêm vào bảng `thanhvien`
                    $sqlThanhVien = "INSERT INTO thanhvien (tenTV, Email, Sdt, NgaySinh, DiaChi, HinhAnh, MaTK, TrangThai) 
                                     VALUES (N'$ten', N'$email', N'$sdt', N'$ngaysinh', N'$diachi', N'$anh', $matk, N'$trangthai')";
                    if (!$con->query($sqlThanhVien)) {
                        throw new Exception("Thêm thành viên thất bại.");
                    }
                    $matv = $con->insert_id; // Lấy mã thành viên vừa tạo
        
                    // 3. Thêm vào bảng `hoadon`
                    $ngaylap = date('Y-m-d H:i:s');
                    $tinhtrangTT = "Đã thanh toán";
                    $tinhtrangmail = "chưa gửi";
                    $manv = 1;
        
                    $sqlHoaDon = "INSERT INTO hoadon (NgayLap, NgayBatDau, NgayKetThuc, TongTien, TinhTrangTT, TinhTrangMail, MaGT, MaTV) 
                                  VALUES ('$ngaylap', '$ngaybatdau', '$ngayketthuc', $tongtien, N'$tinhtrangTT', N'$tinhtrangmail', $goitap, $matv)";
                    if (!$con->query($sqlHoaDon)) {
                        throw new Exception("Thêm hóa đơn thất bại.");
                    }
        
                    // Commit transaction
                    $con->commit();
                    $p->dongketnoi($con);
                    return 1;
                } catch (Exception $e) {
                    // Rollback nếu có lỗi
                    $con->rollback();
                    echo $e->getMessage();
                    $p->dongketnoi($con);
                    return -1;
                }
            } else {
                return false;
            }
        }
        
        public function xoaTV($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "UPDATE thanhvien SET TrangThai = 'Nghỉ' WHERE MaTV = $ma";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            } else {
                return false;
            }
        }
        public function suaThanhVien($maTV, $ten, $email, $sdt, $ngaysinh, $diachi, $avt, $trangthai,$goitap,$tongtien) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            
            if ($con) {
                try {
                    // Bắt đầu transaction
                    $con->begin_transaction();
        
                    // 2. Cập nhật thông tin thành viên trong bảng thanhvien
                    $str2 = "UPDATE thanhvien SET TenTV = '$ten', Email = '$email', Sdt = '$sdt', NgaySinh = '$ngaysinh', DiaChi = '$diachi', HinhAnh = '$avt', TrangThai='$trangthai' WHERE MaTV = $maTV";
                    $con->query($str2);
        
                    // 3. Cập nhật gói tập trong bảng hoadon nếu gói tập có thay đổi
                    $str3 = "UPDATE hoadon SET MaGT = $goitap, TongTien=$tongtien WHERE MaTV = $maTV";
                    $con->query($str3);
        
                    // Commit nếu không có lỗi
                    $con->commit();
                    $p->dongketnoi($con);
                    return true;
                } catch (Exception $e) {
                    // Rollback nếu có lỗi
                    $con->rollback();
                    $p->dongketnoi($con);
                    return false;
                }
            } else {
                return false;
            }
        }
        public function danhsachthanhviencogoitapnhohon20ngay(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "SELECT *,
                        tv.MaTV, 
                        tv.TenTV, 
                        gt.TenGT, 
                        hd.NgayKetThuc, 
                        hd.MaHD,
                        DATEDIFF(hd.NgayKetThuc, CURRENT_DATE) AS SoBuoiTapConLai
                    FROM thanhvien tv
                    INNER JOIN hoadon hd ON tv.MaTV = hd.MaTV 
                    INNER JOIN goitap gt ON hd.MaGT = gt.MaGT
                    INNER JOIN (
                        SELECT MaTV, MAX(NgayKetThuc) AS MaxNgayKetThuc
                        FROM hoadon
                        GROUP BY MaTV
                    ) AS LastInvoice ON hd.MaTV = LastInvoice.MaTV AND hd.NgayKetThuc = LastInvoice.MaxNgayKetThuc
                    WHERE TrangThai LIKE '%Còn Tập%' 
                    HAVING SoBuoiTapConLai >= 0 AND SoBuoiTapConLai < 20
                    ORDER BY tv.MaTV ASC, hd.MaHD DESC
                ";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        

        public function timkiemtvhh($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "SELECT *,
                        tv.MaTV, 
                        tv.TenTV, 
                        gt.TenGT, 
                        hd.NgayKetThuc, 
                        hd.MaHD,
                        DATEDIFF(hd.NgayKetThuc, CURRENT_DATE) AS SoBuoiTapConLai
                    FROM thanhvien tv
                    INNER JOIN hoadon hd ON tv.MaTV = hd.MaTV 
                    INNER JOIN goitap gt ON hd.MaGT = gt.MaGT
                    INNER JOIN (
                        SELECT MaTV, MAX(NgayKetThuc) AS MaxNgayKetThuc
                        FROM hoadon
                        GROUP BY MaTV
                    ) AS LastInvoice ON hd.MaTV = LastInvoice.MaTV AND hd.NgayKetThuc = LastInvoice.MaxNgayKetThuc
                    WHERE TrangThai LIKE '%Còn Tập%' AND tv.MaTV = $ma 
                    HAVING SoBuoiTapConLai >= 0 AND SoBuoiTapConLai < 20
                    ORDER BY tv.MaTV ASC, hd.MaHD DESC
                ";
                $tbl = $con->query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        public function updateHD($ma,$tinhtrang){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " UPDATE hoadon 
                set TinhTrangMail = '$tinhtrang'
                where MaHD = $ma ";
                $tbl = $con ->query($str);
                $p ->dongketnoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
         public function lichsu($matv){
            $p = new clsketnoi();
            $con = $p ->moketnoi();
            $con->set_charset("utf8");
            if($con){
                $str = "select * from lichsu where MaTV = $matv";
                $tbl = $con -> query($str);
                $p->dongketnoi($con);
                return $tbl;
            }else{
                echo "Truy vấn sai";
                return false;
            }

        }
        
    }
?>