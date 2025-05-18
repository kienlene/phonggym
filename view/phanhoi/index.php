
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phản Hồi</title>
    <link rel="stylesheet" href="../GYM/css/phanhoi.css">
    <style>
        .feedback-container {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.feedback-container h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

#feedback-title input[type="text"] {
    border: 1px solid #ddd;
}

#feedback-form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

#feedback-form input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 16px;
    box-sizing: border-box;
    background-color: #fdfdfd;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease;
}

#feedback-form input[type="text"]:focus {
    border-color: #007bff;
    outline: none;
}

#feedback-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

#feedback-form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

#feedback-form button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

#feedback-form button:hover {
    background-color: #0056b3;
}

.rating {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-bottom: 15px;
}

.rating input[type="radio"] {
    display: none;
}

.rating label {
    font-size: 24px;
    color: #ddd;
    cursor: pointer;
    transition: color 0.3s;
}

.rating input[type="radio"]:checked~label {
    color: #ffcc00;
}

.rating label:hover,
.rating label:hover~label {
    color: #ffcc00;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;
}

.success-message {
    color: green;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;
}
h2{
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(90deg, #007AFF, #00E0FF); 
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
}

/* Phong cách cho nhãn "Đánh giá" */
#feedback-form label[for="feedback-rating"] {
    display: block;
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Định dạng cho thẻ chọn (select) */
.rating select {
    appearance: none; /* Xóa giao diện mặc định của trình duyệt */
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 100%;
    padding: 10px 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fdfdfd;
    color: #333;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

/* Thêm mũi tên tùy chỉnh cho dropdown */
.rating {
    position: relative;
}

.rating select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23007bff'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 16px;
}

/* Hiệu ứng khi di chuột */
.rating select:hover {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

/* Hiệu ứng khi đang chọn */
.rating select:focus {
    outline: none;
    border-color: #0056b3;
    box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
}

    </style>
</head>
<body>
    <div class="feedback-container">
        <h2>Phản Hồi</h2>
        <form id="feedback-form" action="" method="post" enctype="multipart/form-data">
            <label for="feedback-title">Tiêu đề</label>
            <input type="text" id="feedback-title" name="tieude" placeholder="Nhập tiêu đề phản hồi" required>

            <label for="feedback-content">Nội dung phản hồi</label>
            <textarea id="feedback-content" name="noidung" rows="5" placeholder="Nhập nội dung phản hồi" required></textarea>

            <label for="feedback-rating">Đánh giá</label>
            <div class="rating">
                <?php
                    echo'<select name = "danhgia"> required';
                    echo '<option value="0">Chọn đánh giá</option>';
                    echo '<option value="1">★</option>';
                    echo '<option value="2">★★</option>';
                    echo '<option value="3">★★★</option>';
                    echo '<option value="4">★★★★</option>';
                    echo '<option value="5">★★★★★</option>';
                    echo '</select>';
                ?>
            </div>

            <label for="feedback-attachment">Đính kèm (tùy chọn)</label>
            <input type="file" id="feedback-attachment" name="hinhanh" >

            <button type="submit" name="btn_phanhoi">Gửi phản hồi</button>
            <p id="error-message" class="error-message"></p>
            <p id="success-message" class="success-message"></p>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();

    if(isset($_REQUEST["btn_phanhoi"])){
        $matvdangbai = $_SESSION["matv"];
        $tieude = $_REQUEST["tieude"];
        $noidung = $_REQUEST["noidung"];
        $danhgia = $_REQUEST["danhgia"];
        $hinhanh = $_FILES["hinhanh"]["name"];
        
        // kiểm tra file upload có phải hình ảnh ko
        $loai = strtolower(pathinfo($hinhanh, PATHINFO_EXTENSION));
        // danh sách đuôi file
        $ds = ['jpg', 'jpge', 'png', 'gif', 'webp', ''];
        
        if($danhgia == 0){
            echo '<script>alert("Vui lòng chọn đánh giá")</script>';
        }else{
            if(in_array($loai, $ds)){
                $phanhoi = $p->insert_phanhoi( $tieude, $noidung, $danhgia, $hinhanh, $matvdangbai);
                if($phanhoi){
                    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "../GYM/image/phanhoi/$hinhanh");
                    echo '<script>alert("Đăng phản hồi thành công")</script>';
                    echo '<script>window.location.href="thanhvien.php"</script>';
                }else{
                    echo '<script>alert("Phản hồi thất bại")</script>';
                }
            }else{
                echo '<script>alert("Chỉ chấp nhân file hình ảnh")</script>';
            }
            
        }
    }
?>

